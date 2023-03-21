<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductGood extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "name",
        "group_id",
        "admin_id",
        "manager_id",
        "status",
        "description",
    ];

    public function group() {
        return $this->belongsTo(ProductGroup::class, "group_id");
    }
    public function product_good_status() {
        return $this->belongsTo(ProductGoodStatus::class, "status");
    }
    public function manager() {
        return $this->belongsTo(Admin::class, "manager_id");
    }
    public function admin() {
        return $this->belongsTo(Admin::class, "admin_id");
    }

    public function product_images() {
        return $this->hasMany(ProductGoodImage::class, "good_id");
    }
}
