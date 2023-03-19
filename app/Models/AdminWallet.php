<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminWallet extends Model
{
    use HasFactory;

    public function wallet() {
        return $this->belongsTo(WalletSetting::class, "wallet_id");
    }
}
