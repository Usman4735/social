<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Smtp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
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
