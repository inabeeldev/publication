<?php

namespace App\Http\Controllers\customer;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('customer.dashboard.dashboard');
    // }


    public function profile()
    {
        return view('customer.dashboard.profile');
    }

    public function index(Request $request)
    {
        // Your filtering logic goes here
        $publications = Publication::query();

        if ($request->filled('publicationName')) {
            $publications->where('name', 'like', '%' . $request->input('publicationName') . '%');
        }

        if ($request->filled('publication_type')) {
            $publications->where('publication_type', $request->input('publication_type'));
        }

        if ($request->filled('regions')) {
            $publications->whereIn('region', $request->input('regions'));
        }

        if ($request->filled('genres')) {
            $genres = $request->input('genres');

            $publications->where(function ($query) use ($genres) {
                foreach ($genres as $genre) {
                    $query->orWhere('genres', 'like', '%' . $genre . '%');
                }
            });
        }

        if ($request->filled('price_range') && $request->input('price_range') > 0) {
            $publications->whereBetween('price', [0, $request->input('price_range')]);
        }

        // Add similar logic for other filters...

        $filteredPublications = $publications->get();

        return view('customer.dashboard.dashboard', ['publications' => $filteredPublications]);
    }

}
