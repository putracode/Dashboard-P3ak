@extends('layout.admin')

@section('content')

<h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Edit/</span> Galeri</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="/admin/galeri/{{ $galeri->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-4">
                        <label class="form-label" for="foto1">Foto 1</label>
                        <input type="hidden" name="lama1" value="{{ $galeri->foto1 }}">
                        @if ($galeri->foto1)
                            <img src="{{ asset('storage/' . $galeri->foto1 ) }}" alt="" class="img-preview1 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @else
                            <img class="img-preview1 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @endif
                        <input type="file" class="form-control @error('foto1') is-invalid @enderror" id="foto1" name="foto1" value="{{ old('foto1') }}" autocomplete="off" onchange="previewImage1()">
                        @error('foto1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="caption1">Caption 1</label>
                        <input type="text" class="form-control @error('caption1') is-invalid @enderror" id="caption1" name="caption1" required value="{{ old('caption1',$galeri->caption1) }}" autocomplete="off">
                        @error('caption1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="foto2">Foto 2</label>
                        <input type="hidden" name="lama2" value="{{ $galeri->foto2 }}">
                        @if ($galeri->foto2)
                            <img src="{{ asset('storage/' . $galeri->foto2 ) }}" alt="" class="img-preview2 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @else
                            <img class="img-preview2 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @endif
                        <input type="file" class="form-control @error('foto2') is-invalid @enderror" id="foto2" name="foto2" value="{{ old('foto2') }}" autocomplete="off" onchange="previewImage2()">
                        @error('foto2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="caption2">Caption 2</label>
                        <input type="text" class="form-control @error('caption2') is-invalid @enderror" id="caption2" name="caption2" required value="{{ old('caption2',$galeri->caption2) }}" autocomplete="off">
                        @error('caption2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="foto3">Foto 3</label>
                        <input type="hidden" name="lama3" value="{{ $galeri->foto3 }}">
                        @if ($galeri->foto3)
                            <img src="{{ asset('storage/' . $galeri->foto3 ) }}" alt="" class="img-preview3 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @else
                            <img class="img-preview3 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @endif
                        <input type="file" class="form-control @error('foto3') is-invalid @enderror" id="foto3" name="foto3" value="{{ old('foto3') }}" autocomplete="off" onchange="previewImage3()">
                        @error('foto3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="caption3">Caption 3</label>
                        <input type="text" class="form-control @error('caption3') is-invalid @enderror" id="caption3" name="caption3" required value="{{ old('caption3',$galeri->caption3) }}" autocomplete="off">
                        @error('caption3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="foto4">Foto 4</label>
                        <input type="hidden" name="lama4" value="{{ $galeri->foto4 }}">
                        @if ($galeri->foto4)
                            <img src="{{ asset('storage/' . $galeri->foto4 ) }}" alt="" class="img-preview4 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @else
                            <img class="img-preview4 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @endif
                        <input type="file" class="form-control @error('foto4') is-invalid @enderror" id="foto4" name="foto4" value="{{ old('foto4') }}" autocomplete="off" onchange="previewImage4()">
                        @error('foto4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="caption4">Caption 4</label>
                        <input type="text" class="form-control @error('caption4') is-invalid @enderror" id="caption4" name="caption4" required value="{{ old('caption4',$galeri->caption4) }}" autocomplete="off">
                        @error('caption4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="foto5">Foto 5</label>
                        <input type="hidden" name="lama5" value="{{ $galeri->foto5 }}">
                        @if ($galeri->foto5)
                            <img src="{{ asset('storage/' . $galeri->foto5 ) }}" alt="" class="img-preview5 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @else
                            <img class="img-preview5 mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                        @endif
                        <input type="file" class="form-control @error('foto5') is-invalid @enderror" id="foto5" name="foto5" value="{{ old('foto5') }}" autocomplete="off" onchange="previewImage5()">
                        @error('foto5')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="caption5">Caption 5</label>
                        <input type="text" class="form-control @error('caption5') is-invalid @enderror" id="caption5" name="caption5" required value="{{ old('caption5',$galeri->caption5) }}" autocomplete="off">
                        @error('caption5')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary float-end px-5 btn-sm">Save</button>
                            <a href="/admin/galeri" class="btn btn-danger px-5 me-2 float-end btn-sm">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage1(){
        const image = document.querySelector("#foto1");
        const imgPreview = document.querySelector(".img-preview1");

        imgPreview.style.display = "block";

        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
    function previewImage2(){
        const image = document.querySelector("#foto2");
        const imgPreview = document.querySelector(".img-preview2");

        imgPreview.style.display = "block";

        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
    function previewImage3(){
        const image = document.querySelector("#foto3");
        const imgPreview = document.querySelector(".img-preview3");

        imgPreview.style.display = "block";

        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
    function previewImage4(){
        const image = document.querySelector("#foto4");
        const imgPreview = document.querySelector(".img-preview4");

        imgPreview.style.display = "block";

        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
    function previewImage5(){
        const image = document.querySelector("#foto5");
        const imgPreview = document.querySelector(".img-preview5");

        imgPreview.style.display = "block";

        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>

@endsection