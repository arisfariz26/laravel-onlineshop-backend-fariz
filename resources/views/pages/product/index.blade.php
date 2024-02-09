
@extends('layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Product</h1>
                <div class="section-header-button">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Product</a></div>
                    <div class="breadcrumb-item">All Product</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="float-right">
                                    <form method="GET" action="{{ route('product.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" value="{{ request()->search }}" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}

                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="width:100%" id="table-1">
                                        <thead>
                                            <tr>
                                                {{-- <th>No</th> --}}
                                                <th>Category/ Product</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th class="text-center" width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories  as $cat => $category)
                                                @if(count($category->product) > 0)
                                                    <tr>
                                                        {{-- <td>{{ $cat +1 }}</td> --}}
                                                        <td>{{ $cat +1 }}. {{ $category->name }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                        @foreach ($category->product as $prod => $product)
                                                            <tr>
                                                                <td>
                                                                    {{ $cat +1 }}.{{ $prod +1 }}. {{ $product->name }}
                                                                </td>
                                                                <td>{{ number_format($product->price,0,',','.')  }} </td>
                                                                <td>{{ $product->stock }}</td>
                                                                <td>
                                                                    <div class="d-flex justify-content-center">
                                                                        <a href='{{ route('product.edit', $product->id) }}'
                                                                            class="btn btn-sm btn-info btn-icon">
                                                                            <i class="fas fa-edit"></i>
                                                                            Edit
                                                                        </a>

                                                                        <form  onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('product.destroy', $product->id) }}" method="POST" class="ml-2">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                                <i class="fas fa-times"></i> Delete
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <div class="d-flex justify-content-end">{{ $categories->withQueryString()->onEachSide(2)->links() }}</div> --}}
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
            // "destroy": true,
            "columnDefs": [
                { "sortable": false, "targets": [2,3] }
            ]
            });
    </script>
@endpush
