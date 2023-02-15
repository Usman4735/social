<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admins";
    protected $fillable = [
        "first_name",
        "last_name",
        "username",
        "email",
        "mobile",
        "role",
        "admin_id",
        "status"
    ];
    protected $guarded = ['password'];
}
