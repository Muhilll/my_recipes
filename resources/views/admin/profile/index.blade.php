@extends('layouts.app')

@section('title', 'Admin - Profile')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, Admin!</h2>
                <div class="row mt-sm-4">
                    <div class="col">
                        <div class="card">
                            <form method="post" action="{{ route('admin.profile.update') }}">
                                @csrf
                                <input type="text" name="user_id" value="{{ $profile->id }}" hidden>
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col">
                                            <label>Nama</label>
                                            <input name="nama" type="text"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', $profile->nama) }}" required readonly>

                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label>Email</label>
                                            <input name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', $profile->email) }}" required readonly>

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label>Password</label>
                                            <input name="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" readonly>

                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button type="button" id="btn-edit" class="btn btn-warning mr-2">
                                        Edit
                                    </button>
                                    <button type="submit" id="btn-save" class="btn btn-primary" disabled>
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <script>
        @if (session('success'))
            iziToast.success({
                title: 'Berhasil',
                message: "{{ session('success') }}",
                position: 'topRight'
            });
        @endif

        @if ($errors->any())
            iziToast.error({
                title: 'Validasi Error',
                message: "{{ $errors->first() }}",
                position: 'topRight'
            });
        @endif
    </script>

    <script>
        document.getElementById('btn-edit').addEventListener('click', function() {
            const inputs = document.querySelectorAll('input');

            inputs.forEach(input => {
                if (input.name !== 'user_id') {
                    input.removeAttribute('readonly');
                }
            });
            document.getElementById('btn-save').disabled = false;
            this.disabled = true;
            this.innerText = "Editing...";
        });
    </script>
@endpush
