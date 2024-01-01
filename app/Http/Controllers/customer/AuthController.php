<?php

namespace App\Http\Controllers\customer;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function registerForm()
    {
        return view('customer.auth.register');
    }

    public function loginForm()
    {
        return view('customer.auth.login');
    }

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

        return redirect()->route('login-form')->with('success', 'Registration request sent to admin. You will get password after approval by admin');
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Check user type
            $user = Auth::user();
            if ($user->user_type !== 'customer') {
                Auth::logout(); // Log out the user if not a customer
                return redirect()->route('login-form')
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors(['email' => 'You are not authorized to log in from the customer login page.']); // Customize the error message
            }

            // Check if it's the user's first login
            // if ($user->first_login) {

            //     // Set cookie for welcome popup
            //     Cookie::queue('show_welcome_popup', 'true', 60 * 24 * 365); // 1 year expiration
            // }

            // Check for daily popup logic
            // $oneDayAgo = now()->subDay();
            // if ($user->last_login < $oneDayAgo) {
            //     // Display daily popup logic

            //     // Update last login date
            //     $user->update(['last_login' => now()]);
            // }

            // Authentication passed...
            return redirect()->intended(route('customer-home')); // Change 'dashboard' to your desired route after login
        }

        return redirect()->route('login-form')
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'Invalid login credentials.']); // Customize the error message
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
