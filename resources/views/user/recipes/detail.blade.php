@extends('user.layout.app')

@section('title', 'My Recipes - Food Blog Template | Recipes')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay"
        style="background-image: url({{ asset('user/img/bg-img/breadcumb3.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Recipe</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="receipe-post-area section-padding-80">

        <!-- Receipe Post Search -->
        <div class="receipe-post-search mb-80">
            <div class="container">
                <form action="#" method="post">
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
                            <button type="submit" class="btn delicious-btn">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Receipe Slider -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="receipe-slider owl-carousel">
                        @foreach (json_decode($resep->gambar, true) as $gambar)
                            <img src="{{ asset('storage/' . $gambar) }}" alt=""
                                style="width:100%; height:450px; object-fit:cover; border-radius:10px;">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Receipe Content Area -->
        <div class="receipe-content-area">
            <div class="container">

                <br><br>
                <div class="row" style="width: 100%; justify-self: center">
                    <div class="single-preparation-step d-flex">
                        <p>{{ $resep->des }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <span>{{ $resep->created_at->format('F d, Y') }}</span>
                            <h2>{{ $resep->nama }}</h2>
                            <div class="receipe-duration">
                                <h6>Prep: {{ $resep->persiapan }} mins</h6>
                                <h6>Cook: {{ $resep->masak }} mins</h6>
                                <h6>Yields: {{ $resep->hasil }} Servings</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="receipe-ratings text-right my-5">
                            @if ($isFavorit)
                                <form action="{{ route('user.favorite.hapus') }}" method="POST">
                                    @csrf
                                    <input type="text" name="resep_id" value="{{ encrypt($resep->id) }}" hidden>
                                    <button type="submit" class="btn delicious-btn">Remove from Favorite</button>
                                </form>
                            @else
                                <form action="{{ route('user.favorite.tambah') }}" method="POST">
                                    @csrf
                                    <input type="text" name="resep_id" value="{{ encrypt($resep->id) }}" hidden>
                                    <button type="submit" class="btn delicious-btn">Add to Favorite</button>
                                </form>
                            @endif

                            @if (Auth::user()->status == 'guest')                                
                                <a type="submit" href="{{route('user.join-member')}}" style="color: white" class="btn delicious-btn mt-2">Join Member to Save PDF</a>
                            @else    
                                <form action="{{ route('user.recipes.to-pdf') }}" method="POST">
                                    @csrf
                                    <input type="text" name="resep_id" value="{{ encrypt($resep->id) }}" hidden>
                                    <button type="submit" class="btn delicious-btn mt-2">Save to PDF</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <!-- Single Preparation Step -->
                        @foreach (json_decode($resep->langkah, true) as $langkah)
                            <div class="single-preparation-step d-flex">
                                <h4>{{ sprintf('%02d', $loop->iteration) }}.</h4>
                                <p>{{ $langkah }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Ingredients -->
                    <div class="col-12 col-lg-4">
                        <div class="ingredients">
                            <h4>Ingredients</h4>

                            <!-- Custom Checkbox -->
                            @foreach (json_decode($resep->langkah, true) as $bahan)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">{{ $bahan }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-left">
                            <h3>Leave a comment</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="contact-form-area">
                            <form action="{{ route('user.komentar.tambah') }}" method="post">
                                @csrf
                                <input type="text" hidden name="resep_id" value="{{ $resep->id }}">
                                <div class="row">
                                    <div class="col-12 col-lg-8 d-flex align-items-center">
                                        <input type="text" class="form-control me-3" style="width: 100px;"
                                            placeholder="Rating">

                                        <div class="receipe-ratings text-left">
                                            <div class="ratings d-flex align-items-center mt-3 ml-3"
                                                style="font-size: 22px;">
                                                <i class="fa fa-star-o star" data-value="1"></i>
                                                <i class="fa fa-star-o star" data-value="2"></i>
                                                <i class="fa fa-star-o star" data-value="3"></i>
                                                <i class="fa fa-star-o star" data-value="4"></i>
                                                <i class="fa fa-star-o star" data-value="5"></i>
                                            </div>

                                            <input type="hidden" name="rating" id="ratingValue" value="0">
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <textarea name="ulasan" class="form-control" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn delicious-btn mt-30" type="submit">Post Comments</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-center">
                            <h3>Comment List</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($dataUlasan as $ulasan)
                        <div class="col-12 mb-4">
                            <div class="p-3 border rounded shadow-sm"
                                style="display: grid; grid-template-columns: 150px auto; gap: 20px; align-items: start;">

                                <div>
                                    <h5 class="mb-1">{{$ulasan->user->nama}}</h5>
                                    <div class="receipe-ratings text-left">
                                            <div class="ratings d-flex align-items-center mt-3"
                                                style="font-size: 22px;">
                                                @for ($i = 0; $i < $ulasan->rating; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                @for ($i = 0; $i < 5 - $ulasan->rating; $i++)
                                                    <i class="fa fa-star-o"></i>
                                                @endfor
                                            </div>
                                    </div>

                                    <p class="mt-2 mb-2"
                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{$ulasan->ulasan}}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/user/resep/detail.js') }}"></script>
@endpush
