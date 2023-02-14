<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'mobile', 'first_name', 'last_name', 'email'];
    protected $guarded = ['password'];
}
