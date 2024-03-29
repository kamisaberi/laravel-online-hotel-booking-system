@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

    @else

    @endif

@endsection

@section("main")

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("front-end-assets/img/header_bg.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>{{__("theme.about us")}}</h1>
                <p>
                    {{__("theme.lurem ipsum 1 line")}}
                </p>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <main>
        @include("public.themes.city_tours.widgets.breadcrumbs")

        <!-- End Position -->

        <div class="container margin_60">

            <div class="main_title">
                <h2>Some <span>good </span>reasons</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>

            <div class="row">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature">
                        <i class="icon_set_1_icon-30"></i>
                        <h3><span>+ 1000</span> Customers</h3>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="feature">
                        <i class="icon_set_1_icon-41"></i>
                        <h3><span>+120</span> Premium city tours</h3>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <div class="row">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature">
                        <i class="icon_set_1_icon-57"></i>
                        <h3><span>H24</span> Support</h3>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.4s">
                    <div class="feature">
                        <i class="icon_set_1_icon-61"></i>
                        <h3><span>10 Languages</span> available</h3>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <div class="row">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature">
                        <i class="icon_set_1_icon-13"></i>
                        <h3><span>Accesibility</span> managment</h3>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.6s">
                    <div class="feature">
                        <i class="icon_set_1_icon-22"></i>
                        <h3><span>Pet</span> allowed</h3>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <h4>Pertinax elaboraret sed</h4>
                    <p>
                        {{__("theme.lurem ipsum 1 sentence")}}
                    </p>
                    <div class="general_icons">
                        <ul>
                            <li><i class="icon_set_1_icon-59"></i>Breakfast</li>
                            <li><i class="icon_set_1_icon-8"></i>Dinner</li>
                            <li><i class="icon_set_1_icon-32"></i>Photo collection</li>
                            <li><i class="icon_set_1_icon-50"></i>Personal shopper</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Mel at vide soluta</h4>
                    <p>
                        {{__("theme.lurem ipsum 1 sentence")}}

                    </p>
                    <div class="general_icons">
                        <ul>
                            <li><i class="icon_set_1_icon-98"></i>Audio guide</li>
                            <li><i class="icon_set_1_icon-27"></i>Parking</li>
                            <li><i class="icon_set_1_icon-36"></i>Exchange</li>
                            <li><i class="icon_set_1_icon-63"></i>Mobile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 nopadding features-intro-img">
                    <div class="features-bg">
                        <div class="features-img"></div>
                    </div>
                </div>
                <div class="col-lg-6 nopadding">
                    <div class="features-content">
                        <h3>"Ex vero mediocrem"</h3>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                        <p><a href="#" class=" btn_1 white">Read more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container-fluid  -->

        <div class="container margin_60">

            <div class="main_title">
                <h2>What <span>customers </span>says</h2>
                <p>
                    {{__("theme.lurem ipsum 1 line")}}

                </p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="review_strip">
                        <img src="{{asset("front-end-assets/img/avatar1.jpg")}}" alt="Image" class="rounded-circle">
                        <h4>Jhon Doe</h4>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i
                                class=" icon-star-empty"></i>
                        </div>
                    </div>
                    <!-- End review strip -->
                </div>

                <div class="col-lg-6">
                    <div class="review_strip">
                        <img src="{{asset("front-end-assets/img/avatar2.jpg")}}" alt="Image" class="rounded-circle">
                        <h4>Frank Rosso</h4>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i
                                class=" icon-star-empty"></i>
                        </div>
                    </div>
                    <!-- End review strip -->
                </div>
            </div>
            <!-- End row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="review_strip">
                        <img src="{{asset("front-end-assets/img/avatar3.jpg")}}" alt="Image" class="rounded-circle">
                        <h4>Marc twain</h4>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i
                                class=" icon-star-empty"></i>
                        </div>
                    </div>
                    <!-- End review strip -->
                </div>

                <div class="col-lg-6">
                    <div class="review_strip">
                        <img src="{{asset("front-end-assets/img/avatar1.jpg")}}" alt="Image" class="rounded-circle">
                        <h4>Peter Gabriel</h4>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i
                                class=" icon-star-empty"></i>
                        </div>
                    </div>
                    <!-- End review strip -->
                </div>
            </div>
            <!-- End row -->

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset("front-end-assets/img/laptop.png")}}" alt="Laptop" class="img-fluid laptop">
                </div>
                <div class="col-md-6">
                    <h3><span>Get started</span> with CityTours</h3>
                    <p>
                        {{__("theme.lurem ipsum 1 line")}}
                    </p>
                    <ul class="list_order">
                        <li><span>1</span>Select your preferred tours</li>
                        <li><span>2</span>Purchase tickets and options</li>
                        <li><span>3</span>Pick them directly from your office</li>
                    </ul>
                    <a href="http://www.ansonika.com/citytours/all_tour_list.html" class="btn_1">Start now</a>
                </div>
            </div>
            <!-- End row -->

        </div>
        <!-- End Container -->
    </main>
    <!-- End main -->


@endsection


@section("vendor-js")


@endsection

@section("footer")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

    @else

    @endif


@endsection
