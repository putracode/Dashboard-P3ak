<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/sneat/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard P3AK</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" href="/sneat/assets/img/favicon/favicon.ico" /> --}}
    <link href="/img/favicon.jpg" rel="icon">

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/sneat/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/sneat/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/sneat/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="/sneat/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/sneat/assets/js/config.js"></script>

    <style>
    .light-style .authentication-wrapper.authentication-basic .authentication-inner:after {
      background-image: none !important
    }

    .authentication-wrapper.authentication-basic .authentication-inner:before{
      background: none !important
    }

    *{
      font-family: 'Jost', sans-serif;
    }
    </style>
  </head>

  <body id="vantajs">
    <!-- Content -->

    <div class="container-xxl" id="particles-js">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card shadow">
            <div class="card-body">

              {{-- <h4 class="mb-2">Welcome to Sneat! 👋</h4> --}}
              <p class="mb-4">Enter the password to access this page</p>

              <form id="formAuthentication" class="mb-3" action="/" method="POST">
                @csrf
                <div class="mb-3 form-password-toggle">
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="off" required value="{{ old('password') }}">
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <input type="hidden" value="User" name="name">
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Submit</button>
                </div>
              </form>

              <div class="float-end">
                <a href="/login" class="d-flex align-items-center justify-content-center">
                    admin
                    <i class="bx bx-chevron-right scaleX-n1-rtl bx-sm"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/sneat/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/sneat/assets/vendor/libs/popper/popper.js"></script>
    <script src="/sneat/assets/vendor/js/bootstrap.js"></script>
    <script src="/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/sneat/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/sneat/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>
    <script>
      $(document).ready(function(){        
        VANTA.FOG({
          el: "#vantajs",
          mouseControls: true,
          touchControls: true,
          gyroControls: false,
          minHeight: 200.00,
          minWidth: 200.00,
          highlightColor: 0x00adef,
          midtoneColor: 0x00adef,
          blurFactor: 0.24,
          speed: 0.20,
          zoom: 0.20
        })
      });
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.js" integrity="sha512-BgV3bZfMmUklIZI+dP0SILdmQ0RBY2gxegFFyfgo4Ui56WhKF4Pny9LsV/l96jxDDA+2w47zAXA4IyHo2UT/Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    {{-- <script>
      Particles.load('particles-js', 'particlesjs-config.json', function() {
        console.log('callback - particles.js config loaded');
      });
    </script> --}}
  </body>
</html>
