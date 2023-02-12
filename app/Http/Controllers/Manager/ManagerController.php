<?php

namespace App\Http\Controllers\Manager;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Mailer;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('online_manager')) {
            return view("manager.dashboard");
        } else {
            return view("manager.login");
        }
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);
        $manager = Admin::where("username", $request->username)->where("role", "manager")->first();
        if ($manager) {
            if ($manager->status != 1) {
                return back()->with("error", "Your account has been Blocked.");
            }
            if (Hash::check($request->password, $manager->password)) {
                $request->session()->put("online_manager", $manager);
            } else {
                return back()->with("error", "Wrong username or password");
            }
        } else {
            return back()->with("error", "Wrong username or password");
        }
        return redirect('m1001m');
    }

    public function logout(Request $request)
    {
        if ($request->session()->has("online_manager")) {
        $request->session()->pull("online_manager");
            return redirect("m1001m");
        }
        return redirect("m1001m");
    }

    public function forgotPassword()
    {
        return view("manager.forgot-password");
    }

    public function processForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            ],[
            "email.required" => "Email Not Found!"
        ]);
        $manager = Admin::where("email", $request->email)->where("role", "manager")->first();
        if($manager) {

            $otp = rand(111111, 999999);
            $email = $manager->email;

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
                'username' => $manager->username,
                'otp' => $otp
            ];
            $view = view("mails.otp", compact("message"))->render();
            Mailer::Send("Password Reset ", $view, $email);
            return redirect('/m1001m/otp/'.encrypt($password_reset->id))->with('success', 'OTP has been sent to your email!');

        }else {
            return back()->with("error", "The email is invalid" );
        }
    }

    public function otp(Request $request, $id)
    {
        $password_reset_otp = PasswordReset::findOrFail(decrypt($id));
        return view('manager.otp', compact('password_reset_otp'));
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

        $user=Admin::where('email', $password_reset_otp->email)->where('role', 'manager')->firstOrFail();
        if ($user) {
            $password_reset_otp->expire_at=Carbon::now();
            $password_reset_otp->save();
        }
        return redirect('m1001m/reset-password/'.encrypt($user->id));
    }

    public function resetPassword($id)
    {
        $user=Admin::findOrFail(decrypt($id));
        return view('manager.reset-password', compact('user'))->with('success', "OTP verified successfully");
    }

    public function processResetPassword(Request $request)
    {
        $request->validate([
            "password" => "min:8|required_with:confirm_password|same:confirm_password"
        ]);

        $manager = Admin::where('id', decrypt($request->user))->where('role', 'manager')->firstOrFail();
        if ($manager) {
            $manager->password = Hash::make($request->password);
            $manager->save();
        }
        return redirect('m1001m')->with('success', 'Your password has been reset successfully. Please login!');
    }


    // Admin Profile
    public function profile()
    {
        $manager = Admin::findOrFail(session('online_manager')->id);
        return view("manager.profile", compact("manager"));
    }

    public function updateProfile(Request $request)
    {
        $manager = Admin::findOrFail(session('online_manager')->id);
        // Validation
        $request->validate([
            "first_name" =>"required",
            "last_name" =>"required",
            'username' => 'required|unique:admins,username,'.$manager->id,
            "email" => "required|email|unique:admins,email," .$manager->id,
            "profile_picture" => "image|mimes:png,jpg,jpeg"
        ]);
    $manager->fill($request->all());
    // Password
    if ($request->filled('password')) {
    $request->validate([
    "password" => "required_with:confirm_password|same:confirm_password|min:8"
    ]);
    $manager->password = Hash::make($request->password);
    }
    // Image
    if (isset($request->profile_picture)) {
    // Delete Old Image First
    if ($manager->profile_picture != null) {
    $image_path = public_path() . '/storage/admin-images/' . $manager->profile_picture;
    if (file_exists($image_path)) {
    unlink($image_path);
    }
    }
    // Saving New Image
    $image = $request->profile_picture;
    $image_name = uniqid() . '.' . $image->extension();
    $request->profile_picture->storeAs('public/admin-images', $image_name);
    $manager->profile_picture = $image_name;
    }
    // Save and return with success
    $manager->save();
    $request->session()->put('online_manager', $manager);
    return back()->with("success", "Your Profile has been updated successfully");
    }
}
