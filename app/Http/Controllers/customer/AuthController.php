<?php

namespace App\Http\Controllers\customer;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'profile_url' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'contact_preference' => 'nullable|string|max:255',
            'getclout_services' => 'nullable|array', // Adjust the validation based on the actual input type
            'order_timing' => 'nullable|string|max:255',
            'order_quantity' => 'nullable|string|max:255',
            'how_did_you_hear' => 'nullable|string|max:255',
            'zoom_call' => 'nullable|in:yes,no', // Adjust the validation based on the actual input values
            'additional_notes' => 'nullable|string',
            'terms' => 'required',
            // 'user_type' => ['required', Rule::in(['customer', 'admin', 'manager'])],
            'is_approved' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create the user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'profile_url' => $request->input('profile_url'),
            'mobile_number' => $request->input('mobile_number'),
            'country' => $request->input('country'),
            'contact_preference' => $request->input('contact_preference'),
            'getclout_services' => json_encode($request->input('getclout_services')),
            'order_timing' => $request->input('order_timing'),
            'order_quantity' => $request->input('order_quantity'),
            'how_did_you_hear' => $request->input('how_did_you_hear'),
            'zoom_call' => $request->input('zoom_call'),
            'additional_notes' => $request->input('additional_notes'),
            'terms' => $request->has('terms'),
            'user_type' => 'customer',
            'is_approved' => false,
        ]);

        // Notify admin or perform any other necessary actions

        return redirect()->route('login')->with('success', 'Registration request sent to admin. You will get password after approval by admin');
    }
}
