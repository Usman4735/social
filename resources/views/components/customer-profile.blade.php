<div class="col-lg-3 col-md-4">
    <div class="myaccount-tab-menu nav" role="tablist">
        <a href="{{ url('/account') }}" class="{{ Request::is('account*')? 'active' : ' '}} "><i class="fa fa-dashboard"></i> Dashboard</a>
        <a href="{{ url('/orders') }}" class="{{ Request::is('orders*')? 'active' : ' '}}"><i class="fa fa-file"></i> History of Orders</a>
        <a href="{{ url('/order-verifications') }}" class="{{ Request::is('order-verifications*')? 'active' : ' '}}"><i class="fa fa-cart-arrow-down"></i> Order Verification</a>
        <a href="{{ url('/profile') }}" class="{{ Request::is('profile*')? 'active' : ' '}}"><i class="fa fa-user"></i> Account Details</a>
        @if (Session::has('online_customer'))
            <a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
        @endif
    </div>
</div>
