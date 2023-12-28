@extends('customer.layouts.app')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Submit Order</h4>
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
                <h5 class="card-header">Submit an order</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('post-submit-order') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Client Name and/or Brand Name</label>
                            <input
                                type="text"
                                name="client_name"
                                class="form-control"
                                id="defaultFormControlInput"
                                placeholder="John Doe"
                                aria-describedby="defaultFormControlHelp"
                            />
                        </div>

                        <!-- Additional Form Elements -->
                        <div class="mb-3">
                            <label for="clientWebsite" class="form-label">Client's Website or Social Media Link</label>
                            <input
                                type="text"
                                name="client_website"
                                class="form-control"
                                id="clientWebsite"
                                placeholder="https://www.example.com"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="publicationsPackages" class="form-label">Publication(s), Package(s) or Service(s)</label>
                            <textarea class="form-control" id="publicationsPackages" name="publications_packages" rows="3" placeholder="Enter one publication or service per line."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="order_total" class="form-label">Order Total</label>
                            <input
                                type="number"
                                class="form-control"
                                id="order_total"
                                name="order_total"
                                placeholder="$0.00"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="paymentMethod" class="form-label">How will you be paying?</label>
                            <select class="form-select" id="paymentMethod" name="payment_method">
                                <option value="">Select One</option>
                                <option value="wire_transfer">Wire Transfer</option>
                                <option value="ach">ACH (U.S. Banks Only)</option>
                                <option value="credit_card">Credit Card (3.5% fee will be added)</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal2">this</a>
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
    <div class="modal fade" id="termsModal2" tabindex="-1" aria-labelledby="termsModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel2">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        You will be issued an invoice. Once the invoice has been paid, you will receive a questionnaire for your client.
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
