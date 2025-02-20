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

    public function addUser(Request $request)
    {
        if ($request->isMethod('get')) {
            $roles = Role::all();
            $user = null; 
            return view('users.addUser', compact('roles','user'));
        } 
        elseif ($request->isMethod('post')) {
            
            $validator = Validator::make($request->all(), [
                'user_name' => 'required|string|max:45',
                'user_email' => 'required|email|max:45|unique:users',
                'user_password' => 'required|string|max:60',
                'user_type' => 'required|string|max:45',
                'user_status' => 'required|string|max:45',
                'user_ava' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'user_gender' => 'required|nullable|string|max:6',
                'user_lead' => 'nullable|string|max:50',
                'role_role_id' => 'nullable|string|max:50',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $user = new User();
            $user->user_id = Str::uuid()->toString();

            $user->user_name = $request->input('user_name');
            $user->user_email = $request->input('user_email');
            $user->user_password = Hash::make($request->input('user_password'));
            $user->user_type = $request->input('user_type');
            $user->user_status = $request->input('user_status');
            $user->user_gender = $request->input('user_gender');
            $user->user_lead = $request->input('user_lead');
            $user->role_role_id = $request->input('role_role_id');

            // Handle file upload for user_ava
            if ($request->hasFile('user_ava')) {
                $path = $request->file('user_ava')->store('user_ava', 'public');
                $user->user_ava = $path;
            } else {
                $user->user_ava = ''; 
            }

            $user->save();

            return redirect()->route('users.index')->with('success', 'User added successfully!');
        }
    }

    public function viewUser(Request $request)
    {
        $user = User::where('user_id', $request->query('user_id'))->firstOrFail();
        return view('users.viewUser', compact('user'));
    }


    public function editUser(Request $request)
    {
        // Fetch user by user_id from query parameters
        $user = User::where('user_id', $request->query('user_id'))->firstOrFail();

        if ($request->isMethod('get')) {
            $roles = Role::all();
            return view('users.editUser', compact('user', 'roles'));
        } 
        
        elseif ($request->isMethod('post')) {
            $validated = $request->validate([
                'user_name' => 'nullable|string|max:45',
                'user_email' => 'nullable|email|max:45|unique:users,user_email,' . $user->user_id . ',user_id',
                'user_type' => 'nullable|string|max:45',
                'user_status' => 'nullable|string|max:45',
                'user_ava' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'user_gender' => 'nullable|string|max:6',
                'user_lead' => 'nullable|string|max:50',
                'role_role_id' => 'nullable|string|max:50',
            ]);

            if ($request->filled('user_password')) {
                $validated['user_password'] = Hash::make($request->user_password);
            }

            // Handle Avatar Upload
            if ($request->hasFile('user_ava')) {
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
    }


    public function deleteUser(Request $request)
    {
        try {
            // Find user first
            $user = User::where('user_id', $request->query('user_id'))->firstOrFail();

            // Delete avatar if exists
            if ($user->user_ava) {
                Storage::disk('public')->delete($user->user_ava);
            }

            // Delete user
            $user->delete();

            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting user: ' . $e->getMessage());
        }
    }

}