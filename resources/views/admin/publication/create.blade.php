@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Create Publication</h4>
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
    <div class="row animate__animated animate__fadeInUp">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create A publication</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="publicationName" class="form-label">Publication Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="publicationName"
                                placeholder="Publication name"
                                aria-describedby="publicationNameHelp"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Publication Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Choose One</option>
                                <option value="tv">TV</option>
                                <option value="listicles">Listicles</option>
                                <option value="best_sellers">Best Sellers</option>
                                <option value="pr_bundles">PR Bundles</option>
                                <option value="print">Print</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="genres" class="form-label">Genres</label>
                            <input
                                type="text"
                                class="form-control"
                                id="genres"
                                placeholder="Type and press Enter to add genres"
                            />
                            <div id="genres_list" style="display: flex; flex-wrap: wrap;"></div>
                            <input type="hidden"name="genres" id="genres_hidden">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input
                                type="text"
                                name="price"
                                class="form-control"
                                id="price"
                                placeholder="Price"
                                aria-describedby="priceHelp"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="da" class="form-label">DA</label>
                            <input
                                type="number"
                                name="da"
                                class="form-control"
                                id="da"
                                placeholder="DA"
                                aria-describedby="daHelp"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="tat" class="form-label">TAT</label>
                            <input
                                type="text"
                                name="tat"
                                class="form-control"
                                id="tat"
                                placeholder="TAT"
                                aria-describedby="tatHelp"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="region" class="form-label">Region</label>
                            <input
                                type="text"
                                name="region"
                                class="form-control"
                                id="region"
                                placeholder="Region"
                                aria-describedby="regionHelp"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="sponsored" class="form-label">Sponsored</label>
                            <select name="sponsored" id="sponsored" class="form-control">
                                <option value="">Choose One</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="indexed" class="form-label">Indexed</label>
                            <select name="indexed" id="indexed" class="form-control">
                                <option value="">Choose One</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="has_image" class="form-label">Has Image</label>
                            <select name="has_image" id="has_image" class="form-control">
                                <option value="">Choose One</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="do_follow" class="form-label">Do Follow</label>
                            <select name="do_follow" id="doFollow" class="form-control">
                                <option value="">Choose One</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="example" class="form-label">Example</label>
                            <input
                                type="text"
                                name="example"
                                class="form-control"
                                id="example"
                                placeholder="Example"
                                aria-describedby="exampleHelp"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input
                                type="file"
                                name="image"
                                class="form-control"
                            />
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


@section('scripts')
<script>
    $(document).ready(function() {
        var keywords = [];

        $('#genres').keypress(function(e) {
            if (e.which === 13) { // Enter key pressed
                e.preventDefault(); // Prevent form submission
                var keyword = $(this).val().trim();
                if (keyword !== '') {
                    keywords.push(keyword);
                    $('#genres_list').append('<div>' + keyword + '</div>');
                    $(this).val(''); // Clear the input field
                }
            }
        });

        $('form').submit(function() {
            $('#genres_hidden').val(keywords.join(', '));
        });
    });
</script>
@endsection
