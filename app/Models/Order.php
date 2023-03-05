<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function order_customer()
    {
        return $this->belongsTo(Customer::class, "customer_id");
    }
    public function order_products()
    {
        return $this->hasMany(OrderDetails::class, "id");
    }

}
