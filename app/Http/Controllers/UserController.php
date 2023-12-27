<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ApproveUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('dashboard.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'user_type' => 'required',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('role'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    public function updateApproval($id)
    {
        $user = User::findOrFail($id);

        // Convert string to boolean
        $isApproved = request('is_approved') === 'true';

        // Update is_approved
        $user->update(['is_approved' => $isApproved]);

        // If checkbox is checked (true) and password is null, update the password
        if ($isApproved && is_null($user->password)) {
            $password = Str::random(8); // Generate an 8-character password
            $user->update(['password' => bcrypt($password)]);
            Mail::to($user->email)->send(new ApproveUser($user, $password));
        }

        return response()->json(['message' => 'Approval status and password updated successfully']);
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
