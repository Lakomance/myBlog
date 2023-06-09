<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oleez :: Blog Grid</title>
    <link rel="stylesheet" href="{{ asset("assets/vendors/animate.css/animate.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/summernote/summernote-bs4.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/select2/css/select2.min.css") }}">
    <script src="{{ asset("assets/vendors/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/js/loader.js") }}"></script>
</head>

<body>
    <header class="oleez-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img src="{{ asset("assets/images/Logo_2.svg") }}" alt="Oleez"></a>

        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav" aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="oleezMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                    <div class="dropdown-menu" aria-labelledby="blogDropdown">
                        <a class="dropdown-item" href="#">Blog Standard</a>
                        <a class="dropdown-item" href="#">Blog grid</a>
                        <a class="dropdown-item" href="#">Blog Post</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav d-none d-lg-flex">
                @auth()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth("web")->user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">Профиль</a>
                            <a class="dropdown-item" href="{{ route('post.create') }}">Написать пост</a>
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
{{--                                <a class="dropdown-item" href="">Выйти</a>--}}
                                <button class="dropdown-item" type="submit">Выйти</button>
                            </form>
                        </div>
                    </li>
                @endauth

                <li class="nav-item active">
                    <a class="nav-link nav-link-btn" href="#" data-toggle="searchModal">
                        <img src="{{ asset("assets/images/search.svg") }}" alt="search">
                    </a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link pr-0 nav-link-btn" href="#" data-toggle="offCanvasMenu">
                        <img src="{{ asset("assets/images/social icon@2x.svg") }}" alt="social-nav-toggle">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
    @yield('main')
    <footer class="oleez-footer wow fadeInUp">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/images/Logo_1.svg') }}" alt="oleez" class="footer-logo">
                        <p class="footer-intro-text">Don't be shy, get in touch with us and create the world again!</p>
                        <nav class="footer-social-links">
                            <a href="#">Fb</a>
                            <a href="#">Tw</a>
                            <a href="#">In</a>
                            <a href="#">Be</a>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">PHONE</h6>
                                <p class="widget-content">+80 (0)5 12 34 95 89</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">ENQUIRUES</h6>
                                <p class="widget-content">info@oleez.site</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">ADDRESS</h6>
                                <p class="widget-content">33 rue Burdeau 69089 <br> Paris France</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">WORK HOURS</h6>
                                <p class="widget-content">Weekdays: 09:00 - 18:00 <br> Weekends: 11:00 - 17:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-text">
                <p class="mb-md-0">©  2020, oleez Theme. Made with passion by <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer" class="text-reset">BootstrapDash</a>.</p>
                <p class="mb-0">All right reserved.</p>
            </div>
        </div>
    </footer>
    <nav id="offCanvasMenu" class="off-canvas-menu">
        <button type="button" class="close" aria-label="Close" data-dismiss="offCanvasMenu">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="oleez-social-menu">
            <li>
                <a href="#" class="oleez-social-menu-link">Facebook</a>
            </li>
            <li>
                <a href="#" class="oleez-social-menu-link">Instagram</a>
            </li>
            <li>
                <a href="#" class="oleez-social-menu-link">Behance</a>
            </li>
            <li>
                <a href="#" class="oleez-social-menu-link">Dribbble</a>
            </li>
            <li>
                <a href="#" class="oleez-social-menu-link">Email</a>
            </li>
        </ul>
    </nav>
    <!-- Full screen search box -->
    <div id="searchModal" class="search-modal">
        <button type="button" class="close" aria-label="Close" data-dismiss="searchModal">
            <span aria-hidden="true">&times;</span>
        </button>
        <form action="#" method="get" class="oleez-overlay-search-form">
            <label for="search" class="sr-only">Search</label>
            <input type="search" class="oleez-overlay-search-input" id="search" name="search" placeholder="Search here">
        </form>
    </div>
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wowjs/wow.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick-carousel/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.min.js') }}"></script>
    <script>
        new WOW().init();
        $('#summernote').summernote({ height: 300, placeholder: 'Что у вас нового?' });
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
            });
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
            });
        });
    </script>
</body>
</html>
