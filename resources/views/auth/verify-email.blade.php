<x-guest-layout>
    <div class="flex justify-center mt-12">
        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body">

                <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on
                    the link we just emailed to you? If you didn\'t receive the email, we will gladly send you
                    another.</p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during
                                                                                            registration.') }}
                    </div>
                @endif

                <div class="card-actions justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button class="btn btn-secondary">Resend Verification Email</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-secondary">Log Out</button>
                    </form>
                </div>



            </div>
        </div>
    </div>
</x-guest-layout>
