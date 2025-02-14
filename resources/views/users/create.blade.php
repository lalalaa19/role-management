<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Personal Information -->
    <h4>Personal Information</h4>

    <div class="form-group">
        <label for="user_nik">NIK</label>
        <input type="text" name="user_nik" id="user_nik" class="form-control">
        @error('user_nik')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_name">Name</label>
        <input type="text" name="user_name" id="user_name" class="form-control" required>
        @error('user_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" id="user_email" class="form-control" required>
        @error('user_email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_personal_email">Personal Email</label>
        <input type="email" name="user_personal_email" id="user_personal_email" class="form-control">
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
        <input type="date" name="user_birthday" id="user_birthday" class="form-control" required>
        @error('user_birthday')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_phone">Phone Number</label>
        <input type="tel" name="user_phone" id="user_phone" class="form-control" placeholder="Enter your phone number" required>
        @error('user_phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_address">Address</label>
        <textarea name="user_address" id="user_address" class="form-control"></textarea>
        @error('user_address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_gender">Gender</label>
        <select name="user_gender" id="user_gender" class="form-control">
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
        <input type="file" name="user_ava" id="user_ava" class="form-control">
        @error('user_ava')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Employment Details -->
    <h4>Employment Details</h4>
    <div class="form-group">
        <label for="user_grade_id">Grade ID</label>
        <input type="text" name="user_grade_id" id="user_grade_id" class="form-control">
        @error('user_grade_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_join_date">Join Date</label>
        <input type="date" name="user_join_date" id="user_join_date" class="form-control">
        @error('user_join_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_biotime_id">Biotime ID</label>
        <input type="text" name="user_biotime_id" id="user_biotime_id" class="form-control">
        @error('user_biotime_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_probation_end">Probation End Date</label>
        <input type="date" name="user_probation_end" id="user_probation_end" class="form-control">
        @error('user_probation_end')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_contract_start">Contract Start Date</label>
        <input type="date" name="user_contract_start" id="user_contract_start" class="form-control">
        @error('user_contract_start')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_contract_end">Contract End Date</label>
        <input type="date" name="user_contract_end" id="user_contract_end" class="form-control">
        @error('user_contract_end')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_permanent_date">Permanent Date</label>
        <input type="date" name="user_permanent_date" id="user_permanent_date" class="form-control">
        @error('user_permanent_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_resign_date">Resign Date</label>
        <input type="date" name="user_resign_date" id="user_resign_date" class="form-control">
        @error('user_resign_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_resign_detail">Resign Details</label>
        <textarea name="user_resign_detail" id="user_resign_detail" class="form-control"></textarea>
        @error('user_resign_detail')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_work_experience">Work Experience</label>
        <textarea name="user_work_experience" id="user_work_experience" class="form-control"></textarea>
        @error('user_work_experience')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_employee_id">Employee ID</label>
        <input type="text" name="user_employee_id" id="user_employee_id" class="form-control">
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
        <input type="text" name="user_status" id="user_status" class="form-control">
        @error('user_status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Emergency Contact -->
    <h4>Emergency Contact</h4>
    <div class="form-group">
        <label for="user_emergency_name">Emergency Contact Name</label>
        <input type="text" name="user_emergency_name" id="user_emergency_name" class="form-control">
        @error('user_emergency_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_emergency_relationship">Relationship</label>
        <input type="text" name="user_emergency_relationship" id="user_emergency_relationship" class="form-control">
        @error('user_emergency_relationship')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_emergency_contact">Emergency Contact Number</label>
        <input type="tel" name="user_emergency_contact" id="user_emergency_contact" class="form-control">
        @error('user_emergency_contact')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Medical Details -->
    <h4>Medical Details</h4>
    <div class="form-group">
        <label for="user_blood_type">Blood Type</label>
        <input type="text" name="user_blood_type" id="user_blood_type" class="form-control">
        @error('user_blood_type')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_medical">Medical Information</label>
        <textarea name="user_medical" id="user_medical" class="form-control"></textarea>
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
        <input type="text" name="user_bank_account" id="user_bank_account" class="form-control">
        @error('user_bank_account')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_passport_date">Passport Date</label>
        <input type="date" name="user_passport_date" id="user_passport_date" class="form-control">
        @error('user_passport_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_passport">Passport Number</label>
        <input type="text" name="user_passport" id="user_passport" class="form-control">
        @error('user_passport')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="user_passport_details">Passport Details</label>
        <textarea name="user_passport_details" id="user_passport_details" class="form-control"></textarea>
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
        <input type="text" name="user_lead" id="user_lead" class="form-control">
        @error('user_lead')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_refferal">Referral</label>
        <input type="text" name="user_refferal" id="user_refferal" class="form-control">
        @error('user_refferal')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>