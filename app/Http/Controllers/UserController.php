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

    public function store(Request $request){
    $validator = Validator::make($request->all(), [
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
        'user_password' => 'required|min:4|max:5',
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
        'user_referral' => 'nullable|string|max:50',
        'user_passport' => 'nullable|string|max:100',
        'user_passport_date' => 'nullable|date',
        'user_biotime_id' => 'nullable|string|max:50|unique:users',
        'user_employee_id' => 'nullable|string|max:50|unique:users',
        'user_bank_account' => 'nullable|string|max:50|unique:users',
    ]);


    $user = new User();
    $user->user_id = 'USR' . rand(100, 999);
    $user->user_nik = $request->input('user_nik');
    $user->user_personal_email = $request->input('user_personal_email');
    $user->user_medical = $request->input('user_medical');
    $user->user_grade_id = $request->input('user_grade_id');
    $user->user_resign_detail = $request->input('user_resign_detail');
    $user->user_work_experience = $request->input('user_work_experience');
    $user->user_ava = $request->input('user_ava');
    $user->user_gender = $request->input('user_gender');
    $user->user_emergency_name = $request->input('user_emergency_name');
    $user->user_emergency_relationship = $request->input('user_emergency_relationship');
    
    // Nullable fields
    $user->user_name = $request->input('user_name');
    $user->user_email = $request->input('user_email');
    $user->user_password = Hash::make($request->input('user_password'));
    $user->user_birthday = $request->input('user_birthday');
    $user->user_phone = $request->input('user_phone');
    $user->user_address = $request->input('user_address');
    $user->user_emergency_contact = $request->input('user_emergency_contact');
    $user->user_blood_type = $request->input('user_blood_type');
    $user->user_status = $request->input('user_status');
    $user->user_join_date = $request->input('user_join_date');
    $user->user_probation_end = $request->input('user_probation_end');
    $user->user_contract_start = $request->input('user_contract_start');
    $user->user_contract_end = $request->input('user_contract_end');
    $user->user_permanent_date = $request->input('user_permanent_date');
    $user->user_resign_date = $request->input('user_resign_date');
    $user->user_lead = $request->input('user_lead');
    $user->user_referral = $request->input('user_referral');
    $user->user_passport = $request->input('user_passport');
    $user->user_passport_date = $request->input('user_passport_date');
    $user->user_biotime_id = $request->input('user_biotime_id');
    $user->user_employee_id = $request->input('user_employee_id');
    $user->user_bank_account = $request->input('user_bank_account');
    
    $user->save();
    

    return redirect()->route('users.index')->with('success', 'User added successfully!');

        // Set default values
        $validated['user_type'] = $validated['user_type'] ?? 'Customer';
        $validated['user_leave'] = $validated['user_leave'] ?? '1';
        $validated['role_role_id'] = $validated['role_role_id'] ?? 'RL005';

        // Handle file upload for user_ava 
        if ($request->hasFile('user_ava')) {
            $path = $request->file('user_ava')->store('avatars', 'public');
            $validated['user_ava'] = $path;
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
            'user_referral' => 'nullable|string|max:50',
            'user_passport' => 'nullable|string|max:100|unique:users,user_passport,' . $user->user_id . ',user_id',
            'user_passport_date' => 'nullable|date',
            'user_biotime_id' => 'nullable|string|max:50|unique:users,user_biotime_id,' . $user->user_id . ',user_id',
            'user_employee_id' => 'nullable|string|max:50|unique:users,user_employee_id,' . $user->user_id . ',user_id',
            'user_bank_account' => 'nullable|string|max:50|unique:users,user_bank_account,' . $user->user_id . ',user_id',
        ]);

        if ($request->hasFile('user_ava')) {
            // Delete old avatar
            if ($user->user_ava) {
                Storage::disk('public')->delete($user->user_ava);
            }
            $path = $request->file('user_ava')->store('avatars', 'public');
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