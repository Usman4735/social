<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Smtp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplicationSettings;

class SettingController extends Controller
{

    // General settings
    public function generalSettings(Request $request)
    {
        $settings = ApplicationSettings::first();
        if(!$settings) {
            $settings = new ApplicationSettings();
            $settings->fill($request->all());
            $settings->save();
        }
        return view("super-admin.settings.general", compact("settings"));
    }

    public function updateGeneralSettings(Request $request)
    {
        $request->validate([
            "name" => "required",
            "logo" => "image|mimes:png,jpg,jpeg",
            "favicon" => "mimes:png,jpg,jpeg,ico"
        ]);
        $settings = ApplicationSettings::first();
        $settings->name = $request->name;

        // Logo
        if(isset($request->logo)) {
            if($settings->logo != null){
                $image_path = public_path().'/storage/logo/'. $settings->logo;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }

            $logo = $request->logo;
            $logo_name = uniqid() . '.' . $logo->extension();
            $request->logo->storeAs('public/logo', $logo_name);
            $settings->logo = $logo_name;
        }

        // Favicon
        if(isset($request->favicon)) {
            if($settings->favicon != null){
                $image_path = public_path().'/storage/logo/'. $settings->favicon;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $favicon = $request->favicon;
            $favicon_name = uniqid() . '.' . $favicon->extension();
            $request->favicon->storeAs('public/logo', $favicon_name);
            $settings->favicon = $favicon_name;
        }

        $settings->save();
        return back()->with("success", "Application Settings have been updated successfully");
    }

    // SMTP
    public function smtp() {
    // Check if there's an smtp row in table. If not, make an empty row and save it
        $smtp = Smtp::first();
        if (!$smtp) {
            $smtp = new Smtp();
            $smtp->save();
        }
        return view("super-admin.settings.smtp", compact("smtp"));
    }
    // Update SMTP
    public function updateSmtp(Request $request)
    {
        $smtp = Smtp::firstOrFail();
        $smtp->fill($request->all());
        // Filling password separately because we don't want to fill empty password
        if ($request->filled('password')) {
            $smtp->password = $request->password;
        }
        if ($request->isNotFilled('status')) {
            $smtp->status = 0;
        }
        $smtp->save();
        return back()->with("success", "SMTP Settings have been updated successfully");
    }
}
