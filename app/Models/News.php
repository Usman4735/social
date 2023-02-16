<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
    "title",
    "short_description",
    "long_description",
    "is_published",
     "seo_url",
     "seo_description",
     "seo_keyword",
     "seo_title",
     "seo_h1"
    ];
}
