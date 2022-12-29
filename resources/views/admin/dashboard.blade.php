@extends('layout.admin')

@section('style')
    <style>
        .btn-edit{
            background: none;
            color: 	#00ADEF;
            border: none;
        }
    </style>
@endsection
@section('content')
<div class="row mb-5">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h4 class="font-weight-bold">Welcome to Dashboard {{ $dashboard->name }} <button type="button" class="btn-edit" data-bs-toggle="modal" data-bs-target="#basicModal" style=""><i class='bx bx-edit'></i></button></h4>
                
                <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Change Dashboard name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/dashboard/{{ $dashboard->id }}" method="post">
            @csrf
            <div class="row">
              <div class="col mb-3">
                {{-- <label for="name" class="form-label">Name</label> --}}
                <input type="text" id="name" class="form-control" placeholder="Enter Name" name="name" required value="{{ old('name') }}" autocomplete="off" @error('name') is-invalid @enderror>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form> 
      </div>
    </div>
  </div>
@endsection
