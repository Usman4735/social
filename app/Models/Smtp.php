<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smtp extends Model
{
    protected $fillable = [
    "host",
    "port",
    "username",
    "encryption",
    "from_email",
    "from_name",
    "status"
    ];
}
