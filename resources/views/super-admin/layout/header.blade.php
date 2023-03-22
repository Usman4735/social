<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                            data-feather="menu"></i></a></li>
            </ul>
        </div>
        @php
            $notifications = Session::get('online_super_admin')->notifications();
            // $notifications = [];
        @endphp
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#"
                    data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
                        class="badge rounded-pill bg-danger badge-up notify-badge-notifications">{{ count($notifications) > 0 ? count($notifications) : 0 }}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                            <div class="badge rounded-pill badge-light-primary "><span
                                    class="notify-badge-notifications">{{ count($notifications) > 0 ? count($notifications) : 0 }}</span>
                                New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list notifications-list">
                        @if (count($notifications) < 1)
                            <div class="text-center pt-2 pb-2">No notification found</div>
                        @else
                            @foreach ($notifications as $notification)
                                @if ($loop->index <= 9)
                                    <a class="d-flex"
                                        href="{{ url('sa1991as/view-notification') }}/{{ encrypt($notification->id) }}">
                                        <div class="list-item d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <p class="mb-0 media-heading">
                                                    <strong>{{ $notification->title }}</strong>
                                                    <span
                                                        class="msg-time float-end text-secondary">{{ $notification->created_at->diffForHumans() }}</span>
                                                </p>
                                                <small
                                                    class="notification-text">{{ strlen($notification->message) > 55 ? substr($notification->message, 0, 55) . '...' : $notification->message }}</small>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        @endif

                    </li>
                    <li class="dropdown-menu-footer"><a
                            class="btn btn-primary w-100 waves-effect waves-float waves-light"
                            href="{{ url('sa1991as/notifications') }}">Read all notifications</a></li>
                </ul>
            </li>


            @php
                $admin = Session::get('online_super_admin');
            @endphp
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name fw-bolder">{{ $admin->full_name }}</span><span
                            class="user-status">{{ ucwords(str_replace('_', ' ', $admin->role)) }}</span></div><span
                        class="avatar">
                        @if ($admin->profile_picture)
                            <img class="round"src="{{ asset('storage/admin-images') }}/{{ $admin->profile_picture }}"
                                alt="Profile Picture"height="40" width="40"><span
                                class="avatar-status-online"></span>
                    </span>
                @else
                    <img class="round"src="{{ asset('images/user.png') }}" alt="Avatar"height="40"
                        width="40"><span class="avatar-status-online"></span></span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ url('sa1991as/profile') }}"><i class="me-50"
                            data-feather="user"></i>Profile</a>
                    <a class="dropdown-item" href="{{ url('sa1991as/messenger') }}"><i class="me-50"
                            data-feather="message-square"></i>Chats</a>
                    <a class="dropdown-item" href="{{ url('sa1991as/logout') }}"><i class="me-50"
                            data-feather="power"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
