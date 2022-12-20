@extends('layout.admin')

@section('content')

<h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Create/</span> Links</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="/admin/link" method="POST" enctype="multipart/form-data">
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

                    <div class="row mb-4">
                        <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="kategori_id">
                                <option selected disabled hidden></option>
                                @foreach ($kategori as $row)
                                    @if(old('kategori_id') == $row->id)
                                        <option value="{{ $row->id }}" selected>{{ $row->kategori }}</option>
                                    @else
                                        <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="type" class="form-label col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="type">
                                @if (old('type') == 'url')
                                    <option value="url" selected>Link URL</option>
                                    <option value="file">Upload File</option>
                                @elseif (old('type') == 'file')
                                    <option value="url">Link URL</option>
                                    <option value="file" selected>Upload File</option>
                                @else
                                    <option selected disabled hidden value="0"></option>
                                    <option value="url">Link URL</option>
                                    <option value="file">Upload File</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4" style="visibility: hidden" id="input">
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

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary float-end px-4 btn-sm">Save</button>
                            <a href="/admin/link" class="btn btn-danger px-4 me-2 float-end btn-sm">Cancel</a>
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
        let input = document.querySelector('#input');
        let labelInput = document.querySelector('#labelInput');

        this.value == '0' ? input.style.visibility = 'hidden' : input = input.style.visibility = 'visible';
        this.value == 'url' ? url.type = 'text' : url = url.type = 'file';
        this.value == 'url' ? labelInput.innerHTML = 'URL' : url = labelInput.innerHTML = 'File';
    }
</script>
@endsection