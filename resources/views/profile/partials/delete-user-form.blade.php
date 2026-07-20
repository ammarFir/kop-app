<h4 class="mb-3 text-danger">Delete Account</h4>
<p class="text-muted">
    Once your account is deleted, all of its resources and data will be permanently deleted.
    Before deleting your account, please download any data or information that you wish to retain.
</p>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
    Delete Account
</button>

<!-- Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="deleteAccountModalLabel">Confirm Delete Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your account?</p>
                    <p class="text-muted">Once your account is deleted, all of its resources and data will be
                        permanently deleted. Please enter your password to confirm.</p>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                            placeholder="Enter your password">
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </div>
            </form>
        </div>
    </div>
</div>
