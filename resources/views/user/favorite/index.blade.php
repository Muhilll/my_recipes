@extends('user.layout.app')

@section('title', 'My Recipes - Food Blog Template | Blog Post')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay"
        style="background-image: url({{ asset('user/img/bg-img/breadcumb2.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>My Favorite Recipes</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-80">
        <div class="container">
            <div class="col">
                <div class="blog-posts-area">
                    <div class="row">

                        @if (Auth::check())
                            @foreach ($dataFavorit as $favorit)
                                <!-- Single Blog Horizontal -->
                                <div class="col-12 mb-4">
                                    <div class="p-3 border rounded shadow-sm"
                                        style="display: grid; grid-template-columns: 150px auto; gap: 20px; align-items: start;">

                                        <!-- Gambar -->
                                        <div>
                                            <img src="{{ asset('storage/' . json_decode($favorit->resep->gambar, true)[0] ?? '') }}"
                                                alt=""
                                                style="width: 150px; height: 180px; object-fit: cover; border-radius: 8px;">
                                        </div>

                                        <!-- Konten -->
                                        <div>
                                            <h5 class="mb-1">{{ $favorit->resep->nama }}</h5>
                                            <small>Category: <a
                                                    href="#">{{ $favorit->resep->kategori->nama }}</a></small>

                                            <p class="mt-2 mb-2"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $favorit->resep->des }}
                                            </p>

                                            <a href="{{ route('user.recipes.detail', encrypt($favorit->resep->id)) }}"
                                                class="btn delicious-btn btn-sm">
                                                Read More
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach


                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                </ul>
                            </nav>
                        @else
                            <div class="col-12 mt-5">
                                <div class="single-widget">
                                    <div class="quote-area d-flex justify-content-center align-items-center">

                                        <h4 class="text-center">
                                            Login To See This Content!
                                            <br>
                                            <a href="{{ route('user.auth.login') }}">Login</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection
