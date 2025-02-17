@extends('layouts.app')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('users.update', $user->user_id) }}" method="POST" >
    @csrf
    @method('PUT')

     <!-- Personal Information -->
    <h4>Personal Information</h4>
    <div class="form-group">
        <label for="user_id">User ID</label>
        <input type="text" name="user_id" id="user_id" value="{{ old('user_id', $user->user_id ?? 'Generating...') }}" 
        class="form-control" readonly>
        @error('user_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_nik">NIK</label>
        <input type="text" name="user_nik" id="user_nik" class="form-control" required value="{{ old('user_nik', $user->user_nik) }}">
        @error('user_nik')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_name">Name</label>
        <input type="text" name="user_name" id="user_name" class="form-control" required value="{{ old('user_name', $user->user_name) }}">
        @error('user_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" id="user_email" class="form-control" required value="{{ old('user_email', $user->user_email) }}">
        @error('user_email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_personal_email">Personal Email</label>
        <input type="email" name="user_personal_email" id="user_personal_email" class="form-control" required value="{{ old('user_personal_email', $user->user_personal_email) }}">
        @error('user_personal_email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" id="user_password" class="form-control" required>
        @error('user_password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_birthday">Birthday</label>
        <input type="date" name="user_birthday" id="user_birthday" class="form-control" required value="{{ old('user_birthday', $user->user_birthday) }}">
        @error('user_birthday')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_phone">Phone Number</label>
        <input type="tel" name="user_phone" id="user_phone" class="form-control" placeholder="Enter your phone number" required value="{{ old('user_phone', $user->user_phone) }}">
        @error('user_phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_address">Address</label>
        <textarea name="user_address" id="user_address" class="form-control" >{{ old('user_address', $user->user_address) }}</textarea>
        @error('user_address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_gender">Gender</label>
        <select name="user_gender" id="user_gender" class="form-control" value="{{ old('user_gender', $user->user_gender) }}">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        @error('user_gender')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_ava">Profile Picture</label>
        <input type="file" name="user_ava" id="user_ava" class="form-control" value="{{ old('user_ava', $user->user_ava) }}">
        @error('user_ava')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Employment Details -->
    <h4>Employment Details</h4>
    <div class="form-group">
        <label for="user_grade_id">Grade ID</label>
        <input type="text" name="user_grade_id" id="user_grade_id" class="form-control" value="{{ old('user_grade_id', $user->user_grade_id) }}">
        @error('user_grade_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_join_date">Join Date</label>
        <input type="date" name="user_join_date" id="user_join_date" class="form-control" value="{{ old('user_join_date', $user->user_join_date) }}">
        @error('user_join_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_biotime_id">Biotime ID</label>
        <input type="text" name="user_biotime_id" id="user_biotime_id" class="form-control" value="{{ old('user_biotime_id', $user->user_biotime_id) }}">
        @error('user_biotime_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_probation_end">Probation End Date</label>
        <input type="date" name="user_probation_end" id="user_probation_end" class="form-control" value="{{ old('user_probation_end', $user->user_probation_end) }}">
        @error('user_probation_end')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_contract_start">Contract Start Date</label>
        <input type="date" name="user_contract_start" id="user_contract_start" class="form-control" value="{{ old('user_contract_start', $user->user_contract_start) }}">
        @error('user_contract_start')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_contract_end">Contract End Date</label>
        <input type="date" name="user_contract_end" id="user_contract_end" class="form-control" value="{{ old('user_contract_end', $user->user_contract_end) }}">
        @error('user_contract_end')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_permanent_date">Permanent Date</label>
        <input type="date" name="user_permanent_date" id="user_permanent_date" class="form-control" value="{{ old('user_permanent_date', $user->user_permanent_date) }}">
        @error('user_permanent_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_resign_date">Resign Date</label>
        <input type="date" name="user_resign_date" id="user_resign_date" class="form-control" value="{{ old('user_resign_date', $user->user_resign_date) }}">
        @error('user_resign_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_resign_detail">Resign Details</label>
        <textarea name="user_resign_detail" id="user_resign_detail" class="form-control" >{{ old('user_resign_detail', $user->user_resign_detail) }}</textarea>
        @error('user_resign_detail')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_work_experience">Work Experience</label>
        <textarea name="user_work_experience" id="user_work_experience" class="form-control">{{ old('user_work_experience', $user->user_work_experience) }}</textarea>
        @error('user_work_experience')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_employee_id">Employee ID</label>
        <input type="text" name="user_employee_id" id="user_employee_id" class="form-control" value="{{ old('user_employee_id', $user->user_employee_id) }}">
        @error('user_employee_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_type">User Type</label>
        <input type="text" name="user_type" value="{{ old('user_type', $user->user_type ?? 'Customer') }}">
        @error('user_type')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_status">User Status</label>
        <input type="text" name="user_status" id="user_status" class="form-control" value="{{ old('user_status', $user->user_status) }}">
        @error('user_status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Emergency Contact -->
    <h4>Emergency Contact</h4>
    <div class="form-group">
        <label for="user_emergency_name">Emergency Contact Name</label>
        <input type="text" name="user_emergency_name" id="user_emergency_name" class="form-control" value="{{ old('user_emergency_name', $user->user_emergency_name) }}">
        @error('user_emergency_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_emergency_relationship">Relationship</label>
        <input type="text" name="user_emergency_relationship" id="user_emergency_relationship" class="form-control" value="{{ old('user_emergency_relationship', $user->user_emergency_relationship) }}">
        @error('user_emergency_relationship')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_emergency_contact">Emergency Contact Number</label>
        <input type="tel" name="user_emergency_contact" id="user_emergency_contact" class="form-control" value="{{ old('user_emergency_contact', $user->user_emergency_contact) }}">
        @error('user_emergency_contact')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Medical Details -->
    <h4>Medical Details</h4>
    <div class="form-group">
        <label for="user_blood_type">Blood Type</label>
        <input type="text" name="user_blood_type" id="user_blood_type" class="form-control" value="{{ old('user_blood_type', $user->user_blood_type) }}">
        @error('user_blood_type')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_medical">Medical Information</label>
        <textarea name="user_medical" id="user_medical" class="form-control" >{{ old('user_medical', $user->user_medical) }}</textarea>
        @error('user_medical')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_leave">Leave</label>
        <input type="text" name="user_leave" value="{{ old('user_leave', $user->user_leave ?? '1') }}">
        @error('user_leave')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Financial & Docs -->
    <h4>Financial & Documents</h4>
    <div class="form-group">
        <label for="user_bank_account">Bank Account</label>
        <input type="text" name="user_bank_account" id="user_bank_account" class="form-control" value="{{ old('user_bank_account', $user->user_bank_account) }}">
        @error('user_bank_account')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_passport_date">Passport Date</label>
        <input type="date" name="user_passport_date" id="user_passport_date" class="form-control" value="{{ old('user_passport_date', $user->user_passport_date) }}">
        @error('user_passport_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_passport">Passport Number</label>
        <input type="text" name="user_passport" id="user_passport" class="form-control" value="{{ old('user_passport', $user->user_passport) }}">
        @error('user_passport')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_passport_details">Passport Details</label>
        <textarea name="user_passport_details" id="user_passport_details" class="form-control">{{ old('user_passport_details', $user->user_passport_details) }}</textarea>
        @error('user_passport_details')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Roles & Permissions -->
    <h4>Roles & Permissions</h4>
    <div class="form-group">
        <label for="role_role_id">Role ID</label>
        <input type="text" name="role_role_id" value="{{ old('role_role_id', $user->role_role_id ?? 'RL005') }}">
        @error('role_role_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_lead">Lead</label>
        <input type="text" name="user_lead" id="user_lead" class="form-control" value="{{ old('user_lead', $user->user_lead) }}">
        @error('user_lead')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_referral">Referral</label>
        <input type="text" name="user_referral" id="user_referral" class="form-control" value="{{ old('user_referral', $user->user_referral) }}">
        @error('user_referral')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection