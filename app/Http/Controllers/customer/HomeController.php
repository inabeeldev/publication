<?php

namespace App\Http\Controllers\customer;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function forgetSession(Request $request)
    {
        // Get the session key from the request
        $sessionKey = $request->input('session_key');

        // Forget the session based on the session key
        $request->session()->forget($sessionKey);

        // You can return a response if needed
        return response()->json(['message' => 'Session forgotten successfully']);
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
        $customer = auth()->user();
        return view('customer.dashboard.profile', compact('customer'));
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore(auth()->id()), // Ensure email uniqueness excluding the current user
            ],
            'profile_url' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|numeric', // Adjust the validation rules as needed
            'country' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8', // Adjust the validation rules as needed
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }

        // Update customer information in the database
        $customer = auth()->user();
        $customer->update($request->all());

        return redirect()->route('customer-profile')->with('success', 'Profile updated successfully!');
    }

    public function userQuery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Message::create($input);

        return redirect()->route('customer-profile')->with('success', 'Your query submitted successfully!');
    }

    public function deactivateAccount(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'accountActivation' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }

        // Deactivate the account (soft delete or update status as needed)
        $customer = auth()->user();
        $customer->delete(); // Soft delete, adjust as needed

        // Logout the user
        auth()->logout();

        return redirect()->route('login-form')->with('success', 'Account deactivated successfully.');
    }

    public function index(Request $request)
    {
        // session()->forget(['popup']);
        // dd($request->all());
        // Your filtering logic goes here
        $publications = Publication::query();


        if ($request->filled('publicationName')) {
            $publications->where('name', 'like', '%' . $request->input('publicationName') . '%');
        }

        if ($request->filled('type')) {
            $publications->where('type', $request->input('type'));
        }

        if ($request->filled('sponsored')) {
            $publications->where('sponsored', $request->input('sponsored'));
        }
        if ($request->filled('do_follow')) {
            $publications->where('do_follow', $request->input('do_follow'));
        }
        if ($request->filled('indexed')) {
            $publications->where('indexed', $request->input('indexed'));
        }
        if ($request->filled('has_image')) {
            $publications->where('has_image', $request->input('has_image'));
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

        if ($request->filled('price_range')) {
            // Split the price_range input using semicolon as a separator
            $priceRange = explode(';', $request->input('price_range'));

            // Ensure both min and max values are provided
            if (count($priceRange) == 2) {
                $minPrice = $priceRange[0];
                $maxPrice = $priceRange[1];

                // Set the min and max values in the whereBetween clause
                $publications->whereBetween('price', [$minPrice, $maxPrice]);
            }
        }

        // Add similar logic for other filters...

        $filteredPublications = $publications->get();

        return view('customer.dashboard.dashboard', ['publications' => $filteredPublications]);
    }

}
