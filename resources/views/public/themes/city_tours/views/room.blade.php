@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")


@endsection

@section("main")

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("front-end-assets/img/single_hotel_bg_1.jpg")}}" data-natural-width="1400"
             data-natural-height="470">
        <div class="parallax-content-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class=" icon-star-empty"></i></span>
                        <h1>{{__("theme.temp hotel")}}</h1>
                        <span>{{__("theme.temp address")}}</span>
                    </div>
                    <div class="col-md-4">
                        <div id="price_single_main" class="hotel">
                            from/per night <span><sup>$</sup>95</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End section -->

    <main>
    @include("public.themes.city_tours.widgets.breadcrumbs")

    <!-- End Position -->

        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div>
        <!-- End Map -->

        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8" id="single_tour_desc">
                    <div id="single_tour_feat">
                        <ul>
                            <li><i class="icon_set_2_icon-116"></i>Plasma TV</li>
                            <li><i class="icon_set_1_icon-86"></i>Free Wifi</li>
                            <li><i class="icon_set_2_icon-110"></i>Poll</li>
                            <li><i class="icon_set_1_icon-59"></i>Breakfast</li>
                            <li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
                            <li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
                            <li><i class="icon_set_1_icon-27"></i>Parking</li>
                        </ul>
                    </div>
                    <p class="d-none d-md-block d-block d-lg-none">
                        <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map"
                           data-text-original="View on map">
                            {{__("theme.view on map")}}
                        </a>
                    </p>
                    <!-- Map button for tablets/mobiles -->
                    <div id="Img_carousel" class="slider-pro">
                        <div class="sp-slides">

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/1_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/1_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/1_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/1_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/1_large.jpg")}}">
                            </div>
                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/2_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/2_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/2_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/2_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/2_large.jpg")}}">
                                <h3 class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="40" data-show-transition="left">
                                    {{__('theme.lurem ipsum short')}}
                                </h3>
                                <p class="sp-layer sp-white sp-padding" data-horizontal="40" data-vertical="100" data-show-transition="left" data-show-delay="200">
                                    {{__('theme.lurem ipsum short')}}
                                </p>
                                <p class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="160" data-width="350" data-show-transition="left" data-show-delay="400">
                                    {{__('theme.lurem ipsum 1 sentence')}}
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/3_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/3_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/3_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/3_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/3_large.jpg")}}">
                                <p class="sp-layer sp-white sp-padding" data-position="centerCenter" data-vertical="-50" data-show-transition="right" data-show-delay="500">
                                    {{__('theme.lurem ipsum short')}}
                                </p>
                                <p class="sp-layer sp-black sp-padding" data-position="centerCenter" data-vertical="50" data-show-transition="left" data-show-delay="700">
                                    {{__('theme.lurem ipsum short')}}
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/4_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/4_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/4_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/4_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/4_large.jpg")}}">
                                <p class="sp-layer sp-black sp-padding" data-position="bottomLeft" data-vertical="0" data-width="100%" data-show-transition="up">
                                    {{__('theme.lurem ipsum 1 sentence')}}
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/5_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/5_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/5_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/5_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/5_large.jpg")}}">
                                <p class="sp-layer sp-white sp-padding" data-vertical="5%" data-horizontal="5%" data-width="90%" data-show-transition="down" data-show-delay="400">
                                    {{__('theme.lurem ipsum 1 sentence')}}
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/6_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/6_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/6_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/6_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/6_large.jpg")}}">
                                <p class="sp-layer sp-white sp-padding" data-horizontal="10" data-vertical="10" data-width="300">
                                    {{__('theme.lurem ipsum 1 sentence')}}
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/7_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/7_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/7_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/7_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/7_large.jpg")}}">
                                <p class="sp-layer sp-black sp-padding" data-position="bottomLeft" data-horizontal="5%" data-vertical="5%" data-width="90%"
                                   data-show-transition="up"
                                   data-show-delay="400">
                                    {{__('theme.lurem ipsum 1 sentence')}}
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/8_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/8_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/8_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/8_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/8_large.jpg")}}">
                                <p class="sp-layer sp-black sp-padding" data-horizontal="50" data-vertical="50" data-show-transition="down" data-show-delay="500">
                                    {{__('theme.lurem ipsum short')}}
                                </p>
                                <p class="sp-layer sp-white sp-padding" data-horizontal="50" data-vertical="100" data-show-transition="up" data-show-delay="500">
                                    {{__('theme.lurem ipsum 1 line')}}
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="{{asset("front-end-assets/css/images/blank.gif")}}"
                                     data-src="{{asset("front-end-assets/img/slider_single_tour/9_medium.jpg")}}"
                                     data-small="{{asset("front-end-assets/img/slider_single_tour/9_small.jpg")}}"
                                     data-medium="{{asset("front-end-assets/img/slider_single_tour/9_medium.jpg")}}"
                                     data-large="{{asset("front-end-assets/img/slider_single_tour/9_large.jpg")}}"
                                     data-retina="{{asset("front-end-assets/img/slider_single_tour/9_large.jpg")}}">
                            </div>
                        </div>
                        <div class="sp-thumbnails">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/1_medium.jpg")}}">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/2_medium.jpg")}}">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/3_medium.jpg")}}">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/4_medium.jpg")}}">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/5_medium.jpg")}}">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/6_medium.jpg")}}">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/7_medium.jpg")}}">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/8_medium.jpg")}}">
                            <img alt="Image" class="sp-thumbnail" src="{{asset("front-end-assets/img/slider_single_tour/9_medium.jpg")}}">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-3">
                            <h3>
                                {{__("theme.description")}}
                            </h3>
                        </div>
                        <div class="col-lg-9">
                            <p>
                                {{__('theme.lurem ipsum 1 paragraph')}}
                            </p>
                            <h4>
                                {{__('theme.hotel facilities')}}

                            </h4>
                            <p>
                                {{__('theme.lurem ipsum 1 sentence')}}

                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list_ok">
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list_ok">
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End row  -->
                        </div>
                        <!-- End col-md-9  -->
                    </div>
                    <!-- End row  -->

                    <hr>

                    <div class="row">
                        <div class="col-lg-3">
                            <h3>{{__("theme.rooms types")}}</h3>
                        </div>
                        <div class="col-lg-9">
                            <h4>{{__("theme.single room")}}</h4>
                            <p>
                                {{__('theme.lurem ipsum 1 sentence')}}
                            </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list_icons">
                                        <li><i class="icon_set_1_icon-86"></i> Free wifi</li>
                                        <li><i class="icon_set_2_icon-116"></i> Plasma Tv</li>
                                        <li><i class="icon_set_2_icon-106"></i> Safety box</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list_ok">
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End row  -->
                            <div class="owl-carousel owl-theme carousel-thumbs-2 magnific-gallery">
                                <div class="item">
                                    <a href="{{asset("front-end-assets/img/carousel/1.jpg")}}" data-effect="mfp-zoom-in">
                                        <img src="{{asset("front-end-assets/img/carousel/1.jpg")}}" alt="Image">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{asset("front-end-assets/img/carousel/2.jpg")}}" data-effect="mfp-zoom-in">
                                        <img src="{{asset("front-end-assets/img/carousel/2.jpg")}}" alt="Image">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{asset("front-end-assets/img/carousel/3.jpg")}}" data-effect="mfp-zoom-in">
                                        <img src="{{asset("front-end-assets/img/carousel/3.jpg")}}" alt="Image">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{asset("front-end-assets/img/carousel/4.jpg")}}" data-effect="mfp-zoom-in">
                                        <img src="{{asset("front-end-assets/img/carousel/4.jpg")}}" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <!-- End photo carousel  -->

                            <hr>

                            <h4>{{__("theme.double room")}}</h4>
                            <p>
                                {{__('theme.lurem ipsum 1 sentence')}}
                            </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list_icons">
                                        <li><i class="icon_set_1_icon-86"></i> Free wifi</li>
                                        <li><i class="icon_set_2_icon-116"></i> Plasma Tv</li>
                                        <li><i class="icon_set_2_icon-106"></i> Safety box</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list_ok">
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                        <li>{{__('theme.lurem ipsum short')}}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End row  -->
                            <div class="owl-carousel owl-theme carousel-thumbs-2 magnific-gallery">
                                <div class="item">
                                    <a href="{{asset("front-end-assets/img/carousel/1.jpg")}}" data-effect="mfp-zoom-in">
                                        <img src="{{asset("front-end-assets/img/carousel/1.jpg")}}" alt="Image">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{asset("front-end-assets/img/carousel/2.jpg")}}" data-effect="mfp-zoom-in">
                                        <img src="{{asset("front-end-assets/img/carousel/2.jpg")}}" alt="Image">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{asset("front-end-assets/img/carousel/3.jpg")}}" data-effect="mfp-zoom-in">
                                        <img src="{{asset("front-end-assets/img/carousel/3.jpg")}}" alt="Image">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="{{asset("front-end-assets/img/carousel/4.jpg")}}" data-effect="mfp-zoom-in">
                                        <img src="{{asset("front-end-assets/img/carousel/4.jpg")}}" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <!-- End photo carousel  -->
                        </div>
                        <!-- End col-md-9  -->
                    </div>
                    <!-- End row  -->

                    <hr>

                    <div class="row">
                        <div class="col-lg-3">
                            <h3>{{__("theme.reviews")}}</h3>
                            <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">{{__("theme.leave a review")}}</a>
                        </div>
                        <div class="col-lg-9">
                            <div id="score_detail"><span>7.5</span>Good <small>(Based on 34 reviews)</small>
                            </div>
                            <!-- End general_rating -->
                            <div class="row" id="rating_summary">
                                <div class="col-md-6">
                                    <ul>
                                        <li>Position
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i
                                                    class="icon-smile"></i>
                                            </div>
                                        </li>
                                        <li>Comfort
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                    class="icon-smile"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Price
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i
                                                    class="icon-smile"></i>
                                            </div>
                                        </li>
                                        <li>Quality
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End row -->
                            <hr>
                            <div class="review_strip_single">
                                <img src="{{asset("front-end-assets/img/avatar1.jpg")}}" alt="Image" class="rounded-circle">
                                <small> - {{__("theme.temp date")}} -</small>
                                <h4>Jhon Doe</h4>
                                <p>
                                    "{{__("theme.lurem ipsum 1 paragraph")}}"
                                </p>
                                <div class="rating">
                                    <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i
                                        class="icon-smile"></i>
                                </div>
                            </div>
                            <!-- End review strip -->

                            <div class="review_strip_single">
                                <img src="{{asset("front-end-assets/img/avatar2.jpg")}}" alt="Image" class="rounded-circle">
                                <small> - {{__("theme.temp date")}} -</small>
                                <h4>Jhon Doe</h4>
                                <p>
                                    "{{__("theme.lurem ipsum 1 paragraph")}}"
                                </p>
                                <div class="rating">
                                    <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i
                                        class="icon-smile"></i>
                                </div>
                            </div>
                            <!-- End review strip -->

                            <div class="review_strip_single last">
                                <img src="{{asset("front-end-assets/img/avatar3.jpg")}}" alt="Image" class="rounded-circle">
                                <small> - {{__("theme.temp date")}} -</small>
                                <h4>Jhon Doe</h4>
                                <p>
                                    "{{__("theme.lurem ipsum 1 paragraph")}}"
                                </p>
                                <div class="rating">
                                    <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i
                                        class="icon-smile"></i>
                                </div>
                            </div>
                            <!-- End review strip -->
                        </div>
                    </div>
                </div>
                <!--End  single_tour_desc-->

                <aside class="col-lg-4">
                    <p class="d-none d-xl-block d-lg-block d-xl-none">
                        <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map"
                           data-text-original="View on map">{{__("theme.view on map")}}</a>
                    </p>
                    <div class="box_style_1 expose">
                        <h3 class="inner">{{__("theme.check availability")}}</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="icon-calendar-7"></i> {{__("theme.check in")}}</label>
                                    <input class="date-pick form-control" data-date-format="M d, D" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="icon-calendar-7"></i> {{__("theme.check out")}}</label>
                                    <input class="date-pick form-control" data-date-format="M d, D" type="text">
                                </div>
                                ch
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{__("theme.adults")}}</label>
                                    <div class="numbers-row">
                                        <input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{__("theme.children")}}</label>
                                    <div class="numbers-row">
                                        <input type="text" value="0" id="children" class="qty2 form-control" name="quantity">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <a class="btn_full" href="#">{{__("theme.check now")}}</a>
                        <a class="btn_full_outline" href="#"><i class=" icon-heart"></i> {{__("theme.add to whislist")}}</a>
                    </div>
                    <!--/box_style_1 -->

                    <div class="box_style_4">
                        <i class="icon_set_1_icon-90"></i>
                        <h4><span>{{__("theme.book by phone")}}</span></h4>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                        <small>{{__("theme.support time")}}</small>
                    </div>

                </aside>
            </div>
            <!--End row -->
        </div>
        <!--End container -->

        <div id="overlay"></div>
        <!-- Mask on input focus -->

    </main>
    <!-- End main -->




@endsection


@section("vendor-js")


    @if(in_array(App::getLocale(),config('base.rtl_locales')))

        <!-- Date and time pickers -->
        <script src="{{asset("front-end-assets/rtl/js/jquery.sliderPro.min.js")}}"></script>
        <script type="text/javascript">
            $(document).ready(function ($) {
                $('#Img_carousel').sliderPro({
                    width: 960,
                    height: 500,
                    fade: true,
                    arrows: true,
                    buttons: false,
                    fullScreen: false,
                    smallSize: 500,
                    startSlide: 0,
                    mediumSize: 1000,
                    largeSize: 3000,
                    thumbnailArrows: true,
                    rightToLeft: true,
                    autoplay: false
                });
            });
        </script>

        <!-- Date and time pickers -->
        <script>
            $('input.date-pick').datepicker({
                rtl: true
            });
            $('input.date-pick').datepicker('setDate', 'today');
        </script>

        <!-- Map -->
        <script src="../../maps.googleapis.com/maps/api/js_3.JS"></script>
        <script src="{{asset("front-end-assets/rtl/js/map.js")}}"></script>
        <script src="{{asset("front-end-assets/rtl/js/infobox.js")}}"></script>

        <!-- Carousel -->
        <script>
            $('.carousel-thumbs-2').owlCarousel({
                loop: false,
                margin: 5,
                responsiveClass: true,
                nav: false,
                rtl: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4,
                        nav: false
                    }
                }
            });
        </script>

        <!--Review modal validation -->
        <script src="{{asset("front-end-assets/assets/validate.js")}}"></script>


    @else














        <script src="{{asset("front-end-assets/ltr/js/jquery.sliderPro.min.js")}}"></script>
        <script type="text/javascript">
            $(document).ready(function ($) {
                $('#Img_carousel').sliderPro({
                    width: 960,
                    height: 500,
                    fade: true,
                    arrows: true,
                    buttons: false,
                    fullScreen: false,
                    smallSize: 500,
                    startSlide: 0,
                    mediumSize: 1000,
                    largeSize: 3000,
                    thumbnailArrows: true,
                    autoplay: false
                });
            });
        </script>

        <!-- Date and time pickers -->
        <script>
            $('input.date-pick').datepicker('setDate', 'today');
        </script>

        <!-- Map -->
        <script src="../maps.googleapis.com/maps/api/js_2.JS"></script>
        <script src="{{asset("front-end-assets/ltr/js/map.js")}}"></script>
        <script src="{{asset("front-end-assets/ltr/js/infobox.js")}}"></script>

        <!-- Carousel -->
        <script>
            $('.carousel-thumbs-2').owlCarousel({
                loop: false,
                margin: 5,
                responsiveClass: true,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4,
                        nav: false
                    }
                }
            });
        </script>

        <!--Review modal validation -->
        <script src="{{asset("front-end-assets/assets/validate.js")}}"></script>


    @endif
















@endsection

@section("footer")


@endsection
