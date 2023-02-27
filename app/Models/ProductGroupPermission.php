<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroupPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        "see_price",
        "edit_price",
        "see_photos",
        "edit_photos",
        "see_description",
        "edit_description",
        "see_tags",
        "edit_tags"
    ];
}
