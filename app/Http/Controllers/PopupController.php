<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popups = Popup::all();
        return view('admin.popup.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validation rules
        $rules = [
            'type' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'status' => 'required|in:enable,disable',
        ];

        // Custom validation messages
        $messages = [
            'image.required' => 'The image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image must not be larger than 2MB.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        // Create a new popup instance
        $popup = new Popup([
            'type' => $request->input('type'),
            'image' => $imageName,
            'content' => $request->input('content'),
            'status' => $request->input('status'),
        ]);

        // Save the popup
        $popup->save();

        // Redirect with a success message
        return redirect()->route('popups.index')->with('success', 'Popup created successfully.');
    }

    public function togglePopup($id)
    {
        $popup = Popup::findOrFail($id);

        // Check if the user is trying to enable the popup
        if ($popup->status === 'disable') {
            // Check if there is already an enabled popup of the same type
            $existingEnabledPopup = Popup::where('type', $popup->type)
                ->where('status', 'enable')
                ->first();

            if ($existingEnabledPopup) {
                // Redirect back with a message indicating that only one popup type can be enabled at a time
                return redirect()->back()->with('message', 'You can only enable one popup type at a time.');
            }
        }

        // Toggle the status between 'enable' and 'disable'
        $popup->status = ($popup->status === 'enable') ? 'disable' : 'enable';
        $popup->save();

        return redirect()->back()->with('success', 'Popup status updated successfully.');; // Redirect back to the previous page
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
        $popup = Popup::findOrFail($id);
        $popup->delete();

        return redirect()->back()->with('message', 'Popup deleted successfully');
    }
}
