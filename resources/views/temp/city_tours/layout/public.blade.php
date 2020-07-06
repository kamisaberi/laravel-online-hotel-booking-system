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
                        <li><a href="#sign-in-dialog" id="access_link">Sign in</a></li>
                        <li><a href="#" id="wishlist_link">Wishlist</a></li>
                        <li><a href="https://1.envato.market/ryzjQ" target="_parent">Purchase this template</a>
                        </li>
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
                            <a href="javascript:void(0);" class="show-submenu">Home <i
                                    class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">Owl Carousel Slider</a></li>
                                <li><a href="#">Home items with Carousel</a></li>
                                <li><a href="#">Home with Search V2</a></li>
                                <li class="third-level"><a href="javascript:void(0);">Revolution slider</a>
                                    <ul>
                                        <li><a href="#">Default slider</a></li>
                                        <li><a href="#">Basic slider</a></li>
                                        <li><a href="#">Youtube Hero</a></li>
                                        <li><a href="#">Vimeo Hero</a></li>
                                        <li><a href="#">Youtube 4K</a></li>
                                        <li><a href="#">Carousel</a></li>
                                        <li><a href="#">Mailchimp
                                                Newsletter</a></li>
                                        <li><a href="#">Fixed Caption</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Layer slider</a></li>
                                <li><a href="#">With Only tours</a></li>
                                <li><a href="#">Single image</a></li>
                                <li><a href="#">Header video</a></li>
                                <li><a href="#">With search panel</a></li>
                                <li><a href="#">With tabs</a></li>
                                <li><a href="#">With map</a></li>
                                <li><a href="#">With search bar</a></li>
                                <li><a href="#">Search bar + Video</a></li>
                                <li><a href="#">With Text Rotator</a></li>
                                <li><a href="#">With Cookie Bar (EU law)</a></li>
                                <li><a href="#">Popup Advertising</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Tours <i
                                    class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">All tours list</a></li>
                                <li><a href="#">All tours grid</a></li>
                                <li><a href="#">All tours Sort Masonry</a></li>
                                <li><a href="#">All tours map listing</a></li>
                                <li><a href="#">Single tour page</a></li>
                                <li><a href="#">Single tour with gallery</a></li>
                                <li class="third-level"><a href="javascript:void(0);">Single tour fixed
                                        sidebar</a>
                                    <ul>
                                        <li><a href="#">Single tour fixed
                                                sidebar</a></li>
                                        <li><a href="#">Single tour 2
                                                Fixed Sidebar</a></li>
                                        <li><a href="#">Cart Fixed Sidebar</a></li>
                                        <li><a href="#">Payment Fixed Sidebar</a></li>
                                        <li><a href="#">Confirmation Fixed
                                                Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Single tour working booking</a>
                                </li>
                                <li><a href="#">Date and time picker V2</a></li>
                                <li><a href="#">Single tour cart</a></li>
                                <li><a href="#">Single tour booking</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Hotels <i
                                    class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">All hotels list</a></li>
                                <li><a href="#">All hotels grid</a></li>
                                <li><a href="#">All hotels Sort Masonry</a></li>
                                <li><a href="#">All hotels map listing</a></li>
                                <li><a href="#">Single hotel page</a></li>
                                <li><a href="#">Single hotel datepicker adv</a>
                                </li>
                                <li><a href="#">Date and time picker V2</a></li>
                                <li><a href="#">Single hotel working booking</a>
                                </li>
                                <li><a href="#">Single hotel contact working</a></li>
                                <li><a href="#">Cart hotel</a></li>
                                <li><a href="#">Booking hotel</a></li>
                                <li><a href="#">Confirmation hotel</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Transfers <i
                                    class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">All transfers list</a></li>
                                <li><a href="#">All transfers grid</a></li>
                                <li><a href="#">All transfers Sort Masonry</a></li>
                                <li><a href="#">Single transfer page</a></li>
                                <li><a href="#">Date and time picker V2</a>
                                </li>
                                <li><a href="#">Cart transfers</a></li>
                                <li><a href="#">Booking transfers</a></li>
                                <li><a href="#">Confirmation transfers</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Restaurants <i
                                    class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">All restaurants list</a></li>
                                <li><a href="#">All restaurants grid</a></li>
                                <li><a href="#">All restaurants Sort Masonry</a>
                                </li>
                                <li><a href="#">All restaurants map listing</a>
                                </li>
                                <li><a href="#">Single restaurant page</a></li>
                                <li><a href="#">Date and time picker V2</a>
                                </li>
                                <li><a href="#">Booking restaurant</a></li>
                                <li><a href="#">Confirmation transfers</a></li>
                            </ul>
                        </li>
                        <li class="megamenu submenu">
                            <a href="javascript:void(0);" class="show-submenu-mega">Bonus<i
                                    class="icon-down-open-mini"></i></a>
                            <div class="menu-wrapper">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h3>Header styles</h3>
                                        <ul>
                                            <li><a href="#">Default transparent</a></li>
                                            <li><a href="#">Plain color</a></li>
                                            <li><a href="#">Plain color on scroll</a></li>
                                            <li><a href="#">With socials on top</a></li>
                                            <li><a href="#">With language selection</a></li>
                                            <li><a href="#">With lang and conversion</a></li>
                                            <li><a href="#">With full horizontal menu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <h3>Footer styles</h3>
                                        <ul>
                                            <li><a href="#">Footer default</a></li>
                                            <li><a href="#">Footer style 2</a></li>
                                            <li><a href="#">Footer style 3</a></li>
                                            <li><a href="#">Footer style 4</a></li>
                                            <li><a href="#">Footer style 5</a></li>
                                            <li><a href="#">Footer style 6</a></li>
                                            <li><a href="#">Footer style 7</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <h3>Shop section</h3>
                                        <ul>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop single</a></li>
                                            <li><a href="#">Shop cart</a></li>
                                            <li><a href="#">Shop Checkout</a></li>
                                        </ul>
                                    </div>
                                </div><!-- End row -->
                            </div><!-- End menu-wrapper -->
                        </li>
                        <li class="megamenu submenu">
                            <a href="javascript:void(0);" class="show-submenu-mega">Pages<i
                                    class="icon-down-open-mini"></i></a>
                            <div class="menu-wrapper">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h3>Pages</h3>
                                        <ul>
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">General page</a></li>
                                            <li><a href="#">Tourist guide</a></li>
                                            <li><a href="#">Wishlist page</a></li>
                                            <li><a href="#">Faq</a></li>
                                            <li><a href="#">Faq smooth scroll</a></li>
                                            <li><a href="#">Pricing tables</a></li>
                                            <li><a href="#">Gallery 3 columns</a></li>
                                            <li><a href="#">Gallery 4 columns</a></li>
                                            <li><a href="#">Grid gallery</a></li>
                                            <li><a href="#">Grid gallery with filters</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <h3>Pages</h3>
                                        <ul>
                                            <li><a href="#">Contact us 1</a></li>
                                            <li><a href="#">Contact us 2</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Blog left sidebar</a></li>
                                            <li><a href="#">Login</a></li>
                                            <li><a href="#">Register</a></li>
                                            <li><a href="#" target="_blank">Invoice</a></li>
                                            <li><a href="#">404 Error page</a></li>
                                            <li><a href="#">Site launch / Coming soon</a>
                                            </li>
                                            <li><a href="#">Tour timeline</a></li>
                                            <li><a href="#"><i class="icon-map"></i> Full
                                                    screen map</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <h3>Elements</h3>
                                        <ul>
                                            <li><a href="#"><i class="icon-columns"></i> Footer with
                                                    working newsletter</a></li>
                                            <li><a href="#"><i class="icon-columns"></i> Footer with
                                                    Twitter feed</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon
                                                    pack 1 (1900)</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon
                                                    pack 2 (100)</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon
                                                    pack 3 (30)</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon
                                                    pack 4 (200)</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon
                                                    pack 5 (360)</a></li>
                                            <li><a href="#"><i class="icon-tools"></i> Shortcodes</a>
                                            </li>
                                            <li><a href="#" target="blank"><i
                                                        class=" icon-mail"></i> Responsive email template</a></li>
                                            <li><a href="#"><i class="icon-cog-1"></i> Admin area</a>
                                            </li>
                                            <li><a href="#"><i class="icon-align-right"></i>
                                                    RTL Version</a></li>
                                        </ul>
                                    </div>
                                </div><!-- End row -->
                            </div><!-- End menu-wrapper -->
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
                                    <a href="#" class="button_drop">Go to cart</a>
                                    <a href="#" class="button_drop outline">Check out</a>
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
                <h3>Need help?</h3>
                <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                <a href="mailto:help@citytours.com" id="email_footer">help@citytours.com</a>
            </div>
            <div class="col-md-3">
                <h3>About</h3>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Terms and condition</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>Discover</h3>
                <ul>
                    <li><a href="#">Community blog</a></li>
                    <li><a href="#">Tour guide</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h3>Settings</h3>
                <div class="styled-select">
                    <select name="lang" id="lang">
                        <option value="English" selected>English</option>
                        <option value="French">French</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Russian">Russian</option>
                    </select>
                </div>
                <div class="styled-select">
                    <select name="currency" id="currency">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="RUB">RUB</option>
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
        <input value="" name="q" type="search" placeholder="Search..."/>
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
            <a href="#0" class="social_bt facebook">Login with Facebook</a>
            <a href="#0" class="social_bt google">Login with Google</a>
            <div class="divider"><span>Or</span></div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                    <input id="remember-me" type="checkbox" name="check">
                    <label for="remember-me">Remember Me</label>
                </div>
                <div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>
            <div class="text-center"><input type="submit" value="Log In" class="btn_login"></div>
            <div class="text-center">
                Don’t have an account? <a href="javascript:void(0);">Sign up</a>
            </div>
            <div id="forgot_pw">
                <div class="form-group">
                    <label>Please confirm login email below</label>
                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                    <i class="icon_mail_alt"></i>
                </div>
                <p>You will receive an email containing a link allowing you to reset your password to a new
                    preferred one.</p>
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

<!-- NOTIFY BUBBLES  -->


{{--<!-- SWITCHER  -->--}}
{{--<script src="{{asset("front-end-assets/ltr/js/switcher.js")}}"></script>--}}
{{--<div id="style-switcher">--}}
{{--    <h2>Color Switcher <a href="#"><i class="icon_set_1_icon-65"></i></a></h2>--}}
{{--    <div>--}}
{{--        <ul class="colors" id="color1">--}}
{{--            <li><a href="#" class="default" title="Defaul"></a></li>--}}
{{--            <li><a href="#" class="aqua" title="Aqua"></a></li>--}}
{{--            <li><a href="#" class="green_switcher" title="Green"></a></li>--}}
{{--            <li><a href="#" class="orange" title="Orange"></a></li>--}}
{{--            <li><a href="#" class="blue" title="Blue"></a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}
@yield('footer')
</body>

</html>
