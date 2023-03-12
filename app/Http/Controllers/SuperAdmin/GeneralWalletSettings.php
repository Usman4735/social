<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\WalletSetting;
use Illuminate\Http\Request;

class GeneralWalletSettings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = WalletSetting::where("type", "general")->get();
        return view("super-admin.wallet-settings.general.index", compact("wallets"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("super-admin.wallet-settings.general.add");
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
            "name" => "required",
            "api_key" => "required",
            "secret_key" => "required"
        ]);
        $wallet = new WalletSetting();
        $wallet->fill($request->all());
        $wallet->type = "general";
        $wallet->status = 1;
        $wallet->save();
        return redirect("sa1991as/wallet-settings/general-wallet")->with("success", "A General Wallet has been saved successfully");
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
        $wallet = WalletSetting::findOrFail(decrypt($id));
        return view("super-admin.wallet-settings.general.edit", compact("wallet"));
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
            "name" => "required",
            "api_key" => "required",
            "secret_key" => "required"
        ]);
        $wallet = WalletSetting::findOrFail(decrypt($id));
        $wallet->fill($request->all());
        $wallet->save();
        return redirect("sa1991as/wallet-settings/general-wallet")->with("success", "A General Wallet has been updated successfully");
    }

    public function changeStatus($id) {
        $wallet = WalletSetting::findOrFail(decrypt($id));
        $wallet->status = ! $wallet->status;
        $wallet->save();
        return redirect("sa1991as/wallet-settings/general-wallet")->with("success", "A status has been changed successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = WalletSetting::findOrFail(decrypt($id));
        $wallet->delete();
        return redirect("sa1991as/wallet-settings/general-wallet")->with("error", "A General Wallet has been removed");
    }
}
