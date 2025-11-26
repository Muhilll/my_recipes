@extends('user.layout.app')

@section('title', 'My Recipes - Food Blog Template | Profile')

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
                        <h3 class="delicious-btn" style="width: 100%">PROFILE</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" id="name" placeholder="Nama Lengkap">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <select name="jkl" id="">
                                        <option value=""> -- Pilih Jenis Kelamin -- </option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" id="no_hp" placeholder="Nomor handphone">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Alamat"></textarea>
                                </div>
                                
                                
                                <div class="col-12 text-center">
                                    <button class="btn delicious-btn mt-30" type="submit">Perbarui</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
