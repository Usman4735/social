<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "product_categories";
    protected $fillable = [
        "name",
        "parent_category",
        "category_description",
        "pre_moderation",
        "seo_url",
        "seo_description",
        "seo_keyword",
        "seo_title",
        "seo_h1",
    ];

    public function parent_category() {
        return ProductCategory::find($this->parent_category);
    }
}
