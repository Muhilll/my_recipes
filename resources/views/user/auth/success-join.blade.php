@extends('user.layout.app')

@section('title', 'My Recipes - Food Blog Template | Success Join Member')

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
                        <h3 class="delicious-btn" style="width: 100%">VERIVICATION SUCCESSFULY</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-12 mt-5">
                        <div class="single-widget">
                            <div class="quote-area d-flex justify-content-center align-items-center">
                                
                                <h4 class="text-center">
                                    The Email Verification to join Member is Successfuly.
                                    <br>
                                    <a href="{{route('user.dashboard')}}">Back to home</a>
                                </h4>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
