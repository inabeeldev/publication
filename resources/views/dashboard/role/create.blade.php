@extends('layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Create Role</h4>
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
                <h5 class="card-header">Create a Role</h5>
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="defaultFormControlInput"
                                placeholder="Enter Role Name"
                                aria-describedby="defaultFormControlHelp"
                            />
                        </div>

                        <!-- Additional Form Elements -->



                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label class="form-check-label">
                                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name form-check-input">
                                        {{ $value->name }}
                                    </label>
                                    <br/>
                                @endforeach
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
