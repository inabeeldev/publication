@extends('layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Create User</h4>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <!-- form section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create a User</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="defaultFormControlInput"
                                placeholder="Enter Full Name"
                                aria-describedby="defaultFormControlHelp"
                            />
                        </div>

                        <!-- Additional Form Elements -->
                        <div class="mb-3">
                            <label for="clientWebsite" class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                id="clientWebsite"
                                placeholder="Enter Email"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">User Type</label>
                            <select class="form-select" name="user_type" id="user_type">
                                <option value="">Choose User Type</option>
                                <option value="admin">Admin</option>
                                <option value="manager">Employee</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="clientWebsite" class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="clientWebsite" class="form-label">Confirm Password</label>
                            <input
                                type="password"
                                name="confirm_password"
                                class="form-control"
                                id="confirm_password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            />
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="roles" class="form-label"><strong>Role:</strong></label>
                                <select name="role" id="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- / Content -->




@endsection
