<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admins";
    protected $fillable = [
        "full_name",
        "username",
        "email",
        "mobile",
        "role",
        "status"
    ];
    // protected $fillable = ['username', 'mobile', 'first_name', 'last_name', 'email'];
    protected $guarded = ['password'];
}
