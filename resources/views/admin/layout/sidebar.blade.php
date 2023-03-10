<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand"
                    href="{{url('a1aa')}}"><span class="brand-logo">
                        <img src="{{asset('images/logo.png')}}" alt="logo">
                    </span>
                    <h2 class="brand-text">{{env('APP_NAME')}}</h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('a1aa') }}"><i
                        data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboard">Dashboard</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('a1aa/product-groups') }}"><i
                        data-feather="package"></i><span class="menu-title text-truncate"
                        data-i18n="Product Groups">Product Groups</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('a1aa/product-goods') }}"><i
                        data-feather="package"></i><span class="menu-title text-truncate"
                        data-i18n="Product Goods">Product Goods</span></a>
            </li>
             <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('a1aa/product-categories') }}"><i
                        data-feather="archive"></i><span class="menu-title text-truncate"
                        data-i18n="Product Category">Product Categories</span></a>
            </li>
             <li class=" nav-item"><a class="d-flex align-items-center"
                    href="{{ url('a1aa/orders') }}"><i data-feather="shopping-cart"></i><span
                        class="menu-title text-truncate" data-i18n="Sales Order">Sales Order</span></a>
            </li>
        </ul>
    </div>
</div>
