
@extends('layouts.app')

@section('title', 'Categories')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category</h1>
                <div class="section-header-button">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Category</a></div>
                    <div class="breadcrumb-item">All Category</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="width:100%" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $key => $category)
                                            <tr>
                                                <td>{{ $key +1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{!! $category->description !!}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('/storage/kategori/'.$category->image) }}" class="rounded mb-3" style="width: 150px">
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                    <a href='{{ route('category.edit', $category->id) }}'
                                                        class="btn btn-sm btn-info btn-icon mr-3">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>

                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-times"></i> Delete
                                                        </button>
                                                    </form>
                                                    </div>
                                                </td>

                                            </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Kategori belum Tersedia.
                                            </div>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
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

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

    <!-- Page Specific JS File -->
    <script>
        $("#table-1").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [2,3] }
            ]
            });
    </script>
@endpush
