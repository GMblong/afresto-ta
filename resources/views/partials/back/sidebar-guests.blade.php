<aside class="left-sidebar shadow border-0">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img">
                <img src="{{ asset('theme/src/assets/images/logos/logo.png') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item @if (Request::is('guest/dashboard')) active @endif">
                    <a class="sidebar-link" href="{{ route('guest.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MANAGE ALUMNI</span>
                </li>
                <li class="sidebar-item @if (Request::is('admin/daftar-alumni')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.alumni_add') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Input Alumni</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Request::is('admin/daftar-alumni')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.alumni_list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard-list"></i>
                        </span>
                        <span class="hide-menu">Daftar Alumni</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Request::is('admin/keterserapan-alumni')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.alumni_category') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-sitemap"></i>
                        </span>
                        <span class="hide-menu">Sebaran Alumni</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MANAGE ACCOUNT</span>
                </li>
                <li class="sidebar-item @if (Request::is('admin/account')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.account') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">My Account</span>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
