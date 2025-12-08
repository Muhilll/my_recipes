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
                        <h3 class="delicious-btn" style="width: 100%">WELCOME</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        <form action="{{route('user.auth.login.proses')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="col-12 text-center" style="margin-top: 100px">
                                    <button class="btn delicious-btn mt-30" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
