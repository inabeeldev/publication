@extends('customer.layouts.app')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold pt-2">Pricing Sheet</h4>

        <div class="d-flex">
            <button type="button" class="btn btn-primary me-2" onclick="window.location.href='{{ url('/customer/submit-order/create') }}'">Submit an Order</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/customer/request-recommendation/create') }}'">Request Recommendations</button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Striped Rows -->
    <form id="filterForm"  action="{{ route('customer-home') }}" method="GET">
    <div class="row mb-2">
       <div class="col-md-6 mb-2">
        <input type="text" name="publicationName" class="form-control" id="publicationName" placeholder="Search by Publication Name">
       </div>
       <div class="col-md-6 mb-2">
        <select class="form-select " name="type">
            <option value="">Choose Publication type</option>
            <option value="">All Publications</option>
            <option value="tv">TV</option>
            <option value="listicles">Listicles</option>
            <option value="best_sellers">Best Sellers</option>
            <option value="pr_bundles">PR Bundles</option>
            <option value="print">Print</option>
        </select>
       </div>
       <div class="col-md-6 mb-2">
        <label for="formRange1" class="form-label">Select Regions</label>
        <select class="form-select select2" id="regions" name="regions[]" multiple data-placeholder="Select regions">
            <option value="Pakistan">Pakistan</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
        </select>
    </div>
       <div class="col-md-6 mb-2">
        <label for="formRange1" class="form-label">Select Genres</label>
        <select class="form-select select2" id="genres" name="genres[]" multiple data-placeholder="Select Genres">
            <option value="Magzines">Magzines</option>
            <option value="Music">Music</option>
            <option value="Drama">Drama</option>
            <option value="Medical">Medical</option>
            <option value="Project Management">Project Management</option>
        </select>
       </div>
       <div class="col-md-4 mb-2 uyuy7">
            <label for="priceRange" class="form-label mb-0">Price Range</label>
            <input type="text" id="priceRange" name="price_range" />
        </div>
        <div class="col-md-2 mb-2">
            <label for="formRange1" class="form-label">Sponsored</label>
            <select class="form-select" name="sponsored">
                <option value="">Choose One</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <label for="formRange1" class="form-label">Do Follow</label>
            <select class="form-select " name="do_follow">
                <option value="">Choose One</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <label for="formRange1" class="form-label">Indexed</label>
            <select class="form-select " name="indexed">
                <option value="">Choose One</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <label for="formRange1" class="form-label">Image</label>
            <select class="form-select " name="has_image">
                <option value="">Choose One</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        {{-- <div class="col-md-12 mb-2 uyuy7">
            <label for="formRange1" class="form-label">Min Price</label>
            <input type="range" name="min_price" class="slider1" id="formRange1" min="0" max="10000" step="100" value="0" />
            <span id="priceLabel1">0</span><br>
            <label for="formRange1" class="form-label">Max Price</label>
            <input type="range" name="max_price" class="slider2" id="formRange2" min="0" max="10000" step="100" value="10000" />
            <span id="priceLabel2">10000</span>
        </div> --}}

          <button type="submit" class="btn btn-primary mt-3">Apply Filters</button>
        </div>
    </form>
    <div id="loader" class="loader-container">
        <div class="loader"></div>
    </div>
    <div class="card mt-3" style="background-color: #2A3A4C;">
        <h4 class="card-header text-light">All Publications</h4>
        <div class="text-nowrap">
            <table class="table table-striped table-dark" id="dataTable">
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
                        <th>Has Image</th>
                        <th>Do Follow</th>
                        <th>Example</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($publications as $publication)
                        <tr class="publication-row">
                            <td>
                                @if($publication->image)
                                    <img src="{{ asset('public/images/publications/' . $publication->image) }}" alt="{{ $publication->name }}" width="50" style="border-radius: 50%;">
                                @endif
                                <strong>{{ $publication->name }}</strong>
                            </td>
                            <td>
                                @php
                                    $genres = explode(',', $publication->genres);
                                    $numGenres = count($genres);
                                @endphp
                                @if($numGenres > 1)
                                    <div class="hover-info" >
                                        {{ $numGenres }} genres
                                        <div class="genres-tooltip">
                                            @foreach($genres as $genre)
                                                <div>{{ $genre }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    {{ $publication->genres }}
                                @endif
                            </td>
                            <td>{{ $publication->price }}</td>
                            <td>{{ $publication->da }}</td>
                            <td>{{ $publication->tat }}</td>
                            <td>{{ $publication->region }}</td>
                            <td>{{ $publication->sponsored }}</td>
                            <td>{{ $publication->indexed }}</td>
                            <td>{{ $publication->has_image }}</td>
                            <td>{{ $publication->do_follow }}</td>
                            <td>{{ $publication->example }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->


</div>
<!-- / Content -->



@if(session('popup'))
        @php
            $popup = session('popup');
        @endphp

        <div class="modal fade" id="popupModal30" tabindex="-1" aria-labelledby="popupModalLabel30" aria-hidden="true" data-session-key="popup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupModalLabel30">{{ $popup->type == "welcome" ? "We Welcome You!" : "Daily News" }}</h5>
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

    @endif


@endsection


@section('scripts20')
<script defer>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('filterForm').addEventListener('submit', function () {
            showLoader();

            // Add a timeout to simulate a delay (1 second in this case)
            setTimeout(function () {
                hideLoader();
            }, 1000);
        });

        function showLoader() {
            document.getElementById('loader').style.display = 'block';
        }

        function hideLoader() {
            document.getElementById('loader').style.display = 'none';
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#popupModal30').on('hidden.bs.modal', function () {
            // Get the session key from the modal's data attribute
            var sessionKey = $(this).data('session-key');

            // Trigger an AJAX request to forget the session
            $.ajax({
                type: 'POST',
                url: '{{ route("forget-session") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'session_key': sessionKey
                },
                success: function (data) {
                    // Handle success if needed
                },
                error: function (xhr, status, error) {
                    // Handle error if needed
                }
            });
        });
    });
</script>

@endsection


@section('styles')
    <style>
        /* Add your custom styles here */

        /* Animation for the alert */
        .alert {
            animation: slideInUp 0.5s ease-in-out;
        }

        /* Animation for the form */
        form {
            animation: fadeIn 0.8s ease-in-out;
        }

        /* Add more animations and styles as needed */

        @keyframes slideInUp {
            0% {
                transform: translateY(100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
        .loader-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #db3442;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>
@endsection
