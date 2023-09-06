<!DOCTYPE html>
<html lang="en">
<base href="http://127.0.0.1:8000/dist/">
@include('template.include.head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('template.include.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.include.side')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        @include('template.include.footer')
    </div>
    <!-- ./wrapper -->

    @include('template.include.js')
</body>

</html>
