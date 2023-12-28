<?php

namespace App\Http\Controllers\customer;

use App\Models\SubmitOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubmitOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function listSubmitOrder()
    {
        $orders = SubmitOrder::where('user_id', auth()->user()->id)->get();
        return view('customer.submit_order.index', compact('orders'));
    }

    public function createSubmitOrder()
    {
        return view('customer.submit_order.create');
    }



    public function postSubmitOrder(Request $request)
    {
        // Validate each field individually using the Validator class
        $validator = Validator::make($request->all(), [
            'client_name' => 'required|string',
            'client_website' => 'required|url',
            'publications_packages' => 'required|string',
            'order_total' => 'required|numeric',
            'payment_method' => 'required|string',
            'terms' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Validation passed, create a new client record in the database
        $order = SubmitOrder::create([
        'user_id' => auth()->user()->id,
        'client_name' => $request->input('client_name'),
        'client_website' => $request->input('client_website'),
        'publications_packages' => $request->input('publications_packages'),
        'order_total' => $request->input('order_total'),
        'payment_method' => $request->input('payment_method'),
        'terms' => $request->has('terms')
        ]);

        // Redirect or perform any other action after storing the data
        return redirect()->route('list-submit-order')->with('success', 'Order submitted successfully');
    }



}
