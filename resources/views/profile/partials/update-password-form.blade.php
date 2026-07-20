<h4 class="mb-3">Update Password</h4>
<p class="text-muted">Ensure your account is using a long, random password to stay secure.</p>

<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="update_password_current_password" class="form-label">Current Password</label>
        <input type="password" name="current_password" id="update_password_current_password"
            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
            autocomplete="current-password">
        @error('current_password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="update_password_password" class="form-label">New Password</label>
        <input type="password" name="password" id="update_password_password"
            class="form-control @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
        @error('password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" id="update_password_password_confirmation"
            class="form-control" autocomplete="new-password">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

    @if (session('status') === 'password-updated')
        <div class="alert alert-success mt-3">Password updated successfully!</div>
    @endif
</form>
