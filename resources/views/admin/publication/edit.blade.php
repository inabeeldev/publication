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
                    <form method="POST" action="{{ route('publications.update', $publication->id) }}" enctype="multipart/form-data">
                        @csrf

                        @if(isset($publication))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="publicationName" class="form-label">Publication Name</label>
                            <input type="text" name="name" class="form-control" id="publicationName" placeholder="Publication name" aria-describedby="publicationNameHelp" value="{{ isset($publication) ? $publication->name : '' }}" />
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Publication Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Choose One</option>
                                <option value="tv" {{ isset($publication) && $publication->type === 'tv' ? 'selected' : '' }}>TV</option>
                                <option value="listicles" {{ isset($publication) && $publication->type === 'listicles' ? 'selected' : '' }}>Listicles</option>
                                <option value="best_sellers" {{ isset($publication) && $publication->type === 'best_sellers' ? 'selected' : '' }}>Best Sellers</option>
                                <option value="pr_bundles" {{ isset($publication) && $publication->type === 'pr_bundles' ? 'selected' : '' }}>PR Bundles</option>
                                <option value="print" {{ isset($publication) && $publication->type === 'print' ? 'selected' : '' }}>Print</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="genres" class="form-label">Genres</label>
                            <input type="text" class="form-control" id="genres" placeholder="Type and press Enter to add genres" />
                            <div id="genres_list" style="display: flex; flex-wrap: wrap;">
                                @if(isset($publication))
                                    @foreach(explode(',', $publication->genres) as $genre)
                                        <div>{{ $genre }} <i class='bx bxs-x-square' onclick="removeGenre(this)"></i></div>
                                    @endforeach
                                @endif
                            </div>
                            <input type="hidden" name="genres" id="genres_hidden" value="{{ isset($publication) ? $publication->genres : '' }}">
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
                                value="{{ isset($publication) ? $publication->price : '' }}"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="da" class="form-label">DA</label>
                            <input type="number" name="da" class="form-control" id="da" placeholder="DA" aria-describedby="daHelp" value="{{ isset($publication) ? $publication->da : '' }}" />
                        </div>

                        <div class="mb-3">
                            <label for="tat" class="form-label">TAT</label>
                            <input type="text" name="tat" class="form-control" id="tat" placeholder="TAT" aria-describedby="tatHelp" value="{{ isset($publication) ? $publication->tat : '' }}" />
                        </div>

                        <div class="mb-3">
                            <label for="region" class="form-label">Region</label>
                            <input type="text" name="region" class="form-control" id="region" placeholder="Region" aria-describedby="regionHelp" value="{{ isset($publication) ? $publication->region : '' }}" />
                        </div>

                        <div class="mb-3">
                            <label for="sponsored" class="form-label">Sponsored</label>
                            <select name="sponsored" id="sponsored" class="form-control">
                                <option value="">Choose One</option>
                                <option value="Yes" {{ isset($publication) && $publication->sponsored === 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ isset($publication) && $publication->sponsored === 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="indexed" class="form-label">Indexed</label>
                            <select name="indexed" id="indexed" class="form-control">
                                <option value="">Choose One</option>
                                <option value="Yes" {{ isset($publication) && $publication->indexed === 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ isset($publication) && $publication->indexed === 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="has_image" class="form-label">Has Image</label>
                            <select name="has_image" id="has_image" class="form-control">
                                <option value="">Choose One</option>
                                <option value="Yes" {{ isset($publication) && $publication->has_image === 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ isset($publication) && $publication->has_image === 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="do_follow" class="form-label">Do Follow</label>
                            <select name="do_follow" id="doFollow" class="form-control">
                                <option value="">Choose One</option>
                                <option value="Yes" {{ isset($publication) && $publication->do_follow === 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ isset($publication) && $publication->do_follow === 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="example" class="form-label">Example</label>
                            <input type="text" name="example" class="form-control" id="example" placeholder="Example" aria-describedby="exampleHelp" value="{{ isset($publication) ? $publication->example : '' }}" />
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" />
                            @if(isset($publication) && $publication->image)
                                <img src="{{ asset('public/images/publications/' . $publication->image) }}" alt="{{ $publication->name }}" width="50" style="border-radius: 50%;">
                            @endif
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update</button>
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
    var keywords = []; // Define keywords globally

    // Ensure that removeGenre and updateGenres functions are defined globally
    function removeGenre(element) {
        var genreToRemove = element.previousSibling.nodeValue.trim(); // Get the text content of the genre
        keywords = keywords.filter(function (genre) {
            return genre.trim() !== genreToRemove;
        });

        updateGenres(); // Update both displayed and hidden genres
    }

    function updateGenres() {
        $('#genres_list').empty();
        keywords.forEach(function (keyword) {
            $('#genres_list').append('<div>' + keyword + ' <i class="bx bxs-x-square" onclick="removeGenre(this)"></i></div>');
        });
        updateGenresInput(); // Update the hidden input
    }

    $(document).ready(function() {
        // Initialize keywords array with existing genres
        @if(isset($publication))
            keywords = {!! json_encode(explode(',', $publication->genres)) !!};
        @endif

        $('#genres').keypress(function(e) {
            if (e.which === 13) { // Enter key pressed
                e.preventDefault(); // Prevent form submission
                var keyword = $(this).val().trim();
                if (keyword !== '') {
                    keywords.push(keyword);
                    updateGenres(); // Update both displayed and hidden genres
                    $(this).val(''); // Clear the input field
                }
            }
        });

        $('form').submit(function(e) {
            updateGenresInput(); // Call the function to update the hidden input before form submission
        });

        function updateGenresInput() {
            $('#genres_hidden').val(keywords.join(', '));
        }
    });
</script>
{{-- <script>
    $(document).ready(function() {
        var keywords = [];

        // Initialize keywords array with existing genres
        @if(isset($publication))
            keywords = {!! json_encode(explode(',', $publication->genres)) !!};
        @endif

        $('#genres').keypress(function(e) {
            if (e.which === 13) { // Enter key pressed
                e.preventDefault(); // Prevent form submission
                var keyword = $(this).val().trim();
                if (keyword !== '') {
                    keywords.push(keyword);
                    updateGenres(); // Update both displayed and hidden genres
                    $(this).val(''); // Clear the input field
                }
            }
        });

        $('form').submit(function(e) {
            updateGenresInput(); // Call the function to update the hidden input before form submission
        });

        function updateGenres() {
            $('#genres_list').empty();
            keywords.forEach(function (keyword) {
                $('#genres_list').append('<div>' + keyword + ' <i class="bx bxs-x-square" onclick="removeGenre(this)"></i></div>');
            });
            updateGenresInput(); // Update the hidden input
        }

        function removeGenre(element) {
            var genreToRemove = element.previousSibling.nodeValue.trim(); // Get the text content of the genre
            keywords = keywords.filter(function (genre) {
                return genre.trim() !== genreToRemove;
            });

            updateGenres(); // Update both displayed and hidden genres
        }

        function updateGenresInput() {
            $('#genres_hidden').val(keywords.join(', '));
        }
    });
</script> --}}
{{-- <script>
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

        $('form').submit(function(e) {
            // Check if keywords array is not empty before updating the hidden input
            if (keywords.length > 0) {
                $('#genres_hidden').val(keywords.join(', '));
            }
            // If the keywords array is empty, the hidden input will retain its existing value (old values)
        });
    });
</script> --}}
{{-- <script>
 $(document).ready(function() {
    var keywords = [];

    $('#genres').on('keydown', function(e) {
        if (e.which === 13) { // Enter key pressed
            e.preventDefault(); // Prevent form submission

            var keyword = $(this).val().trim();
            if (keyword !== '') {
                if (!keywords.includes(keyword)) {
                    keywords.push(keyword);
                    updateGenres(); // Update both displayed and hidden genres
                }
                $(this).val(''); // Clear the input field only if keyword is successfully added
            }
        }
    });

    $('form').submit(function() {
        updateGenresInput(); // Call the function to update the hidden input before form submission
    });

    $('#genres_list').on('click', 'i', function() {
        removeGenre($(this).parent());
    });

    function updateGenres() {
        $('#genres_list').empty();
        keywords.forEach(function (keyword) {
            $('#genres_list').append('<div>' + keyword + ' <i class="bx bxs-x-square"></i></div>');
        });
        updateGenresInput(); // Update the hidden input
    }

    function removeGenre(element) {
        var genreToRemove = $(element).text().trim();
        keywords = keywords.filter(function (genre) {
            return genre.trim() !== genreToRemove;
        });

        updateGenres(); // Update both displayed and hidden genres
    }

    function updateGenresInput() {
        $('#genres_hidden').val(keywords.join(', '));
    }
});

 </script> --}}


@endsection
