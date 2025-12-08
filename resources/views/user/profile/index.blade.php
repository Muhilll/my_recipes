@extends('user.layout.app')

@section('title', 'My Recipes - Food Blog Template | Profile')

@push('style')
    <style>
        select] {
            pointer-events: none;
            background-color: #e9ecef;
        }
    </style>
@endpush

@section('content')

    <div class="contact-area section-padding-0-80">
        <br><br>
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3 class="delicious-btn" style="width: 100%">PROFILE</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        @if (session('success'))
                            <div class="alert alert-success"
                                style="
                                    padding: 10px;
                                    border-radius: 5px;
                                    background: #d4edda;
                                    color: #155724;
                                    border: 1px solid #c3e6cb;
                                    margin-bottom: 20px;
                                ">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('user.profile.update') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-12 col-lg-8">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <input style="background-color: rgb(5, 196, 5); color: white; font-size: 20px" name="status" value="Status: {{$user->status}}" type="text" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Status" readonly>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6 mt-5">
                                    <input type="text" name="nama" value="{{ old('nama', $user->nama) }}"
                                        class="form-control form-input @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" required>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6 mt-5">
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="form-control form-input @error('email') is-invalid @enderror" placeholder="E-mail" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6 mt-5">
                                    <select name="jkl" class="@error('jkl') is-invalid @enderror" required>
                                        <option value=""> -- Pilih Jenis Kelamin -- </option>
                                        <option value="L" @if ($user->jkl == 'L') selected @endif>Laki-Laki
                                        </option>
                                        <option value="P" @if ($user->jkl == 'P')  @endif>Perempuan</option>
                                    </select>
                                    @error('jkl')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6 mt-5">
                                    <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                                        class="form-control form-input @error('no_hp') is-invalid @enderror" placeholder="Nomor handphone" required>
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-5">
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-5">
                                    <textarea name="alamat" class="form-control form-input @error('alamat   ') is-invalid @enderror" cols="30" rows="10" placeholder="Alamat" required>{{ old('alamat', $user->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 text-right mt-30">
                                    <button class="btn delicious-btn" type="submit" id="btnSave">Update</button>
                                    <a href="{{route('logout')}}" style="color: white" class="btn delicious-btn ml-3" type="submit" id="btnSave">Logout</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush
