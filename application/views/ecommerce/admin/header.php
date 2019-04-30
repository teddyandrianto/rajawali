<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Online Shop</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/assets/landing/img/lOGO_KE.png') ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/ecommerce/admin')?>/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/ecommerce/admin')?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/ecommerce/admin')?>/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/ecommerce/admin')?>/css/skins-admin.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/ecommerce/admin')?>/datatable/css/jquery.dataTables.min.css">
  
  <script src="<?php echo base_url('assets/ecommerce/admin')?>/js/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url('assets/ecommerce/')?>/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url('assets/ecommerce/admin')?>/js/app.js"></script>



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?php echo base_url('admin')?>" class="logo">
      <span class="logo-mini"><b>A</b>O</span>
      <span class="logo-lg"><b>Admin </b>Online Shop</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo base_url('assets/ecommerce/admin/profile/not-profile-admin.png') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['login']['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url('assets/ecommerce/admin/profile/not-profile-admin.png') ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['login']['nama'] ?> - Admin 
                  <small><?php echo $_SESSION['login']['telpon'] ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url('ecommerce/admin_profile') ?>" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('ecommerce') ?>/logout" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url('assets');?>/ecommerce/admin/profile/not-profile-admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['login']['nama'] ?></p>
          <a href="<?php echo base_url('admin/setting') ?>"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
        <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <li>
          <a href="<?php echo base_url('ecommerce/admin_dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url('ecommerce/admin_transaksi') ?>">
            <i class="fa fa-exchange"></i> <span>Transaksi</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url('ecommerce/admin_barang') ?>">
            <i class="fa fa-cubes"></i> <span>Data Barang</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url('ecommerce/admin_pembeli') ?>">
            <i class="fa fa-users"></i> <span>Pembeli</span>
          </a>
        </li>
         <li class="header">MAIN PROFIL</li>
        <li>
          <a href="<?php echo base_url('ecommerce/admin_profile') ?>">
            <i class="fa fa-cog"></i> <span>Profil</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url('ecommerce/logout') ?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>

    </section>
  </aside>   
