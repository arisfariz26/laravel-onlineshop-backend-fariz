@extends('layouts.app')

@section('title', 'Edit Order Status')

@push('style')
   <!-- CSS Libraries -->
   <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
              <div class="section-header-back">
                <a href="{{ route('order.index') }}" class="btn btn-icon" style="font-size: 15px"><i class="fas fa-arrow-left"></i> All Order</a>
              </div>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Order</a></div>
                <div class="breadcrumb-item">Edit Order</div>
              </div>
            </div>

            <div class="section-body">


              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Edit Order</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('order.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control select2 @error('status') is-invalid @enderror"
                                            name="status">
                                            <option selected="" disabled>-- Select Status --</option>
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="on_delivery" {{ $order->status == 'on_delivery' ? 'selected' : '' }}>On
                                                Delivery</option>
                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                                Delivered</option>
                                            <option value="expired" {{ $order->status == 'expired' ? 'selected' : '' }}>Expired
                                            </option>
                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Failed
                                            </option>

                                        </select>

                                        @error('status')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                              </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Resi</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control @error('shipping_resi') is-invalid @enderror" name="shipping_resi" value="{{ old('shipping_resi', $order->shipping_resi) }}" placeholder="Masukkan No Resi">
                          @error('shipping_resi')
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
