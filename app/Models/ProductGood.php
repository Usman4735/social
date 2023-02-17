<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGood extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "group_id",
        "status",
        "description"
    ];

    public function group() {
        return $this->belongsTo(ProductGroup::class, "group_id");
    }
}
