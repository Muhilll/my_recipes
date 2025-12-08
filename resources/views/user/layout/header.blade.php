<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-between">
                <!-- Breaking News -->
                <div class="col-12 col-sm-6">
                    <div class="breaking-news">
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <li><a href="#">Hello World!</a></li>
                                <li><a href="#">Welcome to Colorlib Family.</a></li>
                                <li><a href="#">Hello Delicious!</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Top Social Info -->
                <div class="col-12 col-sm-6">
                    <div class="top-social-info text-right">
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="delicious-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="deliciousNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ route('user.index')}}"><img src="{{ asset('user/img/core-img/logo.png')}}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}"><a href="{{route('user.dashboard')}}">Home</a></li>
                                {{-- <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('user.about')}}">About Us</a></li>
                                        <li><a href="{{ route('user.index')}}">Home</a></li>
                                        <li><a href="{{ route('user.blog-post')}}">Blog Post</a></li>
                                        <li><a href="{{ route('user.receipe-post')}}">Receipe Post</a></li>
                                        <li><a href="{{ route('user.contact')}}">Contact</a></li>
                                        <li><a href="{{ route('user.elements')}}">Elements</a></li>
                                        <li><a href="#">Dropdown</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('user.index')}}">Home</a></li>
                                                <li><a href="{{ route('user.about')}}">About Us</a></li>
                                                <li><a href="{{ route('user.blog-post')}}">Blog Post</a></li>
                                                <li><a href="{{ route('user.receipe-post')}}">Receipe Post</a></li>
                                                <li><a href="{{ route('user.contact')}}">Contact</a></li>
                                                <li><a href="{{ route('user.elements')}}">Elements</a></li>
                                                <li><a href="#">Dropdown</a>
                                                    <ul class="dropdown">
                                                        <li><a href="{{ route('user.index')}}">Home</a></li>
                                                        <li><a href="{{ route('user.about')}}">About Us</a></li>
                                                        <li><a href="{{ route('user.blog-post')}}">Blog Post</a></li>
                                                        <li><a href="{{ route('user.receipe-post')}}">Receipe Post</a></li>
                                                        <li><a href="{{ route('user.contact')}}">Contact</a></li>
                                                        <li><a href="{{ route('user.elements')}}">Elements</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li class="{{ request()->routeIs('user.recipes') ? 'active' : '' }}"><a href="{{ route('user.recipes')}}">Receipies</a></li>
                                <li class="{{ request()->routeIs('user.favorite') ? 'active' : '' }}"><a href="{{ route('user.favorite')}}">My Favorite</a></li>
                                @if (Auth::check() and Auth::user()->role == 'user')
                                    <li class="{{ request()->routeIs('user.profile') ? 'active' : '' }}"><a href="{{route('user.profile')}}">Profile</a></li>
                                    @if (Auth::user()->status == 'guest')
                                        <li class="{{ request()->routeIs('user.join-member') ? 'active' : '' }}"><a href="{{route('user.join-member')}}">Join Member</a></li>
                                    @endif
                                @else
                                    <li class="{{ request()->routeIs('user.auth.login') ? 'active' : '' }}"><a href="{{ route('user.auth.login')}}">Login</a></li>
                                    <li class="{{ request()->routeIs('user.auth.register') ? 'active' : '' }}"><a href="{{ route('user.auth.register')}}">Register</a></li>
                                @endif
                            </ul>

                            <!-- Newsletter Form -->
                            <div class="search-btn">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->