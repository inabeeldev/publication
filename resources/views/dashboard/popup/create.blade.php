@extends('layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Create Popup</h4>
    </div>

    <!-- form section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add New popup</h5>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Choose Popup type</label>
                            <select class="form-select " id="regions">
                                <option value="">Choose popup type</option>
                                <option value="">Welcome popup</option>
                                <option value="">Daily popup</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select Image</label>
                            <input class="form-control" type="file" id="formFile" />
                        </div>

                        <div class="mb-3">
                            <label for="publicationsPackages" class="form-label">Enter Content of Popup</label>
                            <textarea class="form-control" id="summernote" name="editordata" rows="3" placeholder="Please enter at least one parameter. Separate parameters by MUST and PREFERRED. Ex. MUST: DA60+, Google Indexed; PREFERRED: Fashion-focused"></textarea>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
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





@endsection

@section('scripts')
<script>
    $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>
@endsection
