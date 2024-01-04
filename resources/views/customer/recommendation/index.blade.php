@extends('customer.layouts.app')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    {{-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Requested Recommendations List</h4>
    </div> --}}
    <div class="row animate__animated animate__fadeIn">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-9">
                  <div class="card-body">
                    <h5 class="card-title text-primary mb-3">Requested Recommendations List</h5>

                    <p></p>
                    <a href="{{ route('create-request-recommendation') }}" class="btn btn-sm btn-outline-primary">Request New Recommendation</a>
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


    <div class="card animate__animated animate__fadeInUp">
        <h5 class="card-header">List of Requested Recommendations</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Prospects Website</th>
                <th>Prospects Goal</th>
                <th>Budget</th>
                <th>Publications</th>
                <th>Parameters</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($recommendations as $recommendation)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $recommendation->prospects_website }}</td>
                    <td>{{ $recommendation->prospects_goal }}</td>
                    <td>{{ $recommendation->budget }}</td>
                    <td>{{ $recommendation->publications_packages }}</td>
                    <td>{{ $recommendation->parameters }}</td>

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


