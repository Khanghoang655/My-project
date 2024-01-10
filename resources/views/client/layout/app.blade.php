<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.animatedheadline.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/heandline.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/countdown.min.js') }}"></script>
    <script src="{{ asset('js/odometer.min.js') }}"></script>
    <script src="{{ asset('js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('js/nice-select.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="logo">
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="{{ route('home') }}" class="active">Home</a>
                    <ul class="submenu">
                        <li>
                            <a href="index-2.html" class="active"> <i class="fal fa-long-arrow-alt-right"></i>
                                Home Demo 01</a>
                        </li>
                        <li>
                            <a href="index-3.html"> <i class="fal fa-long-arrow-alt-right"></i>
                                Home Demo 02</a>
                        </li>
                        <li>
                            <a href="index-4.html"> <i class="fal fa-long-arrow-alt-right"></i>
                                Home Demo 03</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">movies</a>
                    <ul class="submenu">
                        <li>
                            <a href="movie-grid.html"><i class="fal fa-long-arrow-alt-right"></i>Movie
                                Grid</a>
                        </li>
                        <li>
                            <a href="movie-list.html"><i class="fal fa-long-arrow-alt-right"></i>Movie
                                List</a>
                        </li>
                        <li>
                            <a href="movie-details.html"><i class="fal fa-long-arrow-alt-right"></i>Movie
                                Details</a>
                        </li>
                        <li>
                            <a href="movie-details-2.html"><i class="fal fa-long-arrow-alt-right"></i>Movie
                                Details 02</a>
                        </li>
                        <li>
                            <a href="movie-ticket-plan.html"><i class="fal fa-long-arrow-alt-right"></i>Movie
                                Ticket Plan</a>
                        </li>
                        <li>
                            <a href="movie-seat-plan.html"><i class="fal fa-long-arrow-alt-right"></i>Movie
                                Seat Plan</a>
                        </li>
                        <li>
                            <a href="movie-checkout.html"><i class="fal fa-long-arrow-alt-right"></i>Movie
                                Checkout</a>
                        </li>
                        <li>
                            <a href="movie-food.html"><i class="fal fa-long-arrow-alt-right"></i>Movie
                                Food</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">events</a>
                    <ul class="submenu">
                        <li>
                            <a href="events.html"><i class="fal fa-long-arrow-alt-right"></i>Events</a>
                        </li>
                        <li>
                            <a href="event-details.html"><i class="fal fa-long-arrow-alt-right"></i>Event
                                Details</a>
                        </li>
                        <li>
                            <a href="event-speaker.html"><i class="fal fa-long-arrow-alt-right"></i>Event
                                Speaker</a>
                        </li>
                        <li>
                            <a href="event-ticket.html"><i class="fal fa-long-arrow-alt-right"></i>Event
                                Ticket</a>
                        </li>
                        <li>
                            <a href="event-checkout.html"><i class="fal fa-long-arrow-alt-right"></i>Event
                                Checkout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">sports</a>
                    <ul class="submenu">
                        <li>
                            <a href="sports.html"><i class="fal fa-long-arrow-alt-right"></i>Sports</a>
                        </li>
                        <li>
                            <a href="sport-details.html"><i class="fal fa-long-arrow-alt-right"></i>Sport
                                Details</a>
                        </li>
                        <li>
                            <a href="sports-ticket.html"><i class="fal fa-long-arrow-alt-right"></i>Sport
                                Ticket</a>
                        </li>
                        <li>
                            <a href="sports-checkout.html"><i class="fal fa-long-arrow-alt-right"></i>Sport
                                Checkout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">pages</a>
                    <ul class="submenu">
                        <li>
                            <a href="about.html"><i class="fal fa-long-arrow-alt-right"></i>About
                                Us</a>
                        </li>
                        <li>
                            <a href="apps-download.html"><i class="fal fa-long-arrow-alt-right"></i>Apps
                                Download</a>
                        </li>
                        <li>
                            <a href="team.html"><i class="fal fa-long-arrow-alt-right"></i>Team</a>
                        </li>
                        <li>
                            <a href="pricing.html"><i class="fal fa-long-arrow-alt-right"></i>Pricing</a>
                        </li>
                        <li>
                            <a href="login.html"><i class="fal fa-long-arrow-alt-right"></i>Login</a>
                        </li>
                        <li>
                            <a href="register.html"><i class="fal fa-long-arrow-alt-right"></i>Register</a>
                        </li>
                        <li>
                            <a href="forgot-password.html"><i class="fal fa-long-arrow-alt-right"></i>Forgot
                                Password</a>
                        </li>
                        <li>
                            <a href="faq.html"><i class="fal fa-long-arrow-alt-right"></i>Faq</a>
                        </li>
                        <li>
                            <a href="term-condition.html"><i class="fal fa-long-arrow-alt-right"></i>Terms
                                & Conditions</a>
                        </li>
                        <li>
                            <a href="privacy-policy.html"><i class="fal fa-long-arrow-alt-right"></i>Privacy
                                Policy</a>
                        </li>
                        <li>
                            <a href="404.html"><i class="fal fa-long-arrow-alt-right"></i>404</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">blog</a>
                    <ul class="submenu">
                        <li>
                            <a href="blog.html"><i class="fal fa-long-arrow-alt-right"></i>Blog</a>
                        </li>
                        <li>
                            <a href="blog-2.html"><i class="fal fa-long-arrow-alt-right"></i>Blog
                                02</a>
                        </li>
                        <li>
                            <a href="blog-details.html"><i class="fal fa-long-arrow-alt-right"></i>Blog
                                Single</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">contact</a>
                </li>

                <li class="header-button pr-0">
                    @auth
                        @if (auth()->user() &&
                                auth()->user()->isAdmin())
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('dashboard') }}">User Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}">Join Us</a>
                    @endauth
                </li>


            </ul>
            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>

<body class="font-sans antialiased">
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>


    <div class="overlay"></div>
    <a href="#" class="scrollToTop">
        <i class="fal fa-long-arrow-alt-up"></i>
    </a>
    {{-- @include('layouts.navigation') --}}

    <!-- Page Heading -->


    <!-- Page Content -->
    <main>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>

    @yield('js-custom')
    @include('client.layout.footer')
</body>

</html>
