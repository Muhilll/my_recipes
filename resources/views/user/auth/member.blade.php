@extends('user.layout.app')

@section('title', 'My Recipes - Food Blog Template | Member')

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
                        <h3 class="delicious-btn" style="width: 100%">JOIN TO MEMBER</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        <form action="{{ route('user.join-member.proses') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-10">
                                    <input name="email" type="email" value="{{ $user->email }}"
                                        class="form-control w-100" placeholder="E-mail" readonly>
                                </div>

                                <div class="col-2 d-flex justify-content-end">
                                    <button class="btn delicious-btn d-flex justify-content-center align-items-center"
                                        style="height: 50px; width: 100%;">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                @if (session('error'))
                    <div class="col-12 mt-5">
                        <div class="single-widget">
                            <div class="quote-area d-flex justify-content-center align-items-center">
                                
                                <h4 class="text-center" style="color: red">
                                    {{ session('error') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session('success'))
                    <div class="col-12 mt-5">
                        <div class="single-widget">
                            <div class="quote-area d-flex justify-content-center align-items-center">
                                
                                <h4 class="text-center">
                                    The verification has been sent to your email. Please check your email.
                                </h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
