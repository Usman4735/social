<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "category_id",
        "price",
        "manager_salary",
        "manager_salary_type",
        "description",
        "seo_url",
        "seo_description",
        "seo_keyword",
        "seo_title",
        "seo_h1",
        "admin_id",
        "manager_id",
    ];

    public function category() {
        return $this->belongsTo(ProductCategory::class, "category_id");
    }
    public function admin() {
        return $this->belongsTo(Admin::class, "admin_id");
    }
    public function manager() {
        return $this->belongsTo(Admin::class, "manager_id");
    }
}
