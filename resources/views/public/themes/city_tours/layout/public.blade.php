<!DOCTYPE html>

<html lang="en" dir="{{in_array(App::getLocale(),config('base.rtl_locales')) ? 'rtl' : 'ltr'}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title>CITY TOURS - City tours and travel site template by Ansonika</title>
    <meta name="_token" content="{{csrf_token()}}"/>
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset("front-end-assets/img/favicon.ico")}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset("front-end-assets/img/apple-touch-icon-57x57-precomposed.png")}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset("front-end-assets/img/apple-touch-icon-72x72-precomposed.png")}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset("front-end-assets/img/apple-touch-icon-114x114-precomposed.png")}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset("front-end-assets/img/apple-touch-icon-144x144-precomposed.png")}}">

    @yield('vendor-css')

    <link href="{{asset("front-end-assets/fonts.google.com/css.css")}}" rel="stylesheet">

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <link href="{{asset("front-end-assets/css/bootstrap-rtl.min.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/style.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/style-rtl.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/vendors.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/custom.css")}}" rel="stylesheet">
    @else
    <!-- GOOGLE WEB FONT -->
        <!-- COMMON CSS -->
        <link href="{{asset("front-end-assets/css/bootstrap.min.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/style.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/vendors.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/custom.css")}}" rel="stylesheet">
    @endif



<!-- ALTERNATIVE COLORS CSS -->
    <link href="#" id="colors" rel="stylesheet">

    <!-- CUSTOM CSS -->


    @yield('header')


</head>

<body class="{{in_array(App::getLocale(),config('base.rtl_locales')) ? 'rtl' : ''}}">

<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Header================================================== -->
<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-6"><i class="icon-phone"></i><strong>0045 043204434</strong></div>
                <div class="col-6">
                    <ul id="top_links">
                        <li><a href="#sign-in-dialog" id="access_link">{{__("theme.sign in")}}</a></li>
                        <li><a href="{{route("home.customer.history")}}" id="wishlist_link">{{__("theme.wishlist")}}</a></li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->

    <div class="container">
        <div class="row">
            <div class="col-3">
                <div id="logo_home">
                    <h1><a href="#" title="City tours travel template">City Tours travel template</a>
                    </h1>
                </div>
            </div>
            <nav class="col-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{asset("front-end-assets/img/logo_sticky.png")}}" width="160" height="34" alt="City tours"
                             data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i
                            class="icon_set_1_icon-77"></i></a>
                    <ul>
                        <li class="submenu">
                            <a href="{{route("home.index")}}">
                                {{__("theme.home")}}
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="{{route("home.room.all")}}">
                                {{__("theme.rooms")}}
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="{{route("home.gallery.all")}}">
                                {{__("theme.galleries")}}
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="{{route("home.news.all")}}">
                                {{__("theme.newses")}}
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="{{route("home.contact")}}">
                                {{__("theme.contact us")}}
                            </a>
                        </li>

                    </ul>
                </div><!-- End main-menu -->
                <ul id="top_tools">
                    <li>
                        <a href="javascript:void(0);" class="search-overlay-menu-btn"><i
                                class="icon_search"></i></a>
                    </li>
                    <li>
                        <div class="dropdown dropdown-cart">
                            <a href="#" data-toggle="dropdown" class="cart_bt"><i
                                    class="icon_bag_alt"></i><strong>3</strong></a>
                            <ul class="dropdown-menu" id="cart_items">
                                <li>
                                    <div class="image"><img src="{{asset("front-end-assets/img/thumb_cart_1.jpg")}}" alt="image"></div>
                                    <strong><a href="#">Louvre museum</a>1x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div class="image"><img src="{{asset("front-end-assets/img/thumb_cart_2.jpg")}}" alt="image"></div>
                                    <strong><a href="#">Versailles tour</a>2x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div class="image"><img src="{{asset("front-end-assets/img/thumb_cart_3.jpg")}}" alt="image"></div>
                                    <strong><a href="#">Versailles tour</a>1x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div>Total: <span>$120.00</span></div>
                                    <a href="{{route("home.cart")}}" class="button_drop">{{__('theme.go to cart')}}</a>
                                    <a href="{{route("home.checkout")}}" class="button_drop outline">{{__('theme.payout')}}</a>
                                </li>
                            </ul>
                        </div><!-- End dropdown-cart-->
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->

@yield("main")


<!-- End main -->

<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>{{__('theme.need help')}}</h3>
                <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                <a href="mailto:help@citytours.com" id="email_footer">help@citytours.com</a>
            </div>
            <div class="col-md-3">
                <h3>{{__('theme.about')}}</h3>
                <ul>
                    <li><a href="{{route("home.about")}}">{{__('theme.about us')}}</a></li>
                    <li><a href="{{route("home.faq")}}">{{__('theme.faq')}}</a></li>
                    <li><a href="{{route('home.customer.history')}}">{{__('theme.admin panel')}}</a></li>
                    <li><a href="{{route('home.customer.login')}}">{{__('theme.login')}}</a></li>
                    <li><a href="{{route('home.customer.register')}}">{{__('theme.register')}}</a></li>
                    <li><a href="#">{{__('theme.terms and condition')}}</a></li>
                    <li><a href="{{route('home.complaint')}}">{{__('theme.send complaint')}}</a></li>
                    <li><a href="{{route('home.faq')}}">{{__('theme.faq')}}</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>
                    {{__("theme.discover")}}
                </h3>
                <ul>
                    <li><a href="#">{{__('theme.community blog')}}</a></li>
                    <li><a href="#">{{__('theme.tour guide')}}</a></li>
                    <li><a href="#">{{__('theme.wishlist')}}</a></li>
                    <li><a href="#">{{__('theme.gallery')}}</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h3>
                    {{__("theme.settings")}}
                </h3>
                <div class="styled-select">
                    <select name="lang" id="lang">
                        <option value="English" selected>{{__('theme.english')}}</option>
                        <option value="French">{{__('theme.french')}}</option>
                        <option value="Spanish">{{__('theme.spanish')}}</option>
                        <option value="Russian">{{__('theme.russian')}}</option>
                    </select>
                </div>
                <div class="styled-select">
                    <select name="currency" id="currency">
                        <option value="USD" selected>{{__('theme.USD')}}</option>
                        <option value="EUR">{{__('theme.EUR')}}</option>
                        <option value="GBP">{{__('theme.GBP')}}</option>
                        <option value="RUB">{{__('theme.RUB')}}</option>
                    </select>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-google"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                        <li><a href="#"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#"><i class="icon-vimeo"></i></a></li>
                        <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>© Citytours 2018</p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

<!-- Search Menu -->
<div class="search-overlay-menu">
    <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
    <form role="search" id="searchform" method="get">
        <input value="" name="q" type="search" placeholder="{{__('theme.search...')}}"/>
        <button type="submit"><i class="icon_set_1_icon-78"></i>
        </button>
    </form>
</div><!-- End Search Menu -->

<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="small-dialog-header">
        <h3>Sign In</h3>
    </div>
    <form>
        <div class="sign-in-wrapper">
            <a href="#0" class="social_bt facebook">{{__('theme.login with facebook')}}</a>
            <a href="#0" class="social_bt google">{{__('theme.login with google')}}</a>
            <div class="divider"><span>
                    {{__("theme.or")}}
                </span></div>
            <div class="form-group">
                <label>{{__('theme.email')}}</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>{{__('theme.password')}}</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                    <input id="remember-me" type="checkbox" name="check">
                    <label for="remember-me">{{__('theme.remember me')}}</label>
                </div>
                <div class="float-right"><a id="forgot" href="javascript:void(0);">{{__('theme.forgot password')}}</a></div>
            </div>
            <div class="text-center">
                <input type="submit" value="{{__("theme.login")}}" class="btn_login">
            </div>
            <div class="text-center">
                {{__('theme.don’t have an account')}}
                <a href="javascript:void(0);">{{__('theme.sign up')}}</a>
            </div>
            <div id="forgot_pw">
                <div class="form-group">
                    <label>{{__('theme.please confirm login email below')}}</label>
                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                    <i class="icon_mail_alt"></i>
                </div>
                <p>
                    {{__('theme.you will receive an email containing a link allowing you to reset your password to a new preferred one.')}}
                </p>
                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
            </div>
        </div>
    </form>
    <!--form -->
</div>
<!-- /Sign In Popup -->

<!-- Common scripts -->

@if(in_array(App::getLocale(),config('base.rtl_locales')))

    <script src="{{asset("front-end-assets/ltr/js/jquery-2.2.4.min.js")}}"></script>
    <script src="{{asset("front-end-assets/rtl/js/common_scripts_min_rtl.js")}}"></script>
    <script src="{{asset("front-end-assets/rtl/js/functions_rtl.js")}}"></script>

@else

    <script src="{{asset("front-end-assets/ltr/js/jquery-2.2.4.min.js")}}"></script>
    <script src="{{asset("front-end-assets/ltr/js/common_scripts_min.js")}}"></script>
    <script src="{{asset("front-end-assets/ltr/js/functions.js")}}"></script>

@endif


@yield('vendor-js')

@yield('footer')
</body>

</html>
