<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::whereNot("id", session('online_super_admin')->id)->get();
        return view("super-admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::where("role", "admin")->get();
        return view("super-admin.users.add", compact("admins"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "username" => "required|unique:admins",
            "email" => "required|unique:admins",
            "role" => "required",
            "profile_picture" => "image|mimes:png,jpg,jpeg",
            "password" => "required_with:confirm_password|same:confirm_password|min:8"
        ]);
        if($request->role == "manager") {
            $request->validate([
                "admin_id" => "required"
            ],
        [
            "admin_id.required" => "Admin Field is required"
        ]);
        }
        $user = new Admin();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        if($request->isNotFilled('status')) {
            $user->status = 0;
        }
        // Profile Picture
        if (isset($request->profile_picture)) {
            $picture = $request->profile_picture;
            $picture_name = uniqid() . '.' . $picture->extension();
            $request->profile_picture->storeAs('public/user-images', $picture_name);
            $user->profile_picture = $picture_name;
        }
        $user->save();
        return redirect("sa1991as/user-management")->with("success", "A new user has been saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::findOrFail(decrypt($id));
        $admins = Admin::where("role", "admin")->get();
        return view("super-admin.users.edit", compact("user", "admins"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "username" => "required|unique:admins,username,".decrypt($id),
            "email" => "required|unique:admins,email,".decrypt($id),
            "role" => "required",
            "profile_picture" => "image|mimes:png,jpg,jpeg",
        ]);
        if($request->role == "manager") {
            $request->validate([
                "admin_id" => "required"
            ],
        [
            "admin_id.required" => "Admin Field is required"
        ]);
        }
        $user = Admin::findOrFail(decrypt($id));
        $user->fill($request->all());
        if($request->filled('password')) {
            $request->validate([
                "password" => "required_with:confirm_password|same:confirm_password|min:8"
            ]);
        }
        $user->password = Hash::make($request->password);
        if($request->isNotFilled('status')) {
            $user->status = 0;
        }
        // Profile Picture
        if (isset($request->profile_picture)) {
            // Delete old profile picture first
            if ($user->profile_picture != null) {
                $image_path = public_path() . '/storage/user-images/' . $user->profile_picture;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $picture = $request->profile_picture;
            $picture_name = uniqid() . '.' . $picture->extension();
            $request->profile_picture->storeAs('public/user-images', $picture_name);
            $user->profile_picture = $picture_name;
        }
        $user->save();
        return redirect("sa1991as/user-management")->with("success", "A user has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail(decrypt($id));
        // Delete profile picture first
        if ($user->profile_picture != null) {
            $image_path = public_path() . '/storage/user-images/' . $user->profile_picture;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $user->delete();
        return redirect("sa1991as/user-management")->with("error", "A user has been deleted");
    }
}
