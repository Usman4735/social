<?php

namespace App\Http\Controllers\SuperAdmin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Mailer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function messenger()
    {
        return view('super-admin.messenger');
    }
    public function index(Request $request)
    {
        if ($request->session()->has('online_super_admin')) {
            return view("super-admin.dashboard");
        } else {
            return view("super-admin.login");
        }
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);
        $super_admin = Admin::where("username", $request->username)->where('role', 'super_admin')->first();
        if ($super_admin) {
            if ($super_admin->status != 1) {
                return back()->with("error", "Your account has been Blocked.");
            }
            if (Hash::check($request->password, $super_admin->password)) {
                $request->session()->put("online_super_admin", $super_admin);
            } else {
                return back()->with("error", "Wrong username or password");
            }
        } else {
            return back()->with("error", "Wrong username or password");
        }
        return redirect('sa1991as');
    }
    public function logout(Request $request)
    {
        if ($request->session()->has("online_super_admin")) {
            $request->session()->pull("online_super_admin");
            return redirect("sa1991as");
        }
        return redirect("sa1991as");
    }

    public function forgotPassword()
    {
        return view("super-admin.forgot-password");
    }

    public function processForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ],[
            "email.required" => "Email Not Found!"
        ]);
        $super_admin = Admin::where("email", $request->email)->where("role", "super_admin")->first();
        if($super_admin) {

            $otp = rand(111111, 999999);
            $email = $super_admin->email;

            $password_reset=PasswordReset::where('email', $email)->latest()->first();
            $now = Carbon::now();

            if ($password_reset && $now->isBefore($password_reset->expire_at)) {
                $otp=$password_reset->otp;
            }else {
                $password_reset = new PasswordReset();
                $password_reset->email = $email;
                $password_reset->otp = $otp;
                $password_reset->expire_at=Carbon::now()->addMinutes(5);
                $password_reset->type = 1; // 1= for admin/manager/superadmin
                $password_reset->save();
            }


            $message = [
                'username' => $super_admin->username,
                'otp' => $otp
            ];

            $view = view("mails.otp", compact("message"))->render();
            Mailer::Send("Password Reset ", $view, $email);
            return redirect('/sa1991as/otp/'.encrypt($password_reset->id))->with('success', 'OTP has been sent to your email!');
        }else {
            return back()->with("error", "The email is invalid" );
        }
    }

    public function otp(Request $request, $id)
    {
        $password_reset_otp = PasswordReset::findOrFail(decrypt($id));
        return view('super-admin.otp', compact('password_reset_otp'));

    }

    public function otpVerify(Request $request, $id)
    {
        $otp = implode('', $request->otp);
        //Validation Logic
        $password_reset_otp = PasswordReset::where('id', decrypt($id))->where('type', 1)->where('otp', $otp)->first();
        $now = Carbon::now();
        if (!$password_reset_otp) {
            return back()->with('error', 'Your OTP is not correct');
        } elseif ($password_reset_otp && $now->isAfter($password_reset_otp->expire_at)) {
            return back()->with('error', 'Your OTP has been expired');
        }
        $user=Admin::where('email', $password_reset_otp->email)->where('role', 'super_admin')->firstOrFail();
        if ($user) {
            $password_reset_otp->expire_at=Carbon::now();
            $password_reset_otp->save();

        }
        return redirect('sa1991as/reset-password/'.encrypt($user->id));
    }

    public function resetPassword($id)
    {
        $user=Admin::findOrFail(decrypt($id));
        return view('super-admin.reset-password', compact('user'))->with('success', "OTP verified successfully");
    }
    public function processResetPassword(Request $request)
    {
        $request->validate([
            "password" => "min:8|required_with:confirm_password|same:confirm_password"
        ]);
        $super_admin = Admin::where('id', decrypt($request->user))->where('role', 'super_admin')->firstOrFail();
        if ($super_admin) {
            $super_admin->password = Hash::make($request->password);
            $super_admin->save();
        }
        return redirect('sa1991as')->with('success', 'Your password has been reset successfully. Please login!');
    }


    // Admin Profile
    public function profile()
    {
        $super_admin = Admin::findOrFail(session('online_super_admin')->id);
        return view("super-admin.profile", compact("super_admin"));
    }

    public function updateProfile(Request $request)
    {
        $super_admin = Admin::findOrFail(session('online_super_admin')->id);
        // Validation
        $request->validate([
            'username' => 'required|unique:admins,username,'.$super_admin->id,
            "email" => "required|email|unique:admins,email," .$super_admin->id,
            "profile_picture" => "image|mimes:png,jpg,jpeg"
        ]);
        $super_admin->fill($request->all());
        // Password
        if ($request->filled('password')) {
            $request->validate([
                "password" => "required_with:confirm_password|same:confirm_password|min:8"
            ]);
            $super_admin->password = Hash::make($request->password);
        }
        // Image
        if (isset($request->profile_picture)) {
            // Delete Old Image First
            if ($super_admin->profile_picture != null) {
                $image_path = public_path() . '/storage/admin-images/' . $super_admin->profile_picture;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            // Saving New Image
            $image = $request->profile_picture;
            $image_name = uniqid() . '.' . $image->extension();
            $request->profile_picture->storeAs('public/admin-images', $image_name);
            $super_admin->profile_picture = $image_name;
        }
        // Save and return with success
        $super_admin->save();
        $request->session()->put('online_super_admin', $super_admin);
        return back()->with("success", "Your Profile has been updated successfully");
    }


    public function adminManagers(Request $request)
    {
        return Admin::where('admin_id', $request->admin_id)->where('role', 'manager')->get();
    }
}
