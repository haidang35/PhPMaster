<!DOCTYPE html>
<html lang="en">
<x-head/>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
   <x-nav/>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
  <x-aside/>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       @yield("main")
    </div>
    <!-- /.content-wrapper -->
  <x-footer/>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<x-scripts/>
</body>
</html>
