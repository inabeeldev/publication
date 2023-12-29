<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::orderBy('id', 'DESC')->get();
        return view('admin.publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publication.create');
    }

    public function filterPublications(Request $request)
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

        return view('admin.publication.index', ['publications' => $filteredPublications]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'genres' => 'required|string|max:255',
            'price' => 'required|numeric',
            'da' => 'required|integer',
            'tat' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'sponsored' => 'required|in:Yes,No',
            'indexed' => 'required|in:Yes,No',
            'has_image' => 'required|in:Yes,No',
            'do_follow' => 'required|in:Yes,No',
            'example' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Create a new validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, handle file upload if an image is provided
        $validatedData = $validator->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/publications'), $imageName);

            // Save the image name to the validated data
            $validatedData['image'] = $imageName;
        }

        // Create a new Publication using the validated data
        Publication::create($validatedData);

        // Redirect or respond as needed
        return redirect()->route('publications.index')->with('success', 'Publication created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
