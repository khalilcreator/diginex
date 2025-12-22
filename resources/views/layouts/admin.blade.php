<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap (via Vite) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Custom Admin CSS -->
    <link href="{{ asset('css/admin-custom.css') }}" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Summernote via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <!-- <div class="version-text">Version 1.7</div> -->
                <h5 class="text-white">ADMIN PANEL</h5>
            </div>

            <div class="section-header">MAIN CONTENTS</div>
            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.index') }}" class="{{ request()->routeIs('admin.category*') ? 'active' : '' }}">
                        <i class="fas fa-tags"></i> Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.service.index') }}" class="{{ request()->routeIs('admin.service*') ? 'active' : '' }}">
                        <i class="fas fa-concierge-bell"></i> Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contact.index') }}" class="{{ request()->routeIs('admin.contact*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> Messages
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.index') }}" class="{{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i> Blogs
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Users
                    </a>
                </li>
            </ul>

            <div class="section-header">ACCOUNT</div>
            <ul class="list-unstyled components">
                 <li>
                    <a href="{{ route('home') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Site
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.index') }}" class="{{ request()->routeIs('admin.setting*') ? 'active' : '' }}">
                        <i class="fas fa-cogs"></i> Settings
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Top Header Area with Breadcrumbs & Actions -->
            <div class="top-bar">
                <div class="page-title">
                    <h1>@yield('page_title', 'Dashboard')</h1>
                </div>
                <div class="header-actions">
                    <!-- <button class="action-btn export">
                        <i class="fas fa-download"></i>
                        Export
                    </button>
                    <button class="action-btn reset">
                        <i class="fas fa-sync-alt"></i>
                        Reset
                    </button>
                    <button class="action-btn generate">
                        <i class="fas fa-chart-pie"></i>
                        Generate
                    </button> -->
                </div>
            </div>

            <!-- Breadcrumb Bar -->
            <div class="breadcrumb-area">
                <a href="#">Home</a> <span>></span> @yield('page_title', 'Dashboard')
            </div>

            <!-- Main Body -->
            <div class="main-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            if ($('.data-table').length) {
                $('.data-table').DataTable({
                    order: [[0, 'desc']],
                    pageLength: 10
                });
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
