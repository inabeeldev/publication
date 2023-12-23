@extends('layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">All Users</h4>

        <!-- Import and Export Buttons -->
        <div class="d-flex">
            <a href="{{ route('submit-order') }}" class="btn btn-primary me-2 text-white">Submit an order</a>
            <a href="{{ route('request-recommendation') }}" class="btn btn-secondary text-white">Request Recommendations</a>
        </div>
    </div>
    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">List of Users</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($users as $user)
            <tr>
                <td><strong>{{ $loop->iteration }}</strong></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email }}</td>
                <td>Action</td>
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
