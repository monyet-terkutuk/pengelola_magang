<x-auth-layout>
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Please Login</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" role="form text-left">
                        @csrf

                        <!-- Username (Email) -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                                required autofocus placeholder="Email" aria-label="Email"
                                aria-describedby="email-addon">
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required
                                autocomplete="current-password" placeholder="Password" aria-label="Password"
                                aria-describedby="password-addon">
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign In</button>
                        </div>
                    </form>

                    <!-- New Account Link -->
                    <p class="text-sm mt-3 mb-0 text-center">New to Modernize? <a href="{{ route('register') }}"
                            class="text-dark font-weight-bolder">Create an account</a></p>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>