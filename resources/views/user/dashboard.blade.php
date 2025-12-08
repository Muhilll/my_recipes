@extends('user.layout.app')

@section('title', 'My Recipes - Food Blog Template | Home')

@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            @foreach ($dataResepSatu as $resep)                
                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url({{ asset('storage/' . json_decode($resep->gambar, true)[0] ?? '') }});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                    <h2 data-animation="fadeInUp" data-delay="300ms">{{$resep->nama}}</h2>
                                    <p data-animation="fadeInUp" data-delay="700ms">{{$resep->des}}</p>
                                    <a href="{{ route('user.recipes.detail', encrypt($resep->id)) }}" class="btn delicious-btn" data-animation="fadeInUp"
                                        data-delay="1000ms">See Receipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <section class="top-catagory-area section-padding-80-0">
        <div class="container">
            <div class="row">
                @foreach ($dataResepDua as $resep)                    
                    <!-- Top Catagory Area -->
                    <div class="col-12 col-lg-6">
                        <div class="single-top-catagory">
                            <img src="{{ asset('storage/' . json_decode($resep->gambar, true)[0] ?? '') }}" alt=""
                            style="width: 100%; height: 250px; object-fit: cover; border-radius: 5px;">
                            <!-- Content -->
                            <div class="top-cta-content">
                                <h3>{{$resep->nama}}</h3>
                                <h6>{{$resep->kategori->nama}}</h6>
                                <a href="{{ route('user.recipes.detail', encrypt($resep->id)) }}" class="btn delicious-btn">See Full Receipe</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>The best Receipies</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($dataResepTiga as $resep)
                    <!-- Single Best Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            <img src="{{ asset('storage/' . json_decode($resep->gambar, true)[0] ?? '') }}" alt=""
                                style="width: 100%; height: 300px; object-fit: cover; border-radius: 5px;">
                            <div class="receipe-content">
                                <a href="{{ route('user.recipes.detail', encrypt($resep->id)) }}">
                                    <h5 class="text-center">{{ $resep->nama }}</h5>
                                </a>
                                <div class="ratings">
                                    <div class="ratings d-flex align-items-center mt-3">
                                        @for ($i = 0; $i < $resep->ulasan_avg_rating; $i++)
                                            <i class="fa fa-star" style="font-size: 20px;"></i>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $resep->ulasan_avg_rating; $i++)
                                            <i class="fa fa-star-o" style="font-size: 20px;"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url({{ asset('user/img/bg-img/bg4.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content text-center">
                        <h2>Gluten Free Receipies</h2>
                        <p>Fusce nec ante vitae lacus aliquet vulputate. Donec scelerisque accumsan molestie. Vestibulum
                            ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed accumsan
                            neque. Ut vulputate, lectus vel aliquam congue, risus leo elementum nibh</p>
                        <a href="{{route('user.recipes')}}" class="btn delicious-btn">Discover all the receipies</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Small Receipe Area Start ##### -->
    <section class="small-receipe-area section-padding-80-0">
        <div class="container">
            <div class="row">

                @foreach ($dataResepEmpat as $resep)                    
                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="{{ asset('storage/' . json_decode($resep->gambar, true)[0] ?? '') }}" alt=""
                                style="width: 100%; height: 80px; object-fit: cover; border-radius: 5px;">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>{{$resep->created_at}}</span>
                                <a href="{{ route('user.recipes.detail', encrypt($resep->id)) }}">
                                    <h5>{{$resep->nama}}</h5>
                                </a>
                                <div class="ratings">
                                    <div class="ratings d-flex align-items-center mt-3">
                                        @for ($i = 0; $i < $resep->ulasan_avg_rating; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $resep->ulasan_avg_rating; $i++)
                                            <i class="fa fa-star-o"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p>{{$resep->ulasan_count}} Comments</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Small Receipe Area End ##### -->
@endsection
