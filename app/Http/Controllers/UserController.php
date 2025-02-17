<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

        $validated = $request->validate([
            'user_nik' => 'required|string|max:16|unique:users',
            'user_personal_email' => 'required|email|max:45',
            'user_medical' => 'required|string|max:45',
            'user_grade_id' => 'required|string|max:45',
            'user_resign_detail' => 'required|string',
            'user_work_experience' => 'required|string',
            'user_ava' => 'required|string',
            'user_gender' => 'required|string|max:6',
            'user_emergency_name' => 'required|string|max:50',
            'user_emergency_relationship' => 'required|string|max:50',

            // Nullable fields
            'user_name' => 'nullable|string|max:45',
            'user_email' => 'nullable|email|max:45|unique:users',
            'user_password' => 'nullable|string|max:45',
            'user_birthday' => 'nullable|date',
            'user_phone' => 'nullable|string|max:45',
            'user_address' => 'nullable|string',
            'user_emergency_contact' => 'nullable|string|max:30',
            'user_blood_type' => 'nullable|string|max:15',
            'user_status' => 'nullable|string|max:45',
            'user_join_date' => 'nullable|date',
            'user_probation_end' => 'nullable|date',
            'user_contract_start' => 'nullable|date',
            'user_contract_end' => 'nullable|date',
            'user_permanent_date' => 'nullable|date',
            'user_resign_date' => 'nullable|date',
            'user_lead' => 'nullable|string|max:50',
            'user_refferal' => 'nullable|string|max:50',
            'user_passport' => 'nullable|string|max:100',
            'user_passport_date' => 'nullable|date',
            'user_biotime_id' => 'nullable|string|max:50|unique:users',
            'user_employee_id' => 'nullable|string|max:50|unique:users',
            'user_bank_account' => 'nullable|string|max:50|unique:users',
        ]);

        $user = User::create([
            'user_id' => 'USR' . rand(100, 999),
            'user_nik' => $validated['user_nik'],
            'user_personal_email' => $validated['user_personal_email'],
            'user_medical' => $validated['user_medical'],
            'user_grade_id' => $validated['user_grade_id'],
            'user_resign_detail' => $validated['user_resign_detail'],
            'user_work_experience' => $validated['user_work_experience'],
            'user_ava' => $validated['user_ava'],
            'user_gender' => $validated['user_gender'],
            'user_emergency_name' => $validated['user_emergency_name'],
            'user_emergency_relationship' => $validated['user_emergency_relationship'],

            // Nullable fields
            'user_name' => $validated['user_name'],
            'user_email' => $validated['user_email'],
            'user_password' => $validated['user_password'],
            'user_birthday' => $validated['user_birthday'],
            'user_phone' => $validated['user_phone'],
            'user_address' => $validated['user_address'],
            'user_emergency_contact' => $validated['user_emergency_contact'],
            'user_blood_type' => $validated['user_blood_type'],
            'user_status' => $validated['user_status'],
            'user_join_date' => $validated['user_join_date'],
            'user_probation_end' => $validated['user_probation_end'],
            'user_contract_start' => $validated['user_contract_start'],
            'user_contract_end' => $validated['user_contract_end'],
            'user_permanent_date' => $validated['user_permanent_date'],
            'user_resign_date' => $validated['user_resign_date'],
            'user_lead' => $validated['user_lead'],
            'user_refferal' => $validated['user_refferal'],
            'user_passport' => $validated['user_passport'],
            'user_passport_date' => $validated['user_passport_date'],
            'user_biotime_id' => $validated['user_biotime_id'],
            'user_employee_id' => $validated['user_employee_id'],
            'user_bank_account' => $validated['user_bank_account'],
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully!');


        // Set default values
        $validated['user_type'] = $validated['user_type'] ?? 'Customer';
        $validated['user_leave'] = $validated['user_leave'] ?? '1';
        $validated['role_role_id'] = $validated['role_role_id'] ?? 'RL005';

        // Handle file upload for user_ava if it's a file
        if ($request->hasFile('user_ava')) {
            $path = $request->file('user_ava')->store('avatars', 'public');
            $validated['user_ava'] = $path;
        }

        // Hash password if provided
        if (isset($validated['user_password'])) {
            $validated['user_password'] = Hash::make($validated['user_password']);
        }

        try {
            User::create($validated);
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error creating user: ' . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            // Required fields (NOT NULL in database)
            'user_nik' => 'required|string|max:16|unique:users,user_nik,' . $user->user_id . ',user_id',
            'user_personal_email' => 'required|email|max:45',
            'user_medical' => 'required|string|max:45',
            'user_grade_id' => 'required|string|max:45',
            'user_resign_detail' => 'required|string',
            'user_work_experience' => 'required|string',
            'user_ava' => 'required|string',
            'user_gender' => 'required|string|max:6',
            'user_emergency_name' => 'required|string|max:50',
            'user_emergency_relationship' => 'required|string|max:50',

            // Nullable fields
            'user_name' => 'nullable|string|max:45',
            'user_email' => 'nullable|email|max:45|unique:users,user_email,' . $user->user_id . ',user_id',
            'user_password' => 'nullable|string|max:45',
            'user_birthday' => 'nullable|date',
            'user_phone' => 'nullable|string|max:45',
            'user_address' => 'nullable|string',
            'user_emergency_contact' => 'nullable|string|max:30',
            'user_blood_type' => 'nullable|string|max:15',
            'user_status' => 'nullable|string|max:45',
            'user_join_date' => 'nullable|date',
            'user_probation_end' => 'nullable|date',
            'user_contract_start' => 'nullable|date',
            'user_contract_end' => 'nullable|date',
            'user_permanent_date' => 'nullable|date',
            'user_resign_date' => 'nullable|date',
            'user_lead' => 'nullable|string|max:50',
            'user_refferal' => 'nullable|string|max:50',
            'user_passport' => 'nullable|string|max:100|unique:users,user_passport,' . $user->user_id . ',user_id',
            'user_passport_date' => 'nullable|date',
            'user_biotime_id' => 'nullable|string|max:50|unique:users,user_biotime_id,' . $user->user_id . ',user_id',
            'user_employee_id' => 'nullable|string|max:50|unique:users,user_employee_id,' . $user->user_id . ',user_id',
            'user_bank_account' => 'nullable|string|max:50|unique:users,user_bank_account,' . $user->user_id . ',user_id',
        ]);

        // Remove this line - we already have $user from the route model binding
        // $user = User::where('user_id', $user_id)->firstOrFail();

        // Handle file upload for user_ava if it's a file
        if ($request->hasFile('user_ava')) {
            // Delete old avatar
            if ($user->user_ava) {
                Storage::disk('public')->delete($user->user_ava);
            }
            $path = $request->file('user_ava')->store('avatars', 'public');
            $validated['user_ava'] = $path;
        }

        // Hash password if provided
        if (isset($validated['user_password']) && $validated['user_password'] !== $user->user_password) {
            $validated['user_password'] = Hash::make($validated['user_password']);
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
