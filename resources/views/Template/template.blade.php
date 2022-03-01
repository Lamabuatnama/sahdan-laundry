@include('Template.atas')
<!-- Site wrapper -->

  <!-- Navbar -->
@include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('template.sidebar')

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
        @yield('content')
        </div><!-- /.container-fluid -->
        </section>

         <!-- Main content -->

        <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->
@include('template.bawah')

