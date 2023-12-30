@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">All Users</h4>


    </div>
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                    <td>
                        @foreach($user->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="User Actions">
                            <button type="button" class="btn btn-primary btn-show" data-bs-toggle="modal" data-bs-target="#showUserModal{{ $user->id }}">Show</button>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-edit">Edit</a>
                            <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Show Modal -->
                <div class="modal fade" id="showUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="showUserModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showUserModalLabel{{ $user->id }}">User Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Add content to display user details -->
                                <p>User Name: {{ $user->name }}</p>
                                <p>User Email: {{ $user->email }}</p>
                                <p>User Roles: @foreach($user->roles as $role) {{ $role->name }} @endforeach</p>
                                <!-- Add more details as needed -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Show Modal End -->
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <!--/ Striped Rows -->


</div>
<!-- / Content -->


@endsection
