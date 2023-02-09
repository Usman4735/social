<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('online_super_admin')) {
            return view("super-admin.dashboard");
        } else {
            return view("super-admin.login");
        }
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);
        $admin = Admin::where("username", $request->username)->where("role", "super_admin")->first();
        if ($admin) {
            if ($admin->status != 1) {
                return back()->with("error", "Your account has been Blocked.");
            }
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put("online_super_admin", $admin);
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
}
