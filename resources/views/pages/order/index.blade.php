@extends('layouts.app')

@section('title', 'Order')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Order</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Order</a></div>
                    <div class="breadcrumb-item">All Order</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="width:100%" id="table-1">
                                        <thead>
                                            <tr>

                                            <th>Transaction Date</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Shipping Name</th>
                                            <th>Shipping Resi</th>

                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>

                                                    <td>{{ $order->created_at }}</td>
                                                    </td>
                                                    <td>{{ $order->total_cost }}</td>
                                                    </td>
                                                    <td>
                                                        {{ $order->status }}
                                                        {{-- <div class="badge badge-pill badge-primary float-right mb-1">Completed</div> --}}
                                                    </td>
                                                    </td>
                                                    <td>{{ $order->shipping_service }}</td>
                                                    <td>{{ $order->shipping_resi }}</td>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href='{{ route('order.edit', $order->id) }}'
                                                                class="btn btn-sm btn-info btn-icon">
                                                                <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>


                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
