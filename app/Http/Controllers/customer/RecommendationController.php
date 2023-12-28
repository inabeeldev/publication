<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Models\Recommendation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RecommendationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function listRequestRecommendation()
    {
        $recommendations = Recommendation::where('user_id', auth()->user()->id)->get();
        return view('customer.recommendation.index', compact('recommendations'));
    }

    public function createRequestRecommendation()
    {
        return view('customer.recommendation.create');
    }


    public function postRequestRecommendation(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'prospects_website' => 'required|url',
            'prospects_goal' => 'required|string',
            'budget' => 'required|numeric|min:1250',
            'publications_packages' => 'required|string',
            'parameters' => 'required|string',
            'terms' => 'required',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Store the data in the database
        $recommendation = Recommendation::create([
            'user_id' => auth()->user()->id,
            'prospects_website' => $request->input('prospects_website'),
            'prospects_goal' => $request->input('prospects_goal'),
            'budget' => $request->input('budget'),
            'publications_packages' => $request->input('publications_packages'),
            'parameters' => $request->input('parameters'),
            'terms' => $request->has('terms')
            ]);

        // Redirect to a success page or do whatever is needed
        return redirect()->route('list-request-recommendation')->with('success', 'Recommendation requested successfully');
    }
}
