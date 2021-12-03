<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Panel Control | 2021</title>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/css/icheck-bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/vendor/summernote/summernote.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
  include_once 'Controller/AutentificacionController.php';
  $au = new AutentificacionController();
  $au->validAuthen();
?>
<div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SISTEMAS DE <sup>Notas</sup></div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="?view=Home">
    <i class="fas fa-fw fa-home"></i>
    <span>Inicio</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link" href="?view=Notas">
    <i class="fas fa-fw fa-box"></i>
    <span>Notas</span></a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-file-pdf"></i>
    <span>Reportes</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Tipos de Reportes:</h6>
      <a class="collapse-item" target="_blank" href="?view=Venta&action=ReporteVentaPDF">Ventas</a>
      <a class="collapse-item" href="?view=Venta&action=ReporteDeProductosPDF">Almacen</a>
      <!-- <a class="collapse-item" href="cards.html">Desperfectos</a> -->
    </div>
  </div>
</li>
<?php if($_SESSION['roles_id'] == 1){ ?>
<li class="nav-item">
  <a class="nav-link" href="?view=Matriculas">
    <i class="fas fa-address-book"></i>
    <span>Matricula</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?view=Usuarios">
    <i class="fas fa-fw fa-user"></i>
    <span>Usuarios</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="?view=Materias">
    <i class="fas fa-fw fa-book"></i>
    <span>Materias</span></a>
</li>
<!-- <li class="nav-item">
  <a class="nav-link" href="?view=Clientes">
    <i class="fas fa-fw fa-user-astronaut"></i>
    <span>Clientes</span></a>
</li> -->

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Utilidades</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Utilidad Personalizadas:</h6>
      <a class="collapse-item" href="?view=Roles">Roles de usuarios</a>
      <a class="collapse-item" href="?view=Grados">Grados</a>
      <a class="collapse-item" href="?view=Secciones">Secciones</a>
      <a class="collapse-item" href="?view=Contrataciones">Contrataciones</a>
    </div>
  </div>
</li>
<?php } ?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>   
   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Search -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - Search Dropdown (Visible Only XS) -->

      <!-- Nav Item - Alerts -->

  
      <div class="topbar-divider d-none d-sm-block"></div>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="?view=Autentificacion&action=Index"   >
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">
          Cerrar Sesión
          </span>
        </a>
     
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->