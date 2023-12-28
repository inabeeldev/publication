@extends('customer.layouts.app')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Request Recommendations</h4>
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
                <h5 class="card-header">Request Recommendations</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('post-request-recommendation') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Prospect's Website or Social Media Link</label>
                            <input
                                type="text"
                                name="prospects_website"
                                class="form-control"
                                id="defaultFormControlInput"
                                placeholder="https://"
                                aria-describedby="defaultFormControlHelp"
                            />
                        </div>

                        <!-- Additional Form Elements -->
                        <div class="mb-3">
                            <label for="clientWebsite" class="form-label">What is your prospect's goal with this order?</label>
                            <input
                                type="text"
                                name="prospects_goal"
                                class="form-control"
                                id="prospects_goal"
                                placeholder="Enter Prospects Goal"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="order_total" class="form-label">What is YOUR budget for this prospect?</label>
                            <input
                                type="number"
                                class="form-control"
                                id="order_total"
                                name="budget"
                                placeholder="Min. $1250 to request recommendations."
                            />
                        </div>

                        <div class="mb-3">
                            <label for="publicationsPackages" class="form-label">Publication(s), Package(s) or Service(s) you believe would be a good fit:</label>
                            <textarea class="form-control" id="publicationsPackages" name="publications_packages" rows="3" placeholder="Enter one publication or service per line. Leave blank if you don't know."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="publicationsPackages" class="form-label">Parameters For Publications or Services That Must Be Met</label>
                            <textarea class="form-control" id="publicationsPackages" name="parameters" rows="3" placeholder="Please enter at least one parameter. Separate parameters by MUST and PREFERRED. Ex. MUST: DA60+, Google Indexed; PREFERRED: Fashion-focused"></textarea>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal3">this</a>
                                </label>
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





    <!-- Modal -->
    <div class="modal fade" id="termsModal3" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel3">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        I understand that getclout diligently reviews each request to make the best recommendations for their partners,
                        which is a free but time-consuming service they provide. I am making this request with the intention to place an order from getclout.
                        If I request 3+ recommendations in a row without placing an order,
                        I will be unable to make official requests until an order is placed.
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
