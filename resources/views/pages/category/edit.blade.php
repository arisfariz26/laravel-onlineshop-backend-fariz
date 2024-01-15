

@extends('layouts.app')

@section('title', 'Category Edit')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
              <div class="section-header-back">
                <a href="{{ route('product.index') }}" class="btn btn-icon" style="font-size: 15px"><i class="fas fa-arrow-left"></i> All Category</a>
              </div>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Category</a></div>
                <div class="breadcrumb-item">Edit Category</div>
              </div>
            </div>

            <div class="section-body">


              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $category->name) }}" placeholder="Masukkan Name">
                          @error('name')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple" name="description">
                                {!! old('description', $category->description) !!}
                            </textarea>
                            @error('description')
                        <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                        </div>

                    </div>


                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Photo Category</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                          @error('image')
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
<!-- JS Libraies -->
<script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>


@endpush
