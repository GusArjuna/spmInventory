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
  <link href="{{ url('css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ url('css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ url('css/nucleo-svg.css') }}" rel="stylesheet" />
  <link id="pagestyle" href="{{ url('css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
    </div>
    <div class="container">
      <div class="row mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register</h5>
            </div>
            <div class="card-body">
              <form role="form" method="POST" action="/register">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" aria-label="username" name="username" value="{{ old('username') }}" autofocus required>
                  @error('username')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" name="password" required>
                  @error('password')
                      <div class="alert alert-danger" style="color: white">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                </div>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="/login" class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> 2024 Ryo Teguh
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ url('js/core/popper.min.js') }}"></script>
  <script src="{{ url('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ url('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ url('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ url('js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>