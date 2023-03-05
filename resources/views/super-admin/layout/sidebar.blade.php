<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{ url('sa1991as') }}"><span class="brand-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </span>
                    <h2 class="brand-text">{{ env('APP_NAME') }}</h2>
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
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('sa1991as') }}"><i
                        data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0)"><i
                        data-feather="package"></i><span class="menu-title text-truncate"
                        data-i18n="Produts">Produts</span></a>
                <ul class="menu-content">
                    <li class=" nav-item"><a class="d-flex align-items-center"
                            href="{{ url('sa1991as/product-groups') }}"><i data-feather="circle"></i><span
                                class="menu-title text-truncate" data-i18n="Product Groups">Product Groups</span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center"
                            href="{{ url('sa1991as/product-goods') }}"><i data-feather="circle"></i><span
                                class="menu-title text-truncate" data-i18n="Product Goods">Product Goods</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center"
                    href="{{ url('sa1991as/product-categories') }}"><i data-feather="archive"></i><span
                        class="menu-title text-truncate" data-i18n="Product Category">Product Categories</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center"
                    href="{{ url('sa1991as/orders') }}"><i data-feather="shopping-cart"></i><span
                        class="menu-title text-truncate" data-i18n="Product Category">Orders</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('sa1991as/gallery') }}"><i
                        data-feather="image"></i><span class="menu-title text-truncate" data-i18n="Media Gallery">Media
                        Gallery</span></a>


            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('sa1991as/news') }}"><i
                        data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="News">News</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('sa1991as/testimonials') }}"><i
                        data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="Testimonials">Testimonials</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('sa1991as/user-management') }}"><i
                        data-feather="users"></i><span class="menu-title text-truncate" data-i18n="User Management">User
                        Management</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0)"><i
                        data-feather="tool"></i><span class="menu-title text-truncate"
                        data-i18n="Settings">Settings</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ url('/sa1991as/settings/general') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">General
                                Settings</span></a></li>
                    <li><a class="d-flex align-items-center" href="{{ url('/sa1991as/settings/smtp') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">SMTP</span></a></li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('sa1991as/banners') }}"><i
                                data-feather="image"></i><span class="menu-title text-truncate"
                                data-i18n="Banners">Banners</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
