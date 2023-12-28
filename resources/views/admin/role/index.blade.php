@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">All Roles</h4>

        {{-- <!-- Import and Export Buttons -->
        <div class="d-flex">
            <a href="{{ route('submit-order') }}" class="btn btn-primary me-2 text-white">Submit an order</a>
            <a href="{{ route('request-recommendation') }}" class="btn btn-secondary text-white">Request Recommendations</a>
        </div> --}}
    </div>
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    @endif
    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">List of Roles</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($roles as $role)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="User Actions">
                            <button type="button" class="btn btn-primary btn-show" data-role-id="{{ $role->id }}">Show</button>
                            <button type="button" class="btn btn-warning btn-edit" data-role-id="{{ $role->id }}">Edit</button>
                            <button type="button" class="btn btn-danger btn-delete" data-role-id="{{ $role->id }}">Delete</button>
                        </div>
                    </td>

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

