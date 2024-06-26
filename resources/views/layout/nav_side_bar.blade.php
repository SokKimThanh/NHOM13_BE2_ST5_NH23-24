<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('BE/admin/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('BE/admin/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('BE/admin/css/styles.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark bg-success">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><img src="{{ asset('BE/admin/images/toggle.png') }}" alt="" class="icon"></a>
        </li>
      </ul>

      <!-- Right navbar links-->
      <ul class="navbar-nav ml-auto">   
        <li class="nav-item">
          <a class="nav-link" href="{{ route('page', ['page'=>'index']) }}" role="button">
            <img src="{{ asset('BE/admin/images/shop.png') }}" class="icon" alt="">
            <i class="fas">Xem Webside</i>
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile.edit') }}" role="button">
            <img src="{{ asset('BE/admin/images/user.png') }}" class="icon" alt="">
            <i class="fas">Quản lý tài khoản cá nhân</i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">      
      <!-- Brand Logo -->
      <a href="#" class="brand-link bg-success">
        <i class="fas">Trang Quản Lý</i>
      </a>
      <div class="sidebar">
      <!-- Sidebar -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item bg-success rounded mb-2">
            <a href="#" class="nav-link">
              <img src="{{ asset('BE/admin/images/user.png') }}" alt="" class="icon">
              <p>
                Quản Lý Tài Khoản                
              </p>
              <img src="{{ asset('BE/admin/images/down.png') }}" alt="" class="icon down"> 
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage', ['page'=>'addAccount']) }}" class="nav-link text-light">
                  <img src="{{ asset('BE/admin/images/add.png') }}" alt="" class="icon">
                  <p>Thêm Tài Khoản</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage', ['page'=>'listAccount']) }}" class="nav-link text-light">
                  <img src="{{ asset('BE/admin/images/list.png') }}" alt="" class="icon">                  
                  <p>Danh Sách Tài Khoản</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item bg-success rounded mb-2">
            <a href="#" class="nav-link">
              <img src="{{ asset('BE/admin/images/customer.png') }}" alt="" class="icon">              
              <p>
                Quản Lý Khách Hàng                
              </p>
              <img src="{{ asset('BE/admin/images/down.png') }}" alt="" class="icon down"> 
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage', ['page'=>'addCustomer']) }}" class="nav-link text-light">
                  <img src="{{ asset('BE/admin/images/add.png') }}" alt="" class="icon">                  
                  <p>Thêm Khách Hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage', ['page'=>'listCustomer']) }}" class="nav-link text-light">
                  <img src="{{ asset('BE/admin/images/list.png') }}" alt="" class="icon">                  
                  <p>Danh Sách Khách Hàng</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item bg-success rounded mb-2">
            <a href="#" class="nav-link">
              <img src="{{ asset('BE/admin/images/product.png') }}" alt="" class="icon">                     
              <p>
                Quản Lý Sản Phẩm                
              </p>
              <img src="{{ asset('BE/admin/images/down.png') }}" alt="" class="icon down"> 
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage', ['page'=>'addProduct']) }}" class="nav-link text-light">
                  <img src="{{ asset('BE/admin/images/add.png') }}" alt="" class="icon">                  
                  <p>Thêm Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage', ['page'=>'listProduct']) }}" class="nav-link text-light">
                  <img src="{{ asset('BE/admin/images/list.png') }}" alt="" class="icon">                  
                  <p>Danh Sách Sản Phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item bg-success rounded mb-2">
            <a href="#" class="nav-link">
              <img src="{{ asset('BE/admin/images/member.png') }}" alt="" class="icon">                     
              <p>
                Quản Lý Thành Viên                
              </p>
              <img src="{{ asset('BE/admin/images/down.png') }}" alt="" class="icon down"> 
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage', ['page'=>'addMember']) }}" class="nav-link text-light">
                  <img src="{{ asset('BE/admin/images/add.png') }}" alt="" class="icon">                  
                  <p>Thêm Thành Viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage', ['page'=>'listMember']) }}" class="nav-link text-light">
                  <img src="{{ asset('BE/admin/images/list.png') }}" alt="" class="icon">                  
                  <p>Danh Sách Thành Viên</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar -->
      </div>
    </aside>
    <!-- /.Main Sidebar Container -->


    <!-- Vùng Content-->
    <div class="content-wrapper">
    <!--  <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard v3</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v3</li>
              </ol>
            </div>
          </div>
        </div>
      </div>-->
    @yield('content')
    @extends('layout.footer')    
    </div>
    <!-- Đóng Vùng content -->


  </div>

  <!-- jQuery -->
  <script src="{{ asset('BE/admin/js/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('BE/admin/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE -->
  <script src="{{ asset('BE/admin/js/adminlte.js') }}"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="{{ asset('BE/admin/js/Chart.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('BE/admin/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('BE/admin/js/dashboard3.js') }}"></script>
</body>

</html>