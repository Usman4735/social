<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

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

    // only for manager panel
    public function manager_permission($product) {
        return ProductGroupPermission::where('product_group_id', $product)->where('manager_id', $this->id)->first();
    }
}
