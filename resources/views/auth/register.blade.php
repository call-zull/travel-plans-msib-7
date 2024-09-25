<x-app-layout>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0
        min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="../index.html"><img src="../assets/images/brand/logo/logo-primary.svg" class="mb-2"
                                    alt=""></a>
                            <p class="mb-6">Please enter your user information.</p>

                        </div>
                        <!-- Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    placeholder="User Name" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email address here" value="{{ old('email') }}" required
                                    autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="**************" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm
                                    Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="**************" required
                                    autocomplete="new-password">
                            </div>
                            <!-- Checkbox -->
                            <div class="mb-3">
                                <div class="form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="agreeCheck">
                                    <label class="form-check-label" for="agreeCheck"><span class="fs-5">I agree to the
                                            <a href="#">Terms of
                                                Service </a>and
                                            <a href="#">Privacy Policy.</a></span></label>
                                </div>
                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Create Free Account
                                    </button>
                                </div>

                                <div class="d-md-flex justify-content-between mt-4">
                                    <div class="mb-2 mb-md-0">
                                        <a href="{{ route('login') }}" class="fs-5">Already
                                            member? Login </a>
                                    </div>
                                    <div>

                                        @if (Route::has('password.request'))
                                            <a class="text-inherit" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
