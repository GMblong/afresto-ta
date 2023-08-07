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
                <li class="sidebar-item @if (Request::is('admin/dashboard')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MANAGE ALUMNI</span>
                </li>
                <li class="sidebar-item @if (Request::is('admin/create')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.alumni_create') }}" aria-expanded="false">
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
                    <span class="hide-menu">MANAGE NOTIFICATION</span>
                </li>
                <li class="sidebar-item @if (Request::is('admin/pemberitahuan')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.notification') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar-plus"></i>
                        </span>
                        <span class="hide-menu">Buat Pengumuman</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Request::is('admin/daftar-pengumuman')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.pengumuman') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard-list"></i>
                        </span>
                        <span class="hide-menu">Daftar Pengumuman</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Lowongan Pekerjaan</span>
                </li>
                <li class="sidebar-item @if (Request::is('admin/input-loker')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.job_create') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-transfer-in"></i>
                        </span>
                        <span class="hide-menu">Input Lowongan Kerja</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Request::is('admin/daftar-loker')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.job_list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Daftar Lowongan Kerja</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Request::is('admin/daftar-apply-kerja-alumni')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.alumni_apply') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Daftar Apply Kerja Alumni</span>
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
                </li>
                <li class="sidebar-item">
                    <button type="submit" class="btn btn-outline-danger btn-md w-100 my-4">
                        <span>
                            <i class="ti ti-logout"></i>
                        </span>
                        <span class="hide-menu">Logout</span>
                    </button>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
