<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jewelery</title>
    <link rel="icon" href="{{asset('diamond.png')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<header class="main_menu home_menu">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-11">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('frontend.index')}}"> <img src="{{asset('img/logo.png')}}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend.index')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('shop')}}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user-login')}}">Login/Register</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <div>
                            <a href="{{ route('cart.show') }}">
                                <i class="fas fa-shopping-cart">Cart({{session()->has('cart') ? session()->get('cart')->totalQty : '0' }})</i>
                            </a>
                        </div>
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
@yield('content')
<!--::footer_part start::-->
<footer class="footer_part">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Category</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Male</a></li>
                        <li><a href="#">Female</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Fashion</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Company</h4>
                    <ul class="list-unstyled">
                        <li><a href="">About</a></li>
                        <li><a href="">News</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Address</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">200, Green block, NewYork</a></li>
                        <li><a href="#">+10 456 267 1678</a></li>
                        <li><span>contact89@winter.com</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="single_footer_part">
                    <h4>Newsletter</h4>
                    <div id="mc_embed_signup">
                        <form target="_blank"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="subscribe_form relative mail_part">
                            <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                   class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = ' Email Address '">
                            <button type="submit" name="submit" id="newsletter-submit"
                                    class="email_icon newsletter-submit button-contactForm">subscribe</button>
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                    <div class="social_icon">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="copyright_text">
                    <P>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="ti-heart" aria-hidden="true"></i> by Deltatech</P>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->

<script src="{{asset('js/jquery-1.12.1.min.js')}}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('js/swiper.min.js')}}"></script>
<script src="{{asset('js/mixitup.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>

</html>