@extends('layout.admin')

@section('content')

<h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Edit/</span> Aplikasi</h4>

{{-- {{ $type = '' }} --}}
@if(Storage::exists($aplikasi->url))
    {{ $type = 'file' }}
@else
    {{ $type = 'url' }}
@endif

<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="/admin/aplikasi/{{ $aplikasi->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="title">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title',$aplikasi->title) }}" autocomplete="off">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="type" class="form-label col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="type">
                                <option value="" hidden disabled></option>
                                <option value="url" {{ $type == 'url' ? 'selected' : '' }}>Link URL</option>
                                <option value="file" {{ $type == 'file' ? 'selected' : '' }}>Upload File</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4" id="input">
                        <label class="col-sm-2 col-form-label" for="url" id="labelInput">URL</label>
                        <div class="col-sm-10">
                            <input type="{{ $type == 'url' ? 'text' : 'file' }}" class="form-control @error('url') is-invalid @enderror" id="url" name="url" required value="{{ old('url',$aplikasi->url) }}" autocomplete="off">
                            @error('url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary float-end px-5 btn-sm">Save</button>
                            <a href="/admin/aplikasi" class="btn btn-danger px-5 me-2 float-end btn-sm">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('#type').addEventListener('change', inputChange);

    function inputChange(){
        let url = document.querySelector('#url');
        let labelInput = document.querySelector('#labelInput');

        this.value == 'url' ? url.type = 'text' : url = url.type = 'file';
        this.value == 'url' ? labelInput.innerHTML = 'URL' : url = labelInput.innerHTML = 'File';
    }
    
</script>

@endsection