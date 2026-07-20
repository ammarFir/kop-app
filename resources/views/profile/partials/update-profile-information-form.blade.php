<h4 class="mb-3">Profile Information</h4>
<p class="text-muted">Update your account's profile information.</p>

<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $user->name) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $user->email) }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if (Auth::user()->role == 'anggota')
        <hr>
        <h5 class="mt-3">Data Anggota</h5>

        <div class="mb-3">
            <label for="no_anggota" class="form-label">No Anggota</label>
            <input type="text" name="no_anggota" id="no_anggota" class="form-control" value="{{ $user->no_anggota }}"
                disabled readonly>
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ $user->nik }}"
                disabled readonly>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat"
                class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $user->alamat) }}">
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon"
                class="form-control @error('no_telepon') is-invalid @enderror"
                value="{{ old('no_telepon', $user->no_telepon) }}">
            @error('no_telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endif

    <button type="submit" class="btn btn-primary">Save</button>
</form>
