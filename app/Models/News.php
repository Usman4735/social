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

    public function GetSlug()
    {
        // $title='';
        // if ($this->seo_title!=null) {
        //     $title=$this->seo_title;
        // }
        // elseif($this->seo_url!=null) {
        //     $title=$this->seo_url;
        // }else {
        //     $title=$this->title;
        // }
        $slug = preg_replace('/\s+/u', '-', trim($this->seo_url));
        $slug = str_replace("/", "", $slug);
        $slug = str_replace("?", "", $slug);
        $slug = str_replace("%", "percent", $slug);
        return strtolower($slug);
    }
}
