@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    {{-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">All Users</h4>


    </div> --}}
    <div class="row animate__animated animate__fadeIn">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-9">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Customers Query List</h5>


                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">Open Users</a>
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
    <!-- Striped Rows -->
    <div class="card animate__animated animate__fadeInUp">
        <h5 class="card-header">List of customer queries</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Query</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($messages as $message)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $message->user->name }}</td>
                    <td>{{ $message->user->email }}</td>
                    <td>
                        {{ $message->message }}
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="User Actions">
                            <form method="post" action="{{ route('query-delete', ['id' => $message->id]) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                            </form>
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
