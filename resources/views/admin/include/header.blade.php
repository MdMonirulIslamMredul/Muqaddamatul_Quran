<header class="topbar" style="background-color: #1b4332; border-bottom: 2px solid #2d6a4f; position: fixed !important; top: 0 !important; left: 0 !important; right: 0 !important; width: 100% !important; z-index: 1050 !important;">
    <style>
        .topbar-nav-custom {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            align-items: center !important;
            justify-content: space-between !important;
            min-height: 75px !important;
            width: 100% !important;
            padding: 0 18px !important;
            position: relative !important;
            background-color: #1b4332 !important;
        }

        /* Mobile specific styles (< 768px) */
        @media (max-width: 767.98px) {
            .topbar-nav-custom {
                padding: 0 10px !important;
                min-height: 65px !important;
            }

            /* 1. Left: Hamburger + Logo Group */
            .topbar-mobile-left-nav {
                display: flex !important;
                align-items: center !important;
                flex-shrink: 0 !important;
                z-index: 3;
                gap: 8px !important;
            }
            .topbar-mobile-left-nav .nav-toggler {
                color: #ffffff !important;
                padding: 4px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                font-size: 25px !important;
                line-height: 1 !important;
                border: none !important;
                background: transparent !important;
                text-decoration: none !important;
            }
            .topbar-mobile-logo-img {
                height: 52px !important;
                width: auto !important;
                max-width: 130px !important;
                object-fit: contain !important;
                display: block !important;
            }

            /* 2. Right: 4 Icons in 1 Row + Profile Circle */
            .topbar-mobile-right-cluster {
                display: flex !important;
                flex-direction: row !important;
                flex-wrap: nowrap !important;
                align-items: center !important;
                margin-left: auto !important;
                z-index: 3;
                gap: 4px !important;
            }

            .topbar-m-icon {
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                width: 32px !important;
                height: 32px !important;
                min-width: 32px !important;
                max-width: 32px !important;
                border-radius: 50% !important;
                padding: 0 !important;
                margin: 0 !important;
                font-size: 14.5px !important;
                line-height: 1 !important;
                color: #ffffff !important;
                text-decoration: none !important;
                border: 1px solid rgba(255, 255, 255, 0.25) !important;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2) !important;
                transition: transform 0.15s ease !important;
                flex-shrink: 0 !important;
            }
            .topbar-m-icon:active, .topbar-m-icon:hover {
                transform: scale(1.1) !important;
                color: #ffffff !important;
            }

            .topbar-m-icon.m-site {
                background: rgba(255, 255, 255, 0.16) !important;
                border-color: rgba(255, 255, 255, 0.4) !important;
            }
            .topbar-m-icon.m-admission {
                background: #2d6a4f !important;
            }
            .topbar-m-icon.m-students {
                background: #0d6efd !important;
            }
            .topbar-m-icon.m-teachers {
                background: #d97706 !important;
            }

            .topbar-m-profile-btn {
                display: inline-flex !important;
                align-items: center !important;
                padding: 2px 6px 2px 2px !important;
                margin-left: 2px !important;
                background: rgba(255, 255, 255, 0.14) !important;
                border: 1px solid rgba(255, 255, 255, 0.28) !important;
                border-radius: 20px !important;
                text-decoration: none !important;
                flex-shrink: 0 !important;
                gap: 2px !important;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15) !important;
                transition: background 0.15s ease !important;
            }
            .topbar-m-profile-btn:active, .topbar-m-profile-btn:hover {
                background: rgba(255, 255, 255, 0.25) !important;
            }
            .topbar-m-avatar {
                width: 30px !important;
                height: 30px !important;
                border-radius: 50% !important;
                background: #ffffff !important;
                color: #1b4332 !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                font-weight: 700 !important;
                font-size: 13.5px !important;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) !important;
            }
        }

        /* Ensure topbar is permanently fixed to top of viewport */
        .fixed-layout .topbar,
        .topbar {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            z-index: 1050 !important;
        }

        /* Offset page-wrapper so content is not hidden beneath the fixed header */
        .fixed-layout .page-wrapper,
        .page-wrapper {
            padding-top: 75px !important;
        }

        /* Keep sidebar positioned below the fixed header */
        .fixed-layout .left-sidebar,
        .left-sidebar {
            position: fixed !important;
            top: 0 !important;
            padding-top: 75px !important;
            z-index: 1040 !important;
        }

        @media (max-width: 767.98px) {
            .fixed-layout .page-wrapper,
            .page-wrapper {
                padding-top: 65px !important;
            }
            .fixed-layout .left-sidebar,
            .left-sidebar {
                padding-top: 65px !important;
            }
        }

        /* Fix Desktop & Mobile Profile Dropdown Anchor & Sizing */
        .topbar .nav-item.dropdown,
        .topbar .u-pro,
        .topbar .dropdown,
        .topbar .top-navbar .navbar-nav > .nav-item.show,
        .topbar .top-navbar .navbar-nav > .nav-item {
            position: relative !important;
        }

        .topbar .u-pro .dropdown-menu,
        .topbar .dropdown-menu {
            position: absolute !important;
            right: 0 !important;
            left: auto !important;
            top: 100% !important;
            margin-top: 8px !important;
            width: auto !important;
            min-width: 220px !important;
            max-width: 280px !important;
            transform: none !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25) !important;
            border-radius: 8px !important;
            z-index: 1070 !important;
            float: none !important;
        }

        /* Desktop specific styles (>= 768px) */
        @media (min-width: 768px) {
            .topbar-desktop-brand {
                display: flex !important;
                align-items: center !important;
                flex-shrink: 0 !important;
            }
            .topbar-desktop-actions {
                display: flex !important;
                flex-direction: row !important;
                flex-wrap: nowrap !important;
                align-items: center !important;
                flex-grow: 1 !important;
                justify-content: space-between !important;
                margin-left: 15px !important;
            }
            .page-wrapper > .container-fluid {
                padding-top: 15px !important;
            }
        }
        
        @media (max-width: 767.98px) {
            .page-wrapper > .container-fluid {
                padding-top: 10px !important;
            }
        }
    </style>

    @php $logo = \App\Models\Logo::latest()->first() @endphp

    <nav class="navbar top-navbar topbar-nav-custom">
        <!-- ============================================================== -->
        <!-- MOBILE VIEW (Visible on < 768px) -->
        <!-- ============================================================== -->
        <!-- 1. Mobile Left: 3-bar Hamburger Menu + Logo -->
        <div class="topbar-mobile-left-nav d-flex d-md-none align-items-center">
            <a class="nav-toggler" href="javascript:void(0)" title="মেনু খুলুন/বন্ধ করুন" aria-label="Toggle Menu">
                <i class="ti-menu"></i>
            </a>
            <a href="{{ route('admin.home') }}" class="d-flex align-items-center">
                @if($logo && $logo->logo_image && file_exists(public_path($logo->logo_image)))
                    <img src="{{ asset($logo->logo_image) }}" alt="Logo" class="topbar-mobile-logo-img" />
                @else
                    <span class="text-white fw-bold" style="font-size: 16px;">মুকাদ্দামাতুল কুরআন</span>
                @endif
            </a>
        </div>

        <!-- 2. Mobile Right: 4 Icons in 1 Row + Profile Circle -->
        <div class="topbar-mobile-right-cluster d-flex d-md-none">
            <!-- 🌐 Website Icon -->
            <a class="topbar-m-icon m-site" href="{{ route('front.page') }}" target="_blank" title="ওয়েবসাইট দেখুন">
                <i class="ti-world"></i>
            </a>
            <!-- 📋 Admission Icon -->
            <a class="topbar-m-icon m-admission" href="{{ route('admissions.index') }}" title="ভর্তি আবেদন">
                <i class="ti-clipboard"></i>
            </a>
            <!-- 🪪 Students Icon -->
            <a class="topbar-m-icon m-students" href="{{ route('students.index') }}" title="ছাত্র তালিকা">
                <i class="ti-id-badge"></i>
            </a>
            <!-- 👤 Teachers Icon -->
            <a class="topbar-m-icon m-teachers" href="{{ route('teachers.index') }}" title="শিক্ষক তালিকা">
                <i class="ti-user"></i>
            </a>

            <!-- Profile Avatar Dropdown with Arrow Mark -->
            <div class="dropdown d-inline-block position-relative">
                <a class="topbar-m-profile-btn dropdown-toggle d-flex align-items-center" href="javascript:void(0)" data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="প্রোফাইল মেনু">
                    <div class="topbar-m-avatar">
                        {{ strtoupper(substr(Auth::User()->name ?? 'A', 0, 1)) }}
                    </div>
                    <i class="ti-angle-down text-white" style="font-size: 10px; font-weight: bold; margin-left: 2px;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-right animated flipInY shadow-lg border-0 rounded-3 py-2" style="position: absolute; right: 0; left: auto; top: 100%; min-width: 200px; z-index: 1060;">
                    <div class="px-3 py-2 border-bottom bg-light">
                        <strong class="d-block text-dark">{{ Auth::User()->name ?? 'Admin' }}</strong>
                        <small class="text-muted">{{ Auth::User()->email ?? '' }}</small>
                    </div>
                    <a href="{{ route('profile.settings') }}" class="dropdown-item py-2">
                        <i class="ti-settings me-2 text-primary"></i> প্রোফাইল সেটিংস
                    </a>
                    <a href="{{ route('front.page') }}" target="_blank" class="dropdown-item py-2">
                        <i class="ti-world me-2 text-success"></i> মূল ওয়েবসাইট
                    </a>
                    <div class="dropdown-divider my-1"></div>
                    <a href="javascript:void(0)" class="dropdown-item py-2 text-danger fw-bold" onclick="event.preventDefault(); document.getElementById('logoutFormMobile').submit()">
                        <i class="ti-power-off me-2"></i> লগআউট
                    </a>
                    <form action="{{ route('logout') }}" id="logoutFormMobile" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- DESKTOP VIEW (Visible on >= 768px) -->
        <!-- ============================================================== -->
        <!-- Desktop Brand Logo + Name -->
        <div class="topbar-desktop-brand d-none d-md-flex">
            <a class="navbar-brand d-flex align-items-center gap-2 py-1 my-0" href="{{ route('admin.home') }}">
                @if($logo && $logo->logo_image && file_exists(public_path($logo->logo_image)))
                    <img src="{{ asset($logo->logo_image) }}" alt="Logo" style="height: 64px; width: auto; object-fit: contain;" />
                @endif
                <div class="d-none d-lg-block text-start lh-1">
                    <span class="fw-bold text-white d-block" style="font-size: 16.5px;">মুকাদ্দামাতুল কুরআন</span>
                    <small class="d-block" style="font-size: 12px; color: rgba(255, 255, 255, 0.88); font-weight: 500;">Admin Portal</small>
                </div>
            </a>
        </div>

        <!-- Desktop Quick Links & Profile -->
        <div class="topbar-desktop-actions d-none d-md-flex">
            <ul class="navbar-nav me-auto align-items-center flex-row">
                <li class="nav-item"> 
                    <a class="nav-link sidebartoggler waves-effect waves-dark text-white px-2" href="javascript:void(0)" title="সাইডবার টগল">
                        <i class="ti-menu fs-5"></i>
                    </a> 
                </li>

                <!-- Quick Action Buttons (Desktop with text) -->
                <li class="nav-item ms-2"> 
                    <a class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold d-flex align-items-center gap-1 shadow-sm topbar-quick-btn" href="{{ route('front.page') }}" target="_blank" style="font-size: 12px;">
                        <i class="ti-world"></i> <span>ওয়েবসাইট দেখুন</span>
                    </a> 
                </li>
                <li class="nav-item ms-2"> 
                    <a class="btn btn-sm text-white rounded-pill px-3 fw-bold d-flex align-items-center gap-1 shadow-sm topbar-quick-btn" href="{{ route('admissions.index') }}" style="background-color: #2d6a4f; font-size: 12px; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="ti-clipboard"></i> <span>ভর্তি আবেদন</span>
                    </a> 
                </li>
                <li class="nav-item ms-2"> 
                    <a class="btn btn-sm text-white rounded-pill px-3 fw-bold d-flex align-items-center gap-1 shadow-sm topbar-quick-btn" href="{{ route('students.index') }}" style="background-color: #0d6efd; font-size: 12px;">
                        <i class="ti-id-badge"></i> <span>ছাত্র তালিকা</span>
                    </a> 
                </li>
                <li class="nav-item ms-2"> 
                    <a class="btn btn-sm text-white rounded-pill px-3 fw-bold d-flex align-items-center gap-1 shadow-sm topbar-quick-btn" href="{{ route('teachers.index') }}" style="background-color: #d97706; font-size: 12px;">
                        <i class="ti-user"></i> <span>শিক্ষক তালিকা</span>
                    </a> 
                </li>
            </ul>

            <!-- Desktop User Profile -->
            <ul class="navbar-nav my-lg-0 align-items-center flex-row">
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic d-flex align-items-center gap-2 py-1 px-3 rounded-pill" style="background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);" href="#" data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 14px; color: #1b4332 !important;">
                            {{ strtoupper(substr(Auth::User()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="text-start d-none d-md-block lh-1 text-white">
                            <span class="fw-bold d-block" style="font-size: 13px;">{{ Auth::User()->name ?? 'Admin' }}</span>
                            <small class="d-block" style="font-size: 10.5px; color: rgba(255, 255, 255, 0.88); font-weight: 500;">সুপার অ্যাডমিন</small>
                        </div>
                        <i class="ti-angle-down text-white small ms-1"></i>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right animated flipInY shadow-lg border-0 rounded-3 py-2" style="min-width: 200px;">
                        <div class="px-3 py-2 border-bottom bg-light">
                            <strong class="d-block text-dark">{{ Auth::User()->name ?? 'Admin' }}</strong>
                            <small class="text-muted">{{ Auth::User()->email ?? '' }}</small>
                        </div>
                        <a href="{{ route('profile.settings') }}" class="dropdown-item py-2">
                            <i class="ti-settings me-2 text-primary"></i> প্রোফাইল সেটিংস
                        </a>
                        <a href="{{ route('front.page') }}" target="_blank" class="dropdown-item py-2">
                            <i class="ti-world me-2 text-success"></i> মূল ওয়েবসাইট
                        </a>
                        <div class="dropdown-divider my-1"></div>
                        <a href="javascript:void(0)" class="dropdown-item py-2 text-danger fw-bold" onclick="event.preventDefault(); document.getElementById('logoutFormDesktop').submit()">
                            <i class="ti-power-off me-2"></i> লগআউট (Logout)
                        </a>
                        <form action="{{ route('logout') }}" id="logoutFormDesktop" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>


