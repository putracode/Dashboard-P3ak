@extends('layout.admin')

@section('content')

<h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Create/</span> Aplikasi</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="/admin/aplikasi" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="title">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}" autocomplete="off">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4" id="input">
                        <label class="col-sm-2 col-form-label" for="url" id="labelInput">URL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" required value="{{ old('url') }}" autocomplete="off">
                            @error('url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="icon">Icon</label>
                        <div class="col-sm-10">
                            <img class="img-preview mb-3 img-fluid rounded-2" style="width: 250px; height: 150px; display: block; object-fit: cover">
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" required value="{{ old('icon') }}" autocomplete="off" onchange="previewImage()">
                            @error('icon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary float-end px-4 btn-sm">Save</button>
                            <a href="/admin/aplikasi" class="btn btn-danger px-4 me-2 float-end btn-sm">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
        const image = document.querySelector("#icon");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";

        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>
@endsection