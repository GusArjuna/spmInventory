<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ url('img/favicon.png') }}">
  <title>
    {{ $title }}
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{URL::asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />
  <link id="pagestyle" href="{{ url('css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 d-flex align-items-center" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html" target="_blank">
          <img src="{{ url('img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo" width="70px">
          <div class="ms-2">
              <span class="font-weight-bold d-block">CV Surya Perkasa</span>
              <span class="font-weight-bold d-block">Mandiri</span>
          </div>
      </a>
  </div>  
    <hr class="horizontal dark mt-0 mb-0">
    <p class="mt-0 mb-0" style="color: black"><center>SPM Digital Inventory</center></p>
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($pages == 'Dashboard') ? 'active' : '' }}" href="{{ url('/home') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-tv text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#colapse" role="button" aria-expanded="false" aria-controls="colapse">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-th-list text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Barang Inventaris</span>
          </a>
          <div class="collapse" id="colapse">
            <ul class="nav flex-column ms-3">
                {{-- <li class="nav-item">
                    <a class="nav-link {{ ($pages == 'Jenis') ? 'active' : '' }}" href="/jenis">
                      <i class="fas fa-boxes text-primary text-sm opacity-10"></i>
                      Jenis Barang
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ ($pages == 'Suku Cadang') ? 'active' : '' }}" href="/sukucadang">
                      <i class="fas fa-truck-loading text-primary text-sm opacity-10"></i>
                      Suku Cadang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($pages == 'Alat') ? 'active' : '' }}" href="/alat">
                      <i class="fas fa-tools text-primary text-sm opacity-10"></i>
                      Alat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($pages == 'Teknisi') ? 'active' : '' }}" href="/teknisi">
                      <i class="fas fa-people-carry text-primary text-sm opacity-10"></i>
                      Teknisi
                    </a>
                </li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($pages == 'Laporan Kerusakan') ? 'active' : '' }}" href="{{ url('/laporankerusakan') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-house-damage text-danger text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan Kerusakan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($pages == 'Laporan Peminjaman') ? 'active' : '' }}" href="{{ url('laporanpeminjaman') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-sticky-note text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan Peminjaman</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($pages == 'Laporan Pembelian') ? 'active' : '' }}" href="{{ url('laporanpembelian') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-store text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan Pembelian</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($pages == 'Laporan Penjualan') ? 'active' : '' }}" href="{{ url('laporanpenjualan') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-shopping-cart text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan Penjualan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($pages == 'Algoritma Wagner Within') ? 'active' : '' }}" href="{{ url('wagner') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-solid fa-chart-line text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Algoritma Wagner Within</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account Setting</h6>
        </li>
        <li class="nav-item">
          <form id="logout-form" action="/logout" method="post" style="display: none;">
            @csrf
          </form>
        
          <button class="nav-link-text ms-1" style="background-color: transparent; border: none; display: flex; align-items: center;padding-left:20px;" onclick="confirmLogout()">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-sign-out-alt text-warning text-sm opacity-10"></i>
            </div>
            <span>Log out</span>
          </button>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ url('/') }}">Dashboard</a></li>
            {!! isset($linkPages) ? '<li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="' . url($linkPages) . '">' . $sebelum . '</a></li>' : '' !!}
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $pages }}</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">{{ $pages }}</h6>  
        </nav>
        {{-- <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
        </div> --}}
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('bagan')
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script> Tugas Akhir Ryo Teguh
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Dashboard Setting</h5>
          <p>See dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ url('js/core/popper.min.js') }}"></script>
  <script src="{{ url('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ url('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ url('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ url('js/plugins/chartjs.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmLogout(){
      Swal.fire({
            title: 'Are you sure?',
            text: "You are about to log out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, log out',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the logout form
                document.getElementById('logout-form').submit();
            }
        });
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ url('js/argon-dashboard.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  @yield('javascript')
</body>

</html>