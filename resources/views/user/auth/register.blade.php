@extends('user.layout.app')

@section('title', 'My Recipes - Food Blog Template | Login')

@push('style')

@endpush


@section('content')

    <!-- ##### Contact Form Area Start ##### -->
    <div class="contact-area section-padding-0-80">
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3 class="delicious-btn" style="width: 100%">REGISTER</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        <form action="{{ route('user.auth.register.proses') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-12 col-lg-6">
                                    <input type="text" name="nama" value="{{ old('nama') }}"
                                        class="form-control form-input @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" required>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input type="email" name="email" value="{{ old('email') }}"
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
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    @error('jkl')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-6 mt-5">
                                    <input type="text" name="no_hp" value="{{ old('no_hp') }}"
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
                                    <textarea name="alamat" class="form-control form-input @error('alamat   ') is-invalid @enderror" cols="30" rows="10" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 text-center mt-30">
                                    <button class="btn delicious-btn" type="submit" id="btnSave">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
