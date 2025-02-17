<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">User Information Form</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <!-- Personal Information Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="user_nik" name="user_nik">
                            @error('user_nik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name">
                            @error('user_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email">
                            @error('user_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_personal_email" class="form-label">Personal Email</label>
                            <input type="email" class="form-control" id="user_personal_email" name="user_personal_email">
                            @error('user_personal_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('user_password') is-invalid @enderror" 
                                   id="user_password" name="user_password" placeholder="Enter password">
                            @error('user_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="user_birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="user_birthday" name="user_birthday">
                            @error('user_birthday')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="user_phone" name="user_phone">
                            @error('user_phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="user_address" name="user_address">
                            @error('user_address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_gender" class="form-label">Gender</label>
                            <select class="form-select" id="user_gender" name="user_gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('user_gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_ava" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="user_ava" name="user_ava">
                            @error('user_ava')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employment Details Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Employment Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_grade_id" class="form-label">Grade ID</label>
                            <input type="text" class="form-control" id="user_grade_id" name="user_grade_id">
                            @error('user_grade_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_join_date" class="form-label">Join Date</label>
                            <input type="date" class="form-control" id="user_join_date" name="user_join_date">
                            @error('user_join_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_biotime_id" class="form-label">Biotime ID</label>
                            <input type="text" class="form-control" id="user_biotime_id" name="user_biotime_id">
                            @error('user_biotime_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_probation_end" class="form-label">Probation End Date</label>
                            <input type="date" class="form-control" id="user_probation_end" name="user_probation_end">
                            @error('user_probation_end')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_contract_start" class="form-label">Contract Start Date</label>
                            <input type="date" class="form-control" id="user_contract_start" name="user_contract_start">
                            @error('user_contract_start')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_contract_end" class="form-label">Contract End Date</label>
                            <input type="date" class="form-control" id="user_contract_end" name="user_contract_end">
                            @error('user_contract_end')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_permanent_date" class="form-label">Permanent Date</label>
                            <input type="date" class="form-control" id="user_permanent_date" name="user_permanent_date">
                            @error('user_permanent_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_resign_date" class="form-label">Resign Date</label>
                            <input type="date" class="form-control" id="user_resign_date" name="user_resign_date">
                            @error('user_resign_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_resign_detail" class="form-label">Resign Details</label>
                            <textarea class="form-control" id="user_resign_detail" name="user_resign_detail"></textarea>
                            @error('user_resign_detail')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_work_experience" class="form-label">Work Experience</label>
                            <textarea class="form-control" id="user_work_experience" name="user_work_experience"></textarea>
                            @error('user_work_experience')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="user_employee_id" name="user_employee_id">
                            @error('user_employee_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_type" class="form-label">User Type</label>
                            <input type="text" name="user_type" value="{{ old('user_type', $user->user_type ?? 'Customer') }}">
                            @error('user_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_status" class="form-label">User Status</label>
                            <input type="text" class="form-control" id="user_status" name="user_status">
                            @error('user_status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emergency Contact Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Emergency Contact</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_emergency_name" class="form-label">Emergency Contact Name</label>
                            <input type="text" class="form-control" id="user_emergency_name" name="user_emergency_name">
                            @error('user_emergency_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_emergency_relationship" class="form-label">Relationship</label>
                            <input type="text" class="form-control" id="user_emergency_relationship" name="user_emergency_relationship">
                            @error('user_emergency_relationship')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_emergency_contact" class="form-label">Emergency Contact Number</label>
                            <input type="tel" class="form-control" id="user_emergency_contact" name="user_emergency_contact">
                            @error('user_emergency_contact')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Medical Details Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Medical Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_blood_type" class="form-label">Blood Type</label>
                            <input type="text" class="form-control" id="user_blood_type" name="user_blood_type">
                            @error('user_blood_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_medical" class="form-label">Medical Information</label>
                            <textarea class="form-control" id="user_medical" name="user_medical"></textarea>
                            @error('user_medical')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_leave" class="form-label">Leave</label>
                            <input type="text" name="user_leave" value="{{ old('user_leave', $user->user_leave ?? '1') }}">
                           
                            @error('user_leave')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial & Documents Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Financial & Documents</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_bank_account" class="form-label">Bank Account</label>
                            <input type="text" class="form-control" id="user_bank_account" name="user_bank_account">
                            @error('user_bank_account')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_passport_date" class="form-label">Passport Date</label>
                            <input type="date" class="form-control" id="user_passport_date" name="user_passport_date">
                            @error('user_passport_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_passport" class="form-label">Passport Number</label>
                            <input type="text" class="form-control" id="user_passport" name="user_passport">
                            @error('user_passport')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_passport_details" class="form-label">Passport Details</label>
                            <textarea class="form-control" id="user_passport_details" name="user_passport_details"></textarea>
                            @error('user_passport_details')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Roles & Permissions Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Roles & Permissions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                                <label for="role_role_id">Role</label>
                                <select name="role_role_id" class="form-control" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            @error('role_role_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_lead" class="form-label">Lead</label>
                            <input type="text" class="form-control" id="user_lead" name="user_lead">
                            @error('user_lead')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_referral" class="form-label">Referral</label>
                            <input type="text" class="form-control" id="user_referral" name="user_referral">
                            @error('user_referral')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>