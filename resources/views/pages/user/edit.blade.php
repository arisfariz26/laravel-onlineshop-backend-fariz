
@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
   <!-- CSS Libraries -->
   <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
              <div class="section-header-back">
                <a href="{{ route('user.index') }}" class="btn btn-icon" style="font-size: 15px"><i class="fas fa-arrow-left"></i> All User</a>
              </div>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">User</a></div>
                <div class="breadcrumb-item">Edit User</div>
              </div>
            </div>

            <div class="section-body">


              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan Name">
                          @error('name')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan Email">
                          @error('email')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Masukkan Password">
                          @error('password')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Masukkan Phone">
                          @error('phone')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>


                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="ADMIN" class="selectgroup-input"
                                        @if ($user->roles == 'ADMIN') checked @endif>
                                    <span class="selectgroup-button">Admin</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="STAFF" class="selectgroup-input"
                                        @if ($user->roles == 'STAFF') checked @endif>
                                    <span class="selectgroup-button">Staff</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="roles" value="USER" class="selectgroup-input"
                                        @if ($user->roles == 'USER') checked @endif>
                                    <span class="selectgroup-button">User</span>
                                </label>

                            </div>
                          @error('email')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary">Sumbit</button>
                        </div>
                      </div>
                    </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>



    </div>
@endsection

@push('scripts')
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
