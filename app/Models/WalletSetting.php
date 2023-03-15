<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletSetting extends Model
{
    protected $fillable = [
        "name",
        "api_key",
        "secret_key",
        "wallet_address",
        "network",
    ];
}
