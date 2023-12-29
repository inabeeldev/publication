@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Submitted Orders List</h4>
    </div>
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    @endif


    <div class="card">
        <h5 class="card-header">List of Submitted Orders</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
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
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
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
        <div class="card-footer d-flex justify-content-end">
            {{-- {{ $orders->links() }} --}}
        </div>
    </div>
    <!--/ Striped Rows -->



</div>
<!-- / Content -->

@endsection


