<div class="tab-pane fade profile-edit pt-3" id="profile-edit">
    <!-- Profile Edit Form -->
    <div class="row mb-3">
        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
            Image</label>
        <div class="col-md-8 col-lg-9">
            <img src="{{ asset('/storage/' . $user->photo) }}" alt="{{ $user->name }}">
            <div class="pt-2">
                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" data-bs-toggle="modal"
                    data-bs-target="#uploadImageModal"><i class="bi bi-upload"></i></a>
                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" data-bs-toggle="modal"
                    data-bs-target="#removeImageModal"><i class="bi bi-trash"></i></a>
            </div>
        </div>
    </div>
    <hr class="hr">

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
            <div class="col-md-8 col-lg-9">
                <input name="name" type="text" class="form-control" id="fullName" value="{{ $user->name }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
            <div class="col-md-8 col-lg-9">
                <textarea name="tentang" class="form-control" id="about" style="height: 100px">{{ $user->tentang }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
            <div class="col-md-8 col-lg-9">
                <input name="pekerjaan" type="text" class="form-control" id="Job"
                    value="{{ $user->pekerjaan }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
            <div class="col-md-8 col-lg-9">
                <input name="negara" type="text" class="form-control" id="Country" value="{{ $user->negara }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
                <input name="alamat" type="text" class="form-control" id="Address" value="{{ $user->alamat }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
            <div class="col-md-8 col-lg-9">
                <input name="notelp" type="text" class="form-control" id="Phone" value="{{ $user->notelp }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
            <div class="col-md-8 col-lg-9">
                <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="facebook" type="text" class="form-control" id="Facebook"
                    value="{{ $user->facebook }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="instagram" type="text" class="form-control" id="Instagram"
                    value="{{ $user->instagram }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="linkedin" type="text" class="form-control" id="Linkedin"
                    value="{{ $user->linkedin }}">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form><!-- End Profile Edit Form -->
</div>

<!-- Modal for Uploading New Profile Image -->
<div class="modal fade" id="uploadImageModal" tabindex="-1" aria-labelledby="uploadImageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadImageModalLabel">Upload New Profile Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newProfileImage" class="form-label">Choose Image</label>
                        <input type="file" class="form-control" id="newProfileImage" name="photo" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Removing Profile Image -->
<div class="modal fade" id="removeImageModal" tabindex="-1" aria-labelledby="removeImageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profile.destroy.photo') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="removeImageModalLabel">Remove Profile Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove your profile image?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Remove</button>
                </div>
            </form>
        </div>
    </div>
</div>
