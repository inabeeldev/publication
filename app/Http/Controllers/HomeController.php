<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function submitOrder()
    {
        return view('dashboard.order_submit');
    }

    public function requestRecommendation()
    {
        return view('dashboard.recommendation');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}
