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
                        <!-- Single Blog Area -->
                        <div class="col-md-4">
                            <div class="single-blog-area mb-80">
                                <div class="blog-thumbnail">
                                    <img src="{{ asset('user/img/blog-img/1.jpg') }}" alt="">
                                    <div class="post-date">
                                        <a href="#"><span>05</span>April <br> 2018</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <a href="#" class="post-title">Omelet witch cheese</a>
                                    <div class="meta-data">
                                        by <a href="#">Maria Williams</a> in <a href="#">Restaurants</a>
                                        <br>
                                        Category: <a href="#"><b>Dessert</b></a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet...</p>
                                    <a href="{{route('user.receipe-post')}}" class="btn delicious-btn mt-30">Read More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Blog Area -->
                        <div class="col-md-4">
                            <div class="single-blog-area mb-80">
                                <div class="blog-thumbnail">
                                    <img src="{{ asset('user/img/blog-img/2.jpg') }}" alt="">
                                    <div class="post-date">
                                        <a href="#"><span>05</span>April <br> 2018</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <a href="#" class="post-title">Onde - Onde</a>
                                    <div class="meta-data">
                                        by <a href="#">Maria Williams</a> in <a href="#">Restaurants</a>
                                        <br>
                                        Category: <a href="#"><b>Dessert</b></a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet...</p>
                                    <a href="{{route('user.receipe-post')}}" class="btn delicious-btn mt-30">Read More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Blog Area -->
                        <div class="col-md-4">
                            <div class="single-blog-area mb-80">
                                <div class="blog-thumbnail">
                                    <img src="{{ asset('user/img/blog-img/3.jpg') }}" alt="">
                                    <div class="post-date">
                                        <a href="#"><span>05</span>April <br> 2018</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <a href="#" class="post-title">Hamburger</a>
                                    <div class="meta-data">
                                        by <a href="#">Maria Williams</a> in <a href="#">Restaurants</a>
                                        <br>
                                        Category: <a href="#"><b>Dessert</b></a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet...</p>
                                    <a href="{{route('user.receipe-post')}}" class="btn delicious-btn mt-30">Read More</a>
                                </div>
                            </div>
                        </div>

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
