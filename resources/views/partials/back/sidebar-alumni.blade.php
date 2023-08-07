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
                <li class="sidebar-item @if (Request::is('alumni/dashboard')) active @endif">
                    <a class="sidebar-link" href="{{ route('alumni.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Alumni</span>
                </li>
                <li class="sidebar-item @if (Request::is('alumni/daftar-alumni')) active @endif">
                    <a class="sidebar-link" href="{{ route('alumni.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard-list"></i>
                        </span>
                        <span class="hide-menu">Daftar Alumni</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Request::is('alumni/pengumuman')) active @endif">
                    <a class="sidebar-link" href="{{ route('alumni.pengumuman') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-notebook"></i>
                        </span>
                        <span class="hide-menu">Pengumuman</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Lowongan Pekerjaan</span>
                </li>
                <!-- <li class="sidebar-item @if (Request::is('alumni/input-loker')) active @endif">
                    <a class="sidebar-link" href="{{ route('alumni.input_loker') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-transfer-in"></i>
                        </span>
                        <span class="hide-menu">Input Lowongan Kerja</span>
                    </a>
                </li> -->
                <li class="sidebar-item @if (Request::is('alumni/daftar-lowongan-kerja')) active @endif">
                    <a class="sidebar-link" href="{{ route('alumni.loker_list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Daftar Lowongan Kerja</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MANAGE ACCOUNT</span>
                </li>
                <li class="sidebar-item @if (Request::is('alumni/account')) active @endif">
                    <a class="sidebar-link" href="{{ route('alumni.account') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">My Account</span>
                    </a>
                </li>
                <li class="mt-3">
                    <a href="#" class="btn btn-outline-danger btn-md rounded-pill w-100">
                        <span><i class="ti ti-logout"></i></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
