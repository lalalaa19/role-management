<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Personal info
            'user_nik' => 'required|string|unique:users,user_nik',
            'user_name' => 'required|string',
            'user_email' => 'required|email|unique:users,user_email',
            'user_personal_email' => 'nullable|email|unique:users,user_personal_email',
            'user_password' => 'required|string|min:6',
            'user_birthday' => 'required|date',
            'user_phone' => 'required|string',
            'user_address' => 'nullable|string',
            'user_gender' => 'required|in:male,female,other',
            'user_ava' => 'nullable|string',

            // Employment Details
            'user_grade_id' => 'required|string',
            'user_join_date' => 'required|date',
            'user_biotime_id' => 'nullable|string|unique:users,user_biotime_id',
            'user_probation_end' => 'nullable|date',
            'user_contract_start' => 'nullable|date',
            'user_contract_end' => 'nullable|date',
            'user_permanent_date' => 'nullable|date',
            'user_resign_date' => 'nullable|date',
            'user_resign_detail' => 'nullable|string',
            'user_work_experience' => 'nullable|string',
            'user_employee_id' => 'nullable|string|unique:users,user_employee_id',
            'user_type' => 'required|string',
            'user_status' => 'required|string',

            // Emergency Contact
            'user_emergency_name' => 'nullable|string',
            'user_emergency_relationship' => 'nullable|string',
            'user_emergency_contact' => 'nullable|string',

            // Medical Details
            'user_blood_type' => 'nullable|string',
            'user_medical' => 'nullable|string',
            'user_leave' => 'nullable|integer|max:20',

            // Financial & Docs
            'user_bank_account' => 'nullable|string|unique:users,user_bank_account',
            'user_passport' => 'nullable|string|unique:users,user_passport',
            'user_passport_date' => 'nullable|date',
            'user_passport_details' => 'nullable|string',

            // Roles & Permission
            'role_role_id' => 'required|exists:roles,role_id|max:45',
            'user_lead' => 'nullable|string',
            'user_refferal' => 'nullable|string'
        ]);

        if ($request->hasFile('user_ava')) {
            $path = $request->file('user_ava')->store('avatars', 'public');
            $validated['user_ava'] = $path;
        }

        $validated['user_password'] = Hash::make($validated['user_password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // UPDATE Functipn 

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            // Personal info
            'user_nik' => 'required|string|unique:users,user_nik',
            'user_name' => 'required|string',
            'user_email' => 'required|email|unique:users,user_email',
            'user_personal_email' => 'nullable|email|unique:users,user_personal_email',
            'user_password' => 'required|string|min:6',
            'user_birthday' => 'required|date',
            'user_phone' => 'required|string',
            'user_address' => 'nullable|string',
            'user_gender' => 'required|in:male,female,other',
            'user_ava' => 'nullable|string',

            // Employment Details
            'user_join_date' => 'required|date',
            'user_biotime_id' => 'nullable|string|unique:users,user_biotime_id',
            'user_probation_end' => 'nullable|date',
            'user_contract_start' => 'nullable|date',
            'user_contract_end' => 'nullable|date',
            'user_permanent_date' => 'nullable|date',
            'user_resign_date' => 'nullable|date',
            'user_resign_detail' => 'nullable|string',
            'user_work_experience' => 'nullable|string',
            'user_employee_id' => 'nullable|string|unique:users,user_employee_id',
            'user_type' => 'required|string',
            'user_status' => 'required|string',

            // Emergency Contact
            'user_emergency_name' => 'nullable|string',
            'user_emergency_relationship' => 'nullable|string',
            'user_emergency_contact' => 'nullable|string',

            // Medical Details
            'user_blood_type' => 'nullable|string',
            'user_medical' => 'nullable|string',
            'user_leave' => 'nullable|integer',

            // Financial & Docs
            'user_bank_account' => 'nullable|string|unique:users,user_bank_account',
            'user_passport' => 'nullable|string|unique:users,user_passport',
            'user_passport_details' => 'nullable|string',

            // Roles & Permission
            'role_role_id' => 'required|exists:role,role_id',
            'user_lead' => 'nullable|string',
            'user_refferal' => 'nullable|string'
        ]);

        if ($request->hasFile('user_ava')) {
            if ($user->user_ava) {
                Storage::disk('public')->delete($user->user_ava);
            }
            $path = $request->file('user_ava')->store('avatars', 'public');
            $validated['user_ava'] = $path;
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
    }
}