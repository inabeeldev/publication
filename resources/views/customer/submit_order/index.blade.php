@extends('customer.layouts.app')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    {{-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Submitted Orders List</h4>
    </div> --}}
    <div class="row animate__animated animate__fadeIn">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-9">
                  <div class="card-body">
                    <h5 class="card-title text-primary mb-3">Order Details</h5>

                    <p></p>
                    <a href="{{ route('create-submit-order') }}" class="btn btn-sm btn-outline-primary">Submit New Order</a>
                  </div>
                </div>
                <div class="col-sm-3 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{ asset('public/assets/img/illustrations/man-with-laptop-light.png') }}"
                      height="100"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    @endif


    <div class="card animate__animated animate__fadeInUp">
        <h5 class="card-header">List of Submitted Orders</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Client Name</th>
                <th>Client Website</th>
                <th>Publications</th>
                <th>Order Total</th>
                <th>Payment Method</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($orders as $order)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $order->client_name }}</td>
                    <td>{{ $order->client_website }}</td>
                    <td>{{ $order->publications_packages }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->payment_method }}</td>

                </tr>

            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <!--/ Striped Rows -->



</div>
<!-- / Content -->

@endsection


