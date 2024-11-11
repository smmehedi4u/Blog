<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- site metas -->
    <title>A World</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha384-xxxx" crossorigin="anonymous">
    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <div class="flex flex-col">
        <!-- Header Section -->
        <div class="header_section">
            <div class="header_main">
                <div class="mobile_menu">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="logo_mobile">
                            <a href="index.html"><img src="images/logo.png"></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="container-fluid d-flex align-items-center justify-content-between">
                    <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
                    <div class="menu_main">
                        <ul class="d-flex justify-content-center align-items-center">
                            <li><a style="z-index: 1; position: relative;" href="{{ route('home') }}">Home</a></li>
                            <li><a style="z-index: 1; position: relative;" href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li>
                                @if (Route::has('login'))
                                    <div class="p-6 text-right">
                                        @auth
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    {{ Auth::user()->name }}
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                                    <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">Logout</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Log in</a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="btn btn-outline-secondary ml-2">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- banner section start -->
            <div class="banner_section layout_padding">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <h1 class="banner_taital">Adventure</h1>
                                <p class="banner_text">There are many variations of passages of Lorem Ipsum available,
                                    but the majority have sufferedThere are ma available, but the majority have suffered
                                </p>
                                <div class="read_bt"><a href="#">Get A Quote</a></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <h1 class="banner_taital">Adventure</h1>
                                <p class="banner_text">There are many variations of passages of Lorem Ipsum available,
                                    but the majority have sufferedThere are ma available, but the majority have suffered
                                </p>
                                <div class="read_bt"><a href="#">Get A Quote</a></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <h1 class="banner_taital">Adventure</h1>
                                <p class="banner_text">There are many variations of passages of Lorem Ipsum available,
                                    but the majority have sufferedThere are ma available, but the majority have suffered
                                </p>
                                <div class="read_bt"><a href="#">Get A Quote</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner section end -->
        </div>

        <!-- Main Content -->
        <div class="container mt-4">
            @yield('content')
        </div>

        <!-- Footer Section -->
        <div class="footer_section layout_padding">
            <div class="container">
                <div class="input_btn_main">
                    <input type="text" class="mail_text" placeholder="Enter your email" name="Enter your email">
                    <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                </div>
                <div class="location_main">
                    <div class="call_text"><img src="{{ asset('images/call-icon.png') }}"></div>
                    <div class="call_text"><a href="#">Call +01 1234567890</a></div>
                    <div class="call_text"><img src="{{ asset('images/mail-icon.png') }}"></div>
                    <div class="call_text"><a href="#">demo@gmail.com</a></div>
                </div>
                <div class="social_icon">
                    <ul>
                        <li><a href="#"><img src="{{ asset('images/fb-icon.png') }}"></a></li>
                        <li><a href="#"><img src="{{ asset('images/twitter-icon.png') }}"></a></li>
                        <li><a href="#"><img src="{{ asset('images/linkedin-icon.png') }}"></a></li>
                        <li><a href="#"><img src="{{ asset('images/instagram-icon.png') }}"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- copyright section start -->
        <div class="copyright_section">
            <div class="container">
                <p class="copyright_text">2020 All Rights Reserved. Design by <a
                        href="{{ asset('https://html.design') }}">Free html Templates</a></p>
            </div>
        </div>


        <!-- Javascript Files -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha384-xxxx"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
