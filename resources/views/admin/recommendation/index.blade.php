@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Recommendations List</h4>
    </div>
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    @endif


    <div class="card">
        <h5 class="card-header">List of Recommendations</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
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
                    <td>{{ $recommendation->user->name }}</td>
                    <td>{{ $recommendation->user->email }}</td>
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
        <div class="card-footer d-flex justify-content-end">
            {{-- {{ $recommendations->links() }} --}}
        </div>
    </div>
    <!--/ Striped Rows -->



</div>
<!-- / Content -->

@endsection


