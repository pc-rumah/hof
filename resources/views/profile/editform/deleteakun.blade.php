<div class="tab-pane fade pt-3" id="hapus-akun">
    <!-- Change Password Form -->
    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')
        <h2 class="card-title">
            Are you sure you want to delete your account?
        </h2>

        <p class="small fst-italic">
            Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your
            password to confirm you would like to permanently delete your account.
        </p>

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <label for="password" class="col-md-4 col-lg-3 col-form-label">
                        Password
                    </label>

                    <div class="col-md">
                        <input name="password" type="password" class="form-control" id="password"
                            placeholder="password">
                    </div>
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

                    <!-- Update tombol agar menggunakan type="submit" -->
                    <button type="submit" class="btn btn-outline-danger mt-2">Delete Account</button>
                </div>
            </div>
        </div>
    </form><!-- End Change Password Form -->
</div>
