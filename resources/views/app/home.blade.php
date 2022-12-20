<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>
<body>
  <div class="container-fluid shadow-sm">

    <div class="row d-flex justify-content-around align-items-center">
      <div class="col-md-4">
        <img src="/img/logo.png" alt="logo" class="logo" width="250px" height="100px">
      </div>
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <h3 style="font-weight: bold; color: #00ADEF;">DASHBOARD P3AK</h3>
      </div>
      <div class="col-md-4 d-flex justify-content-end ">
        <a href="/login" class="btn btn-primary px-5">Admin</a>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 d-flex justify-content-center">
        @foreach ($kategori as $row)            
          <button style="border: none; padding: 0!important; color: #000000; cursor: pointer; background: none !important;" class="me-3 linkmodal" data-id="{{ $row->id }}">{{ $row->kategori }}</button>
        @endforeach
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>



  <!-- Modal -->
<div class="modal fade" id="modal-links" tabindex="-1" aria-labelledby="modal-links" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-links">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          
        </ul>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
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
              const title_modal = $('#modal-links .modal-header h1');
              title_modal.empty();
              title_modal.html(`${response.kategori.kategori}`)

              const ul_modal = $('#modal-links .modal-body ul');
              ul_modal.empty();
              $.each(response.data, function(i, value){
                ul_modal.append(`<li><a href="${value.url}" target="_blank">${value.title}</a></li>`)
              })
              $('#modal-links').modal('show');
            }, 
            error: function(err){
              console.log(err);
            }
        });
    }

    // let linkmodal = document.querySelectorAll('.linkmodal')

    // for(let i = 0; i < linkmodal.length; i++){
    //   $(function(){
    //      $(linkmodal[i]).click(function() {
    //         var id = $(linkmodal[i]).attr('data-id')
    //         modal(id)
    //      });
    //   });    
    // }

    // function modal(id){
    // $.ajax({
    //     url: '/modal',
    //     type: 'GET',
    //     data: { id: id },
    //     success: function(response)
    //     {
    //       console.log(response);
    //       var resultData = response.data;
    //       var kategori = response.kategori;
    //       var modalKategori = document.querySelector('#modalKategori');
    //       $.each(resultData, function(index,row){
    //         var linkURL = row.url
    //         $('#modalKategori').html('<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h1 class="modal-title fs-5" id="exampleModalLabel">'+ kategori.kategori +'</h1><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><ul><li><a href="'+ linkURL +'" target="_blank">'+ row.title +'</a></li></ul></div></div></div></div>') 
    //           })
    //         }
    //     });
    // }
</script>
</body>
</html>

