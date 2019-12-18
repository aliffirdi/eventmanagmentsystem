<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//die(var_dump($user_id));
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PencakSilat | EMS</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url("vendor/adminlte3/"); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("vendor/adminlte3/"); ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url("vendor/adminlte3/"); ?>plugins/datatables/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url(""); ?>#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(""); ?>" class="brand-link">
      <img src="<?php echo base_url("vendor/adminlte3/"); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Event Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url("vendor/adminlte3/"); ?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url(""); ?>#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url(""); ?>" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Event Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(""); ?>" class="nav-link">
              <i class="nav-icon fas fa-award"></i>
              <p>
                Assessment System
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("user/score"); ?>" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Scoreboard
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Event Management System</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button onclick="window.location.href = '<?php echo base_url("user/register"); ?>'" class="btn btn-primary"><i class="nav-icon fas fa-plus-square"></i>&nbsp; Tambah Pertandingan</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Event List</h5>
              </div>
              <div class="card-body">

              <table id="event_list" class="table table-bordered table-responsive table-striped">
                <thead>
                <tr>
                  <th>Babak</th>
                  <th>Kelas Tanding</th>
                  <th>Kontingen Sudut Biru</th>
                  <th>Nama Peserta Sudut Biru</th>
                  <th>Nilai Sudut Biru</th>
                  <th>Kontingen Sudut Merah</th>
                  <th>Nama Peserta Sudut Merah</th>
                  <th>Nilai Sudut Merah</th>
                  <th>Pemenang Pertandingan</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody><?php $query = $this->db->query("SELECT * FROM pertandingan"); foreach ($query->result() as $row) { ?>
                <tr>
                  <td><?php echo strtoupper($row->babak); ?></td>
                  <td><?php echo strtoupper($row->kelas_tanding); ?></td>
                  <td><?php echo strtoupper($row->kontingen_biru); ?></td>
                  <td><?php echo strtoupper($row->nama_biru); ?></td>
                  <td><?php if ($row->nilai_biru == null) {echo"-";} else {echo strtoupper($row->nilai_biru);} ?></td>
                  <td><?php echo strtoupper($row->kontingen_merah); ?></td>
                  <td><?php echo strtoupper($row->nama_merah); ?></td>
                  <td><?php if ($row->nilai_merah == null) {echo"-";} else {echo strtoupper($row->nilai_merah);} ?></td>
                  <td><?php if ($row->pemenang == null) {echo"BELUM TANDING";} else {echo strtoupper($row->pemenang);} ?></td>
                  <td><a class="btn btn-primary text-white btn-block" href="<?php echo base_url("user/scoremgmt/".$row->id); ?>">Scoreboard</a>
                          <button type="button" class="btn btn-success text-white btn-block dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>Penilaian
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url("user/penilaian/".$row->id."/1"); ?>">Juri 1</a>
                            <a class="dropdown-item" href="<?php echo base_url("user/penilaian/".$row->id."/2"); ?>">Juri 2</a>
                            <a class="dropdown-item" href="<?php echo base_url("user/penilaian/".$row->id."/3"); ?>">Juri 3</a>
                            <a class="dropdown-item" href="<?php echo base_url("user/penilaian/".$row->id."/4"); ?>">Juri 4</a>
                            <a class="dropdown-item" href="<?php echo base_url("user/penilaian/".$row->id."/5"); ?>">Juri 5</a>
                          </div>
                  </td>
                </tr><?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Babak</th>
                  <th>Kelas Tanding</th>
                  <th>Kontingen Sudut Biru</th>
                  <th>Nama Peserta Sudut Biru</th>
                  <th>Nilai Sudut Biru</th>
                  <th>Kontingen Sudut Merah</th>
                  <th>Nama Peserta Sudut Merah</th>
                  <th>Nilai Sudut Merah</th>
                  <th>Pemenang Pertandingan</th>
                  <th>Opsi</th>
                </tr>
                </tfoot>
              </table>

              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Template design by <a href="https://adminlte.io">AdminLTE.io</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?> By Alif Firdi.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url("vendor/adminlte3/"); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url("vendor/adminlte3/"); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url("vendor/adminlte3/"); ?>dist/js/adminlte.min.js"></script>
<!-- Datatable -->
<script src="<?php echo base_url("vendor/adminlte3/"); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url("vendor/adminlte3/"); ?>plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $('#event_list').DataTable({
      "paging": true,
      "responsive": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
</body>
</html>
