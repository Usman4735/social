<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        return view("front.index");
    }

    public function register() {
        return view("front.register");
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
        return view("front.login");
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
}
