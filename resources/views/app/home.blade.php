<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
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
    <link rel="icon" type="image/x-icon" href="/sneat/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/sneat/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/sneat/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/sneat/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/sneat/assets/vendor/js/helpers.js"></script>
    <script src="/sneat/assets/js/config.js"></script>

    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- LightGallery --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lightgallery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lg-thumbnail.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lg-fullscreen.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lg-autoplay.min.css">

    <style>
      
    </style>
  </head>

  <body>
    
    <div class="container-fluid shadow-sm  mb-3">

      <div class="row d-flex justify-content-between align-items-center">
        <div class="col-md-4">
          <img src="/img/logo.png" alt="logo" class="logo" width="250px" height="100px">
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <h3 style="font-weight: bold; color: #00ADEF;">DASHBOARD P3AK</h3>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
          @can('user')          
            <a href="/login" class="btn btn-primary px-5">Admin</a>
          @endcan
          @can('admin')
            <a href="/admin/dashboard" class="btn btn-primary px-5">Admin</a>
          @endcan
          {{-- @guest
            <a href="/login" class="btn btn-primary px-5">Admin</a>
          @endguest
          @auth
            <a href="/admin/dashboard" class="btn btn-primary px-5">Admin</a>
          @endauth --}}
        </div>
      </div>
      <div class="row d-flex justify-content-center py-3">
        <div class="col-md-12 d-flex justify-content-center">
          @foreach ($kategori as $row)            
            <button class="me-3 linkmodal" data-id="{{ $row->id }}"><span class="pill">{{ $row->kategori }}</span></button>
          @endforeach
        </div>
        {{--  --}}
      </div>
    </div>
    <div class="container-fluid">      
      <div class="row">
        <div class="col-md-5">
          <div class="galeriContainer" id="galeriContainer" style="width: 100%; height: 350px">
            @foreach ($galeri as $row)            
              <a data-lg-size="" class="gallery-item" data-src="{{ asset('storage/' . $row->foto1) }}" data-sub-html="{{ $row->caption1 }}">
    
              </a>
              <a data-lg-size="" class="gallery-item" data-src="{{ asset('storage/' . $row->foto2) }}" data-sub-html="{{ $row->caption2 }}">
                
              </a>
              <a data-lg-size="" class="gallery-item" data-src="{{ asset('storage/' . $row->foto3) }}" data-sub-html="{{ $row->caption3 }}">
                
              </a>
              <a data-lg-size="" class="gallery-item" data-src="{{ asset('storage/' . $row->foto4) }}" data-sub-html="{{ $row->caption4 }}">
                
              </a>
              <a data-lg-size="" class="gallery-item" data-src="{{ asset('storage/' . $row->foto5) }}" data-sub-html="{{ $row->caption5 }}">
                
              </a>
            @endforeach
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title text-center">Highlight</h5>
              <ul class="list-group list-group-flush">
                <div class="row">

                  @foreach ($highlight as $row)
                  <div class="col-md-6 d-flex justify-content-center align-items-center">
                    @if (file_exists('storage/' . $row->url))
                      <li class="mb-3 mt-3 text-center" style="list-style: none;"><a href="{{ asset('storage/' . $row->url) }}" target="_blank" class="highlight-a">{{ $row->title }}</a></li>
                    @else
                      <li class="mb-3 mt-3 text-center" style="list-style: none;"><a href="{{ $row->url }}" target="_blank" class="highlight-a">{{ $row->title }}</a></li>
                    @endif
                  </div>
                  @endforeach
                </div>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mb-4" >
            <div class="card-header" style="background: #00ADEF">

              <h5 class="card-title text-center m-0" style="color: white"><i class='bx bx-globe me-2' ></i>Link Aplikasi</h5>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <div class="row">
                  @foreach ($aplikasi as $row)
                      <div class="col-md-4 d-flex justify-content-center align-items-center mb-3 mt-3">
                        {{-- <a href="{{ $row->url }}"><img src="{{ asset('storage/' . $row->icon) }}" alt class="icon-aplikasi" style="object-fit: cover"></a>                           --}}
                        {{-- <div class="icon-circle" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>{{ $row->title }}</span>">
                          <img src="/img/logo.png" alt="" width="100%">
                        </div> --}}
                        <a href="{{ $row->url }}" class="icon-circle" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>{{ $row->title }}</span>" target="_blank"><img src="/img/logo.png" alt="" width="100%"></a>
                      </div>
                  @endforeach
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-links" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-links">Modal title</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <ul>
              
            </ul>
          </div>
        </div>
      </div>
    </div>




    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/sneat/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/sneat/assets/vendor/libs/popper/popper.js"></script>
    <script src="/sneat/assets/vendor/js/bootstrap.js"></script>
    <script src="/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/sneat/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/sneat/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/sneat/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/sneat/assets/js/dashboards-analytics.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    
    <!-- Lightgallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/fullscreen/lg-fullscreen.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/autoplay/lg-autoplay.min.js" integrity="sha512-oG7u2dCYcRZMqByim5wriswqGpgny7a8e6vhcQnGxtFVDQbbFZ9Oi/ShsVF+uN6FEGoyjhi9TotQn7gxAzfA6g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      $('.linkmodal').on('click', function(){
        open_modal($(this).attr('data-id'));
    })

    function open_modal(id){
        $.ajax({
            url: '/modal',
            type: 'GET',
            data: { id: id },
            success: function(response){
              const title_modal = $('#modal-links .modal-header h5');
              title_modal.empty();
              title_modal.html(`${response.kategori.kategori}`)

              const ul_modal = $('#modal-links .modal-body ul');
              ul_modal.empty();
              $.each(response.data, function(i, value){
                ul_modal.append(`<li class="mb-2"><a href="${value.url}" target="_blank">${value.title}</a></li>`)
              })
              $('#modal-links').modal('show');
            }, 
            error: function(err){
              console.log(err);
            }
        });
    }

    let icon = $('.icon-circle')
    for(let i = 1; i <= icon.length; i++)
    $(icon[i]).on('click', function () {
      $(this).blur()
    })

    const lgContainer = document.getElementById("galeriContainer");
    const lg = lightGallery(lgContainer, {
      speed: 500,
      container: lgContainer,
      closable: false,
      allowMediaOverlap: true,
      showMaximizeIcon: true,
      slideShowAutoplay:true,
      download: false,  
      plugins: [lgAutoplay]
    });
    lg.openGallery(0);
    </script>
  </body>
</html>
