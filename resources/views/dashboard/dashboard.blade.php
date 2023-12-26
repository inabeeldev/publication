@extends('layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Pricing Sheet</h4>

        <!-- Import and Export Buttons -->
        <div class="d-flex">
            <a href="{{ route('submit-order') }}" class="btn btn-primary me-2 text-white">Submit an order</a>
            <a href="{{ route('request-recommendation') }}" class="btn btn-secondary text-white">Request Recommendations</a>
        </div>
    </div>
    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Pricing Sheet</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Publications</th>
                <th>Genres</th>
                <th>Price</th>
                <th>DA</th>
                <th>TAT</th>
                <th>Region</th>
                <th>Sponsored</th>
                <th>Indexed</th>
                <th>Image</th>
                <th>Do Follow</th>
                <th>Example</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>
            <tr>
                <td><strong>CEO Weekly</strong></td>
                <td>5 Genres</td>
                <td>$4500</td>
                <td>28</td>
                <td>1-3 days</td>
                <td>Unites States</td>
                <td>No</td>
                <td>Yes</td>
                <td>Yes</td>
                <td>No</td>
                <td>Example</td>
            </tr>


            </tbody>
        </table>
        </div>
    </div>
    <!--/ Striped Rows -->


</div>
<!-- / Content -->


@endsection
