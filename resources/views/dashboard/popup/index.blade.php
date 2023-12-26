@extends('layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Create Popup</h4>
    </div>
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <!-- form section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add New popup</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('popups.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Choose Popup type</label>
                            <select class="form-select" name="type" id="regions">
                                <option value="">Choose popup type</option>
                                <option value="welcome">Welcome popup</option>
                                <option value="daily">Daily popup</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select Image</label>
                            <input class="form-control" type="file" name="image"  />
                        </div>

                        <div class="mb-3">
                            <label for="publicationsPackages" class="form-label">Enter Content of Popup</label>
                            <textarea class="form-control" id="summernote" name="content" ></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Status</label>
                            <select class="form-select" name="status" id="regions">
                                <option value="">Choose Status</option>
                                <option value="enable">Active</option>
                                <option value="disable">Inactive</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <h5 class="card-header">Popups</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Date Created</th>
                <th>Status</th>
                <th>Show Popup</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($popups as $popup)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $popup->type == "welcome" ? "Welcome Popup" : "Daily Popup" }}</td>
                    <td>{{ $popup->created_at }}</td>
                    <td>{{ $popup->status }}</td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popupModal{{ $popup->id }}">
                            Show
                        </button>
                    </td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
                <!-- Popup Modal for each row -->
                <div class="modal fade" id="popupModal{{ $popup->id }}" tabindex="-1" aria-labelledby="popupModalLabel{{ $popup->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="popupModalLabel{{ $popup->id }}">{{ $popup->type == "welcome" ? "We Welcome You!" : "Daily News" }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Image on the left side -->
                                        <img src="{{ asset('public/images/' . $popup->image) }}" alt="Popup Image" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <!-- Custom content -->
                                        {!! $popup->content !!}
                                        <!-- ... (other details) ... -->
                                    </div>
                                </div>
                            </div>
                            <!-- Add more content or customize as needed -->
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection
