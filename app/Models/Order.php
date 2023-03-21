<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function order_customer()
    {
        return $this->belongsTo(Customer::class, "customer_id");
    }
    public function order_products()
    {
        return $this->hasMany(OrderDetails::class, "order_id");
    }
    public function group() {
        return $this->belongsTo(ProductGroup::class, "group_id");
    }
    

}
