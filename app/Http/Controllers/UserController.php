<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        // $users = User::where('user_id', User::id())->firstOrFail();

        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:45',
            'user_email' => 'required|email|max:45|unique:users',
            'user_password' => 'required|string|max:60',
            'user_type' => 'required|string|max:45',
            'user_status' => 'required|string|max:45',
            'user_ava' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_gender' => 'nullable|string|max:6',
            'user_lead' => 'nullable|string|max:50',
            'role_role_id' => 'nullable|string|max:50',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $user = new User();
        $user->user_id = 'USR' . rand(100, 999);
        $user->user_name = $request->input('user_name');
        $user->user_email = $request->input('user_email');
        $user->user_password = Hash::make($request->input('user_password'));
        $user->user_type = $request->input('user_type');
        $user->user_status = $request->input('user_status');
        $user->user_ava = $request->except('user_ava');
        $user->user_gender = $request->input('user_gender');
        $user->user_lead = $request->input('user_lead');
        $user->role_role_id = $request->input('role_role_id');
    
        // Handle file upload for user_ava
        if ($request->hasFile('user_ava')) {
            $path = $request->file('user_ava')->store('user_ava', 'public');
            $user->user_ava = $path;
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'user_name' => 'nullable|string|max:45',
            'user_email' => 'nullable|email|max:45|unique:users,user_email,' . $user->user_id . ',user_id',
            'user_password' => 'nullable|string|max:60',
            'user_type' => 'nullable|string|max:45',
            'user_status' => 'nullable|string|max:45',
            'user_ava' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_gender' => 'nullable|string|max:6',
            'user_lead' => 'nullable|string|max:50',
            'role_role_id' => 'nullable|string|max:50',
        ]);
    
        if ($request->hasFile('user_ava')) {
            // Delete old avatar
            if ($user->user_ava) {
                Storage::disk('public')->delete($user->user_ava);
            }
            $path = $request->file('user_ava')->store('user_ava', 'public');
            $validated['user_ava'] = $path;
        }
    
        try {
            $user->update($validated);
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error updating user: ' . $e->getMessage());
        }
    }
    

    public function destroy(User $user)
    {
        try {
            // Delete avatar file if exists
            if ($user->user_ava) {
                Storage::disk('public')->delete($user->user_ava);
            }

            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting user: ' . $e->getMessage());
        }
    }
}