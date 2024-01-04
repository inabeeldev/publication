@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Edit Role</h4>
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
    <div class="row animate__animated animate__fadeInUp">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create a Role</h5>
                <div class="card-body">
                    <form action="{{ route('roles.update', ['role' => $role->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- The rest of your form remains unchanged -->

                        <!-- Name input -->
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="defaultFormControlInput"
                                placeholder="Enter Role Name"
                                aria-describedby="defaultFormControlHelp"
                                value="{{ old('name', $role->name) }}"
                            />
                        </div>

                        <!-- Additional Form Elements -->

                        <!-- Permissions checkboxes -->
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Permissions:</strong>
                                <br/>
                                @foreach($permissions as $permission)
                                    <label class="form-check-label">
                                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" class="name form-check-input" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        {{ $permission->name }}
                                    </label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- / Content -->




@endsection
