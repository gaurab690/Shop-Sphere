<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>Blank Page | AdminKit Demo</title>

    <link href="{{ asset('admin_asset/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Shop Sphere</span>
                </a>

                <ul class="sidebar-nav">

                    <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Category
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('category.create') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('category.create') }}">
                            <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create
                                Category</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('category.manage') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('category.manage') }}">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage
                                Category</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Products
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('product.create') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('product.create') }}">
                            <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create
                                Product</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('product.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('product.index') }}">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage
                                Product</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Orders
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.order.history') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.order.history') }}">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage
                                order</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Settings
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('show.settings') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('show.settings') }}">
                            <i class="align-middle" data-feather="settings"></i> <span
                                class="align-middle">Settings</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Users
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('show.users') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('show.users') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Manage
                                Users</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-profile.html">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-sign-in.html">
                            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-sign-up.html">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign
                                Up</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">


                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.html"><i class="align-middle me-1"
                                        data-feather="settings"></i> Settings </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('admin_layout')

                </div>
            </main>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <script src="{{ asset('admin_asset/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>
