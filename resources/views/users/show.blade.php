<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>User Details</h1>

        <!-- Back Button -->
        <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>

        <!-- User Details -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $user->user_name }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Personal Information -->
                    <div class="col-md-6">
                        <h6>Personal Information</h6>
                        <p><strong>User ID:</strong> {{ $user->user_id }}</p>
                        <p><strong>Name:</strong> {{ $user->user_name }}</p>
                        <p><strong>Email:</strong> {{ $user->user_email }}</p>
                        <p><strong>Personal Email:</strong> {{ $user->user_personal_email ?? 'N/A' }}</p>
                        <p><strong>Birthday:</strong> {{ $user->user_birthday ? \Carbon\Carbon::parse($user->user_birthday)->format('d M Y') : 'N/A' }}</p>
                        <p><strong>Phone:</strong> {{ $user->user_phone ?? 'N/A' }}</p>
                        <p><strong>Address:</strong> {{ $user->user_address ?? 'N/A' }}</p>
                        <p><strong>Gender:</strong> {{ $user->user_gender ?? 'N/A' }}</p>
                        <p><strong>Profile Picture:</strong>
                            @if ($user->user_ava)
                                <img src="{{ asset('storage/' . $user->user_ava) }}" alt="Profile Picture" class="img-thumbnail" style="max-width: 150px;">
                            @else
                                N/A
                            @endif
                        </p>
                    </div>

                    <!-- Employment Details -->
                    <div class="col-md-6">
                        <h6>Employment Details</h6>
                        <p><strong>Join Date:</strong> {{ $user->user_join_date ? \Carbon\Carbon::parse($user->user_join_date)->format('d M Y') : 'N/A' }}</p>
                        <p><strong>Biotime ID:</strong> {{ $user->user_biotime_id ?? 'N/A' }}</p>
                        <p><strong>Probation End Date:</strong> {{ $user->user_probation_end ? \Carbon\Carbon::parse($user->user_probation_end)->format('d M Y') : 'N/A' }}</p>
                        <p><strong>Contract Start Date:</strong> {{ $user->user_contract_start ? \Carbon\Carbon::parse($user->user_contract_start)->format('d M Y') : 'N/A' }}</p>
                        <p><strong>Contract End Date:</strong> {{ $user->user_contract_end ? \Carbon\Carbon::parse($user->user_contract_end)->format('d M Y') : 'N/A' }}</p>
                        <p><strong>Permanent Date:</strong> {{ $user->user_permanent_date ? \Carbon\Carbon::parse($user->user_permanent_date)->format('d M Y') : 'N/A' }}</p>
                        <p><strong>Resign Date:</strong> {{ $user->user_resign_date ? \Carbon\Carbon::parse($user->user_resign_date)->format('d M Y') : 'N/A' }}</p>
                        <p><strong>Resign Details:</strong> {{ $user->user_resign_detail ?? 'N/A' }}</p>
                        <p><strong>Work Experience:</strong> {{ $user->user_work_experience ?? 'N/A' }}</p>
                        <p><strong>Employee ID:</strong> {{ $user->user_employee_id ?? 'N/A' }}</p>
                        <p><strong>User Type:</strong> {{ $user->user_type ?? 'N/A' }}</p>
                        <p><strong>User Status:</strong> {{ $user->user_status ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Emergency Contact</h6>
                        <p><strong>Name:</strong> {{ $user->user_emergency_name ?? 'N/A' }}</p>
                        <p><strong>Relationship:</strong> {{ $user->user_emergency_relationship ?? 'N/A' }}</p>
                        <p><strong>Contact Number:</strong> {{ $user->user_emergency_contact ?? 'N/A' }}</p>
                    </div>

                    <!-- Medical Details -->
                    <div class="col-md-6">
                        <h6>Medical Details</h6>
                        <p><strong>Blood Type:</strong> {{ $user->user_blood_type ?? 'N/A' }}</p>
                        <p><strong>Medical Information:</strong> {{ $user->user_medical ?? 'N/A' }}</p>
                        <p><strong>Leave Information:</strong> {{ $user->user_leave ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Financial & Documents -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Financial & Documents</h6>
                        <p><strong>Bank Account:</strong> {{ $user->user_bank_account ?? 'N/A' }}</p>
                        <p><strong>Passport Number:</strong> {{ $user->user_passport ?? 'N/A' }}</p>
                        <p><strong>Passport Details:</strong> {{ $user->user_passport_details ?? 'N/A' }}</p>
                    </div>

                    <!-- Roles & Permissions -->
                    <div class="col-md-6">
                        <h6>Roles & Permissions</h6>
                        <p><strong>Role ID:</strong> {{ $user->role_role_id ?? 'N/A' }}</p>
                        <p><strong>Lead:</strong> {{ $user->user_lead ?? 'N/A' }}</p>
                        <p><strong>Referral:</strong> {{ $user->user_refferal ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>