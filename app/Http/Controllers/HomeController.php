<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use App\Models\SubmitOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('admin.user.index');
    }


    public function profile()
    {
        return view('admin.profile');
    }

    public function order()
    {
        $orders = SubmitOrder::with('user')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function recommendation()
    {
        $recommendations = Recommendation::with('user')->get();
        return view('admin.recommendation.index', compact('recommendations'));
    }


}
