<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | Skote</title>
    @include('partials.head-css')
</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Get your free Skote account now.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <form method="POST" action="{{ url('/register') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="user_email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('user_email') is-invalid @enderror" 
                                               id="user_email" name="user_email" placeholder="Enter email" value="{{ old('user_email') }}">
                                        @error('user_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="user_name" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" 
                                               id="user_name" name="user_name" placeholder="Enter username" value="{{ old('user_name') }}">
                                        @error('user_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="user_password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('user_password') is-invalid @enderror" 
                                               id="user_password" name="user_password" placeholder="Enter password">
                                        @error('user_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> 

                                    <div class="mb-3">
                                        <label for="user_password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="user_password_confirmation" name="user_password_confirmation" placeholder="Re-enter password">
                                    </div>                            
                                    
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5 text-center">
                        <p>Already have an account? <a href="{{ url('/login') }}" class="fw-medium text-primary">Login</a></p>
                        <p>&copy; {{ date('Y') }} Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.vendor-scripts')
    <script src="{{ asset('assets/js/pages/validation.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
