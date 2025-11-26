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

                        <!-- Single Blog Horizontal -->
                        <div class="col-12 mb-4">
                            <div class="d-flex align-items-start p-3 border rounded shadow-sm">

                                <!-- Gambar -->
                                <div class="me-3">
                                    <img src="{{ asset('user/img/blog-img/1.jpg') }}" alt=""
                                        style="width: 150px; height: 160px; object-fit: cover; border-radius: 8px; margin-right: 20px">
                                </div>

                                <!-- Konten -->
                                <div>
                                    <h5 class="mb-1">Nama / Judul Post</h5>
                                    <small class="text-muted">by Maria Williams</small>
                                    <br>
                                    <small>Category: <a href="#">Dessert</a></small>

                                    <p class="mt-2 mb-2">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui.
                                    </p>

                                    <a href="{{route('user.receipe-post')}}" class="btn delicious-btn btn-sm">Read More</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="d-flex align-items-start p-3 border rounded shadow-sm">

                                <!-- Gambar -->
                                <div class="me-3">
                                    <img src="{{ asset('user/img/blog-img/1.jpg') }}" alt=""
                                        style="width: 150px; height: 160px; object-fit: cover; border-radius: 8px; margin-right: 20px">
                                </div>

                                <!-- Konten -->
                                <div>
                                    <h5 class="mb-1">Nama / Judul Post</h5>
                                    <small class="text-muted">by Maria Williams</small>
                                    <br>
                                    <small>Category: <a href="#">Dessert</a></small>
                                    <p class="mt-2 mb-2">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui.
                                    </p>

                                    <a href="{{route('user.receipe-post')}}" class="btn delicious-btn btn-sm">Read More</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="d-flex align-items-start p-3 border rounded shadow-sm">

                                <!-- Gambar -->
                                <div class="me-3">
                                    <img src="{{ asset('user/img/blog-img/1.jpg') }}" alt=""
                                        style="width: 150px; height: 160px; object-fit: cover; border-radius: 8px; margin-right: 20px">
                                </div>

                                <!-- Konten -->
                                <div>
                                    <h5 class="mb-1">Nama / Judul Post</h5>
                                    <small class="text-muted">by Maria Williams</small>
                                    <br>
                                    <small>Category: <a href="#">Dessert</a></small>
                                    <p class="mt-2 mb-2">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui.
                                    </p>

                                    <a href="{{route('user.receipe-post')}}" class="btn delicious-btn btn-sm">Read More</a>
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
