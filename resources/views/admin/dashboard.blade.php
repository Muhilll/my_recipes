@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admin</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumAdmin }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumUser }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Member</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumMember }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Resep</h4>
                            </div>
                            <div class="card-body">
                                {{ $jumResep }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Resep Terbaru</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table-striped mb-0 table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Des</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resepTerbaru as $resep)
                                    <tr>
                                        <td>
                                            {{ $resep->nama }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . json_decode($resep->gambar, true)[0] ?? '') }}"
                                                alt="avatar" width="30" class="rounded-circle mr-1">
                                        </td>
                                        <td>
                                            {{ Str::limit($resep->des, 50) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Member Terbaru</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach ($memberTerbaru as $member)
                            <li class="media">
                                <img class="rounded-circle mr-3" width="50" src="{{ asset('img/avatar/avatar-1.png') }}"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="text-primary float-right">{{ $member->updated_at}}</div>
                                    <div class="media-title">{{$member->nama}}</div>
                                    <span class="text-small text-muted">Bergabung pada: {{ $member->updated_at }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="pt-1 pb-1 text-center">
                        <a href="{{route('admin.pengguna.member')}}" class="btn btn-primary btn-lg btn-round">
                            View All
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
