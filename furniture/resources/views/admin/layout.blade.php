<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin panel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Include jQuery -->


<!-- Include the latest version of Select2 -->
<script src="{{asset('backendassets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <!-- Favicons -->
  <link href="{{asset('backendassets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('backendassets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
    <script src="{{asset('backendassets/vendor/tinymce/tinymce.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <link href="{{asset('backendassets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <link href="{{asset('backendassets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('backendassets/css/style.css')}}" rel="stylesheet">


  <script>
  
    </script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="backendassets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin Panel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

      
       
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
           @if(Session::get('username'))
            <span class="d-none d-md-block dropdown-toggle ps-2">
              
             Welcome {{Session::get('username')}}
            </span>
            @endif
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            @if(Session::get('username'))

              <h6>{{Session::get('username')}}</h6>
              @endif

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           
            <li>
              <hr class="dropdown-divider">
            </li>

          
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{url('admin/logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class='bx bx-category'></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/categories')}}">
              <i class="bi bi-circle"></i><span>Create category</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/categorylist')}}">
              <i class="bi bi-circle"></i><span>Category list</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
        <i class='bx bx-palette' ></i><span>Colors</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/color')}}">
              <i class="bi bi-circle"></i><span>Create color</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/colorlist')}}">
              <i class="bi bi-circle"></i><span>Colors list</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
        <i class='bx bx-font-size'></i><span>Sizes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/size')}}">
              <i class="bi bi-circle"></i><span>Create size</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/sizelist')}}">
              <i class="bi bi-circle"></i><span>Size list</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

   
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class='bx bxl-product-hunt' ></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/addproduct')}}">
              <i class="bi bi-circle"></i><span>Add Product </span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/productlist')}}">
              <i class="bi bi-circle"></i><span>Product list</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
        <i class='bx bxs-calendar-check'></i> <span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="order-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/orders')}}">
              <i class="bi bi-circle"></i><span>Orders detail</span>
            </a>
          </li>
       
          
        </ul>
      </li><!-- End Components Nav -->
    
    
      <li class="nav-heading">Pages</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="{{url('admin/contact')}}">
    <i class="bi bi-envelope"></i>
    <span>Contact</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="{{url('admin/users')}}">
    <i class="bx bx-user"></i>
    <span>Users</span>
  </a>
</li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  @yield('admin.dashboard')

  @yield('admin.categories')
  @yield('admin.categorylist')
  @yield('admin.categoryedit')

  @yield('admin.color')
  @yield('admin.colorlist')
  @yield('admin.coloredit')

  @yield('admin.size')
  @yield('admin.sizelist')
  @yield('admin.sizeedit')

  @yield('admin.addproduct')
  @yield('admin.productlist')
  @yield('admin.productedit')
  
  @yield('admin.orders')
  @yield('admin.orderdetail')
  @yield('admin.users')
  @yield('admin.contact')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Time Wonders</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  

  <!-- Template Main JS File -->

  <script src="{{asset('backendassets/js/main.js')}}"></script>


</body>

</html>