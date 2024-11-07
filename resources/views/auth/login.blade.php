<x-guest-layout>
    <div class="container mx-auto mt-8 flex justify-center">
        <div class="card bg-base-300 w-96 shadow-xl">
            <div class="card-body mx-auto">
                <h2 id="title" class="mx-auto">Login</h2>

                <!-- Google Login Button -->
                <a href="{{ url('auth/google') }}" class="btn btn-block btn-primary">Google</a>


                <div class="divider">OR</div>

                <!-- Email Input -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input input-bordered flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path
                                d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path
                                d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input id="email" type="email" name="email" class="grow" placeholder="Email" required
                            autofocus>
                    </div>

                    <!-- Password Input -->
                    <div class="input input-bordered flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input id="password" type="password" name="password" class="grow" placeholder="Password"
                            required>
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="flex items-center justify-between mb-4">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember" class="checkbox checkbox-md">
                            <span class="label-text-alt">Remember me</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="link">Forgot Password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                </form>

                <!-- Register Link -->
                <h3 class="text-center mt-4">Don't Have an Account? <a href="{{ route('register') }}"
                        class="link">Sign Up</a></h3>
            </div>
        </div>
    </div>
</x-guest-layout>
