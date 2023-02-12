<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Mailer;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('online_admin')) {
            return view("admin.dashboard");
        } else {
            return view("admin.login");
        }
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);
        $admin = Admin::where("username", $request->username)->where('role', 'admin')->first();
        if ($admin) {
            if ($admin->status != 1) {
                return back()->with("error", "Your account has been Blocked.");
            }
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put("online_admin", $admin);
            } else {
                return back()->with("error", "Wrong username or password");
            }
        } else {
            return back()->with("error", "Wrong username or password");
        }
        return redirect('a1aa');
    }
    public function logout(Request $request)
    {
    if ($request->session()->has("online_admin")) {
        $request->session()->pull("online_admin");
            return redirect("a1aa");
        }
        return redirect("a1aa");
    }

    public function forgotPassword()
    {
        return view("admin.forgot-password");
    }

    public function processForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            ],[
            "email.required" => "Email Not Found!"
        ]);
        $admin = Admin::where("email", $request->email)->where("role", "admin")->first();
        if($admin) {

            $otp = rand(111111, 999999);
            $email = $admin->email;

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
            'username' => $admin->username,
            'otp' => $otp
            ];

            $view = view("mails.otp", compact("message"))->render();
            Mailer::Send("Password Reset ", $view, $email);
            return redirect('/a1aa/otp/'.encrypt($password_reset->id))->with('success', 'OTP has been sent to your email!');
        }else {
            return back()->with("error", "The email is invalid" );
        }
    }

    public function otp(Request $request, $id)
    {
        $password_reset_otp = PasswordReset::findOrFail(decrypt($id));
        return view('admin.otp', compact('password_reset_otp'));
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
        $user=Admin::where('email', $password_reset_otp->email)->where('role', 'admin')->firstOrFail();
        if ($user) {
            $password_reset_otp->expire_at=Carbon::now();
            $password_reset_otp->save();
        }
        return redirect('a1aa/reset-password/'.encrypt($user->id));
    }

    public function resetPassword($id)
    {
        $user=Admin::findOrFail(decrypt($id));
        return view('admin.reset-password', compact('user'))->with('success', "OTP verified successfully");
    }

    public function processResetPassword(Request $request)
    {
        $request->validate([
            "password" => "min:8|required_with:confirm_password|same:confirm_password"
        ]);
        $admin = Admin::where('id', decrypt($request->user))->where('role', 'admin')->firstOrFail();
        if ($admin) {
            $admin->password = Hash::make($request->password);
            $admin->save();
        }
        return redirect('a1aa')->with('success', 'Your password has been reset successfully. Please login!');
    }


    // Admin Profile
    public function profile()
    {
        $admin = Admin::findOrFail(session('online_admin')->id);
        return view("admin.profile", compact("admin"));
    }

    public function updateProfile(Request $request)
    {
        $admin = Admin::findOrFail(session('online_admin')->id);
        // Validation
        $request->validate([
            'username' => 'required|unique:admins,username,'.$admin->id,
            "email" => "required|email|unique:admins,email," .$admin->id,
            "profile_picture" => "image|mimes:png,jpg,jpeg"
        ]);
        $admin->fill($request->all());
        // Password
        if ($request->filled('password')) {
            $request->validate([
                "password" => "required_with:confirm_password|same:confirm_password|min:8"
            ]);
            $admin->password = Hash::make($request->password);
        }
        // Image
        if (isset($request->profile_picture)) {
            // Delete Old Image First
            if ($admin->profile_picture != null) {
                $image_path = public_path() . '/storage/admin-images/' . $admin->profile_picture;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            // Saving New Image
            $image = $request->profile_picture;
            $image_name = uniqid() . '.' . $image->extension();
            $request->profile_picture->storeAs('public/admin-images', $image_name);
            $admin->profile_picture = $image_name;
        }
        // Save and return with success
        $admin->save();
        $request->session()->put('online_admin', $admin);
        return back()->with("success", "Your Profile has been updated successfully");
    }
}
