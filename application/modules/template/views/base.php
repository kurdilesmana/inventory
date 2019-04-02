<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('head'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <?php $this->load->view('main_header'); ?>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php $this->load->view('sidebar_menu'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php $this->load->view('content_header'); ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php $this->load->view($content_view); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <?php $this->load->view('footer'); ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <?php $this->load->view('control_sidebar'); ?>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view('js'); ?>
</body>
</html>
