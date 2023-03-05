<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckoutResponse extends Component
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('components.checkout-response');
    }
}
