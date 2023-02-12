<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\Mailer;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        return view("web.index");
    }

    public function register() {
        return view("web.register");
    }

    public function registerProcess(Request $request) {
        $request->validate([
            "username" => "required",
            "full_name" => "required",
            "password" => "required_with:confirm_password|same:confirm_password|min:8",
            "email" => "required|email|unique:customers"
        ]);
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->password = Hash::make($request->password);
        $customer->save();
        return redirect("login")->with("success", "Your account has been registered. Login to continue");
    }

    public function login() {
        return view("web.login");
    }

    public function loginProcess(Request $request) {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);
        $user = Customer::where("username", $request->username)->first();
        if ($user) {
            if ($user->block != 1) {
                $check_password = Hash::check($request->password, $user->password);
                if ($check_password) {
                    $request->session()->put('online_customer', $user);
                    return redirect("/");
                } else {
                    return back()->with("error", "Wrong username or password");
                }
            } else {
                return back()->with("error", "Your account is blocked. Please contact us for the recovery of your account");
            }
        } else {
            return back()->with("error", "Wrong username or password");
        }
    }

    public function logout(Request $request) {
        if($request->session()->has('online_customer')) {
            $request->session()->pull('online_customer');
        }
        return redirect("/");
    }


    public function forgotPassword()
    {
        return view("web.forgot-password");
    }

    public function processForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
            ],[
            "email.required" => "Email Not Found!"
        ]);
        $customer = Customer::where("email", $request->email)->first();
        if($customer) {
            $otp = rand(111111, 999999);
            $email = $customer->email;

            $password_reset=PasswordReset::where('email', $email)->latest()->first();
            $now = Carbon::now();

            if ($password_reset && $now->isBefore($password_reset->expire_at)) {
                $otp=$password_reset->otp;
            }else {
                $password_reset = new PasswordReset();
                $password_reset->email = $email;
                $password_reset->otp = $otp;
                $password_reset->expire_at=Carbon::now()->addMinutes(5);
                $password_reset->type = 0; // 10= for customers
                $password_reset->save();
            }


            $message = [
                'username' => $customer->username,
                'otp' => $otp
            ];

            $view = view("mails.otp", compact("message"))->render();
            Mailer::Send("Password Reset ", $view, $email);
            return redirect('otp/'.encrypt($password_reset->id))->with('success', 'OTP has been sent to your email!');
        }else {
            return back()->with(" error", "The email is invalid" );
        }
    }

    public function otp(Request $request, $id)
    {
        $password_reset_otp = PasswordReset::findOrFail(decrypt($id));
        return view('web.otp', compact('password_reset_otp'));
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
    $user=Customer::where('email', $password_reset_otp->email)->where('role', 'super_admin')->firstOrFail();
    if ($user) {
    $password_reset_otp->expire_at=Carbon::now();
    }
    return redirect('sa1991as/reset-password/'.encrypt($user->id));
    }

    public function resetPassword($id)
    {
    $user=Customer::findOrFail(decrypt($id));
    return view('web.reset-password', compact('user'))->with('success', "OTP verified successfully");
    }
    public function processResetPassword(Request $request)
    {
    $request->validate([
    "password" => "min:8|required_with:confirm_password|same:confirm_password"
    ]);
    $admin = Customer::where('id', decrypt($request->user))->where('role', 'super_admin')->firstOrFail();
    if ($admin) {
    $admin->password = Hash::make($request->password);
    $admin->save();
    }
    return redirect('sa1991as')->with('success', 'Your password has been reset successfully. Please login!');
    }
}
