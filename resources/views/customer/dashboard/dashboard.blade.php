@extends('customer.layouts.app')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Pricing Sheet</h4>

        <!-- Import and Export Buttons -->
        <div class="d-flex">
            <a href="{{ route('create-submit-order') }}" class="btn btn-primary me-2 text-white">Submit an order</a>
            <a href="{{ route('create-request-recommendation') }}" class="btn btn-secondary text-white">Request Recommendations</a>
        </div>
    </div>
    <!-- Striped Rows -->
    <div class=" row mb-3">
       <div class="col-md-6">
        <input type="text" class="form-control mb-3" id="publicationName" placeholder="Search by Publication Name">
       </div>
       <div class="col-md-6">
        <select class="form-select " id="regions">
            <option value="">Choose Publication type</option>
            <option value="">All Publications</option>
            <option value="">TV</option>
            <option value="">Best Sellers</option>
            <option value="">PR Bundles</option>
        </select>
       </div>
       <div class="col-md-6 mb-3">
        <label for="formRange1" class="form-label">Select Regions</label>
        <select class="form-select select2" id="regions" multiple>
            <option value="">Pakistan</option>
            <option value="">India</option>
            <option value="">USA</option>
            <option value="">UK</option>
            <option value="">Australia</option>
        </select>
       </div>
       <div class="col-md-6 mb-3">
        <label for="formRange1" class="form-label">Select Genres</label>
        <select class="form-select select2" id="genres" multiple>
            <option value="">Magzines</option>
            <option value="">Music</option>
            <option value="">Drama</option>
            <option value="">Medical</option>
            <option value="">Project Management</option>
        </select>
       </div>
        <div class="mb-3">
            <label for="formRange1" class="form-label">Price range</label>
            <input type="range" class="form-range" id="formRange1" min="0" max="10000" step="100" value="0" />
          </div>
    </div>
    <div class="card">
        <h5 class="card-header">Pricing Sheet</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped" id="dataTable">
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


            </tbody>
        </table>
        </div>
    </div>
    <!--/ Striped Rows -->


</div>
<!-- / Content -->


{{-- <script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('home') }}",
            columns: [
                { data: 'Publications', name: 'Publications' },
                { data: 'Genres', name: 'Genres' },
                { data: 'Price', name: 'Price' },
                { data: 'DA', name: 'DA' },
                { data: 'TAT', name: 'TAT' },
                { data: 'Region', name: 'Region' },
                { data: 'Sponsored', name: 'Sponsored' },
                { data: 'Indexed', name: 'Indexed' },
                { data: 'Image', name: 'Image' },
                { data: 'Do_Follow', name: 'Do_Follow' },
                { data: 'Example', name: 'Example' },
                // Add more columns as needed
            ],
            order: [
                [2, 'asc'] // Assuming 'Price' is the third column (index 2)
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
    });
</script> --}}


@endsection
