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
                        <h2>Recipes</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-80">
        <div class="receipe-post-search mb-80">
            <div class="container">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <select name="select1" id="select1">
                                <option value="1">All Receipies Categories</option>
                                <option value="1">All Receipies Categories 2</option>
                                <option value="1">All Receipies Categories 3</option>
                                <option value="1">All Receipies Categories 4</option>
                                <option value="1">All Receipies Categories 5</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select name="select1" id="select2">
                                <option value="1">All Receipies Categories</option>
                                <option value="1">All Receipies Categories 2</option>
                                <option value="1">All Receipies Categories 3</option>
                                <option value="1">All Receipies Categories 4</option>
                                <option value="1">All Receipies Categories 5</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <input type="search" name="search" placeholder="Search Receipies">
                        </div>
                        <div class="col-12 col-lg-3 text-right">
                            <button type="button" class="btn delicious-btn">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="col">
                <div class="blog-posts-area">
                    <div class="row">
                        @foreach ($dataResep as $resep)
                            <div class="col-md-4">
                                <div class="single-blog-area mb-80">
                                    <div class="blog-thumbnail">
                                        <img src="{{ asset('storage/' . json_decode($resep->gambar, true)[0] ?? '') }}"
                                            alt=""
                                            style="width: 100%; height: 250px; object-fit: cover; border-radius: 5px;">
                                        <div class="post-date" style="width: auto">
                                            <a href="#">
                                                <span>{{ $resep->created_at->format('d') }}</span>
                                                {{ $resep->created_at->format('F') }} <br>
                                                {{ $resep->created_at->format('Y') }}
                                            </a>

                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="post-title">{{ $resep->nama }}</a>
                                        <div class="meta-data">
                                            {{-- by <a href="#">Maria Williams</a> in <a href="#">Restaurants</a> --}}
                                            <br>
                                            Category: <a href="#"><b>{{ $resep->kategori->nama }}</b></a>
                                        </div>
                                        <p>{{ \Illuminate\Support\Str::limit($resep->des, 100, '...') }}</p>
                                        <a href="{{ route('user.recipes.detail', encrypt($resep->id)) }}" class="btn delicious-btn">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Single Blog Area -->

                    </div>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                        <li class="page-item"><a class="page-link" href="#">02.</a></li>
                        <li class="page-item"><a class="page-link" href="#">03.</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection
