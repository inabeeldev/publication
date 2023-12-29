@extends('admin.layouts.home')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Publications</h4>
    </div>
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    @endif
    <!-- Striped Rows -->
    <form action="{{ route('filter-publications') }}" method="GET">
    <div class=" row mb-3">
       <div class="col-md-6">
        <input type="text" name="publicationName" class="form-control mb-3" id="publicationName" placeholder="Search by Publication Name">
       </div>
       <div class="col-md-6">
        <select class="form-select " id="regions" name="publication_type">
            <option value="">Choose Publication type</option>
            <option value="">All Publications</option>
            <option value="">TV</option>
            <option value="">Best Sellers</option>
            <option value="">PR Bundles</option>
        </select>
       </div>
       <div class="col-md-6 mb-3">
        <label for="formRange1" class="form-label">Select Regions</label>
        <select class="form-select select2" id="regions" name="regions[]" multiple>
            <option value="Pakistan">Pakistan</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
        </select>
       </div>
       <div class="col-md-6 mb-3">
        <label for="formRange1" class="form-label">Select Genres</label>
        <select class="form-select select2" id="genres" name="genres[]" multiple>
            <option value="Magzines">Magzines</option>
            <option value="Music">Music</option>
            <option value="Drama">Drama</option>
            <option value="Medical">Medical</option>
            <option value="Project Management">Project Management</option>
        </select>
       </div>
        <div class="mb-3 uyuy7">
            <label for="formRange1" class="form-label">Price range</label>
            <input type="range" name="price_range" class="form-range" id="formRange1" min="0" max="10000" step="100" value="0" />
            <span id="priceLabel2">0</span>
          </div>
          <button type="submit" class="btn btn-primary">Apply Filters</button>
    </div>
    </form>
    <div class="card">
        <h5 class="card-header">All Publications</h5>
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
                            <td>{{ $publication->image }}</td>
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


@endsection


@section('scripts')
{{-- <script>
    $(document).ready(function () {
        // Filter function
        function applyFilters() {
            var publicationNameFilter = $('#publicationName').val().toLowerCase();
            var regionFilter = $('#regions').val();
            var genreFilter = $('#genres').val();
            var priceRangeFilter = $('#formRange1').val();

            $('.publication-row').each(function () {
                var publicationName = $(this).find('td:first-child strong').text().toLowerCase();
                var region = $(this).find('td:nth-child(6)').text().toLowerCase();
                var genres = $(this).find('td:nth-child(2)').text().toLowerCase();
                var price = parseFloat($(this).find('td:nth-child(3)').text());

                // Check if the row matches the filters
                var matches = true;
                if (publicationNameFilter !== '' && !publicationName.includes(publicationNameFilter)) {
                    matches = false;
                }
                if (regionFilter !== '' && regionFilter !== 'All Publications' && region !== regionFilter) {
                    matches = false;
                }
                if (genreFilter !== '' && !genres.includes(genreFilter)) {
                    matches = false;
                }
                if (priceRangeFilter !== '' && price > parseFloat(priceRangeFilter)) {
                    matches = false;
                }

                // Show/hide the row based on the filter results
                if (matches) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Event listeners for filter elements
        $('#publicationName, #regions, #genres, #formRange1').on('input change', function () {
            applyFilters();
        });

        // Initial filter application
        applyFilters();
    });
</script> --}}
@endsection
