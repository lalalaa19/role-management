<!doctype html>
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
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to Skote.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="user_name" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="user_name" placeholder="Enter username" name="user_name" value="{{ old('user_name') }}">
                                    </div>
                                    <?php if (isset($validation) && $validation->hasError('user_name')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('user_name'); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" name="user_password">
                                            <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->hasError('user_password')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('user_password'); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Don't have an account? <a href="{{ route('auth.register') }}" class="fw-medium text-primary">Signup now</a></p>
                        <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.vendor-scripts')
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
