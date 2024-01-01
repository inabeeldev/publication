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
                    <td>{{ $role->created_at->format('d-M-Y') }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="User Actions">
                            <button type="button" class="btn btn-primary btn-show" data-bs-toggle="modal" data-bs-target="#showRoleModal{{ $role->id }}">Show</button>
                            <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-warning btn-edit">Edit</a>
                            <form method="post" action="{{ route('roles.destroy', ['role' => $role->id]) }}" onsubmit="return confirm('Are you sure you want to delete this role?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>

                </tr>
                 <!-- Show Modal -->
                    <div class="modal fade" id="showRoleModal{{ $role->id }}" tabindex="-1" aria-labelledby="showRoleModalLabel{{ $role->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="showRoleModalLabel{{ $role->id }}">Role Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add content to display role details -->
                                    <p><strong>Role Name:</strong> {{ $role->name }}</p>
                                    <p><strong>Created Date:</strong> {{ $role->created_at->format('d-M-Y') }}</p>
                                    <p><strong>Permissions:</strong></p>
                                    <ul>
                                        @foreach($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    </ul>
                                    <!-- Add more details as needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <!--/ Striped Rows -->


</div>
<!-- / Content -->


@endsection

