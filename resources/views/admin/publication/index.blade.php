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
        {{-- <div class="card accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
              type="button"
              class="accordion-button"
              data-bs-toggle="collapse"
              data-bs-target="#accordionOne"
              aria-expanded="true"
              aria-controls="accordionOne"
            >
              Accordion Item 1
            </button>
          </h2>

          <div
            id="accordionOne"
            class="accordion-collapse collapse"
            data-bs-parent="#accordionExample"
          >
            <div class="accordion-body">
              Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
              marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
              soufflé. Wafer gummi bears marshmallow pastry pie.
            </div>
          </div>
        </div> --}}
    <!-- Striped Rows -->
    <form action="{{ route('publications.index') }}" method="GET">
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

               <button type="submit" class="btn btn-primary mt-3">Apply Filters</button>
    </div>
    </form>
    <div class="card" style="background-color: #2A3A4C;">
        <h4 class="card-header text-light">All Publications</h4>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped table-dark" id="dataTable">
                <thead class="">
                    <tr>
                        <th>Action</th>
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
                                <!-- Edit button with a link to the edit route or page -->
                                <a href="{{ route('publications.edit', $publication->id) }}" class="btn btn-primary">Edit</a>

                                <!-- Delete button with a form for CSRF protection -->
                                <form action="{{ route('publications.destroy', $publication->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                            </td>
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


@endsection


@section('scripts')

@endsection


@section('styles2')
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
