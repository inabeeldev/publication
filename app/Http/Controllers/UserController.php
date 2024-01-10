<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ApproveUser;
use App\Models\Message;
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
        $users = User::where('user_type', 'customer')->get();
        return view('admin.user.index', compact('users'));
    }

    public function staff()
    {
        $users = User::where('user_type', '<>', 'customer')->with('roles')->get();

        return view('admin.user.staff', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.user.create',compact('roles'));
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
        $input['is_approved'] = true;

        $user = User::create($input);
        $user->assignRole($request->input('role'));

        return redirect()->route('staff-users')
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
            Mail::to('apnadevstesting@gmail.com')->send(new ApproveUser($user, $password));
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
        $user = User::findOrFail($id);
        $roles = Role::all(); // Assuming you want to show all roles in the edit form
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'user_type' => 'required|in:admin,manager',
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Pass the validation errors to the view
                ->withInput();           // Pass the old input data to the view
        }

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            // If password is provided, update it
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // Assign role to the user
        $user->syncRoles([$request->role]);

        return redirect()->route('staff-users')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Unsync roles before deleting the user
        $user->roles()->detach();

        // Delete the user
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }


    public function query()
    {
        $messages = Message::with('user')->get();
        return view('admin.user.query', compact('messages'));

    }

    public function deleteQuery($id)
    {
        $message = Message::findOrFail($id);

        // Delete the user
        $message->delete();

        return redirect()->back()->with('success', 'Query deleted successfully');
    }
}
