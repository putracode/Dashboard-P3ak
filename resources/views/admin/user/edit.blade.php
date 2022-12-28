@extends('layout.admin')

@section('content')

<h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Edit/</span> User</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="/admin/user/{{ $user->id }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="is_approve" value="Approved">
                    {{-- <input type="hidden" name="password_change" value="true"> --}}
                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="name">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name',$user->name) }}" autocomplete="off">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="role" class="form-label col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                @if ($user->role == "admin")
                                    <option value="2" selected>Admin</option>
                                    <option value="1">User</option>
                                @else
                                    <option value="1" selected>User</option>
                                    <option value="2">Admin</option>
                                @endif
                            </select>

                            @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email',$user->email) }}" autocomplete="off">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="password">password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control @error('password') @enderror" id="password" name="password" required placeholder="Password" value="{{ $user->password }}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div> --}}
                    
                    <div class="row justify-content-end">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary float-end px-5 btn-sm">Save</button>
                            <a href="/admin/user" class="btn btn-danger px-5 me-2 float-end btn-sm">Cancel</a>
                            {{-- <a href="/admin/user/password" class="btn btn-info px-5 me-2 float-start btn-sm">Change Password</a> --}}
                            <button type="button" class="btn btn-info btn-sm px-5 float-start" data-bs-toggle="modal" data-bs-target="#basicModal">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Change Password</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
            <form action="/admin/user/password/{{ $user->id }}" method="POST">
                @csrf            
                <div class="row">
                  <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') @enderror" id="password" name="password" required placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" autocomplete="off" value="{{ old('password') }}">
                    @error('password')
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