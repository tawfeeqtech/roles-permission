<html lang="en">

<head>
    @include('admin.layouts.inc.head')
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.layouts.inc.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.inc.navbar')
        <!-- End Navbar -->
        @yield('profile')
        <div class="container-fluid py-4">
            @yield('content')


            @include('admin.layouts.inc.footer')
        </div>
    </main>

    @include('admin.layouts.inc.script')
</body>

</html>
