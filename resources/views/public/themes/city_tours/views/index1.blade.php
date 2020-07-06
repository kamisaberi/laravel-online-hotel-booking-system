@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")


@endsection

@section("main")
    <main>
        <div id="carousel-home">
            <div class="owl-carousel owl-theme">
                <div class="owl-slide cover" style="background-image: url('{{asset("front-end-assets/img/slides/slide_home_3.jpg")}}');">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-12 static">
                                    <div class="slide-text text-center white">
                                        <h2 class="owl-slide-animated owl-slide-title">Going Inside<br>The Louvre
                                            Museum</h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            Discover hidden wonders on trips curated by Citytours Tours Experts
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                         href="#"
                                                                                         role="button">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
                <div class="owl-slide cover" style="background-image: url('{{asset("front-end-assets/img/slides/slide_home_2.jpg")}}');">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-end">
                                <div class="col-lg-6 static">
                                    <div class="slide-text text-right white">
                                        <h2 class="owl-slide-animated owl-slide-title">Discover<br>Vatican Museum
                                        </h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            Discover hidden wonders on trips curated by Citytours Tours Experts
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                         href="#"
                                                                                         role="button">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
                <div class="owl-slide cover" style="background-image: url('{{asset("front-end-assets/img/slides/slide_home_1.jpg")}}');">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-6 static">
                                    <div class="slide-text white">
                                        <h2 class="owl-slide-animated owl-slide-title">Love Paris<br>Arch de
                                            Triomphe</h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            Discover hidden wonders on trips curated by Citytours Tours Experts
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                         href="#"
                                                                                         role="button">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
            </div>
            <div id="icon_drag_mobile"></div>
        </div>
        <!--/carousel-->

        <div class="white_bg">
            <div class="container margin_60">
                <div class="row small-gutters categories_grid">
                    <div class="col-sm-12 col-md-6">
                        <a href="#">
                            <img src="{{asset("front-end-assets/img/img_cat_home_1.jpg")}}" alt="" class="img-fluid">
                            <div class="wrapper">
                                <h2>Special Offers</h2>
                                <p>1150 Locations</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row small-gutters mt-md-0 mt-sm-2">
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{asset("front-end-assets/img/img_cat_home_2.jpg")}}" alt="" class="img-fluid">
                                    <div class="wrapper">
                                        <h2>Tours</h2>
                                        <p>800 Locations</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{asset("front-end-assets/img/img_cat_home_3.jpg")}}" alt="" class="img-fluid">
                                    <div class="wrapper">
                                        <h2>Hotels</h2>
                                        <p>650 Locations</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 mt-sm-2">
                                <a href="#">
                                    <img src="{{asset("front-end-assets/img/img_cat_home_4.jpg")}}" alt="" class="img-fluid">
                                    <div class="wrapper">
                                        <h2>Restaurants</h2>
                                        <p>1132 Locations</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/categories_grid-->
            </div>
            <!-- /container -->
        </div>
        <!-- /white_bg -->

        <div class="container margin_60">

            <div class="main_title">
                <h2>Paris <span>Top</span> Tours</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>

            <div class="owl-carousel owl-theme list_carousel add_bottom_30">
                <div class="item">
                    <div class="tour_container">
                        <div class="ribbon_3 popular"><span>Popular</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_1.jpg")}}" width="800" height="533" class="img-fluid"
                                     alt="image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-44"></i>Historic Buildings<span
                                        class="price"><sup>$</sup>39</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Arc Triomphe</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i>
                                <small>(75)</small>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box tour -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="tour_container">
                        <div class="ribbon_3 popular"><span>Popular</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_2.jpg")}}" width="800" height="533" class="img-fluid"
                                     alt="image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-43"></i>Churches<span
                                        class="price"><sup>$</sup>45</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Notredame</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i>
                                <small>(75)</small>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box tour -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="tour_container">
                        <div class="ribbon_3 popular"><span>Popular</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_3.jpg")}}" width="800" height="533" class="img-fluid"
                                     alt="image">
                                <div class="badge_save">Save<strong>30%</strong></div>
                                <div class="short_info">
                                    <i class="icon_set_1_icon-44"></i>Historic Buildings<span
                                        class="price"><sup>$</sup>48</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Versailles</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i>
                                <small>(75)</small>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box tour -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="tour_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_4.jpg")}}" width="800" height="533" class="img-fluid"
                                     alt="image">
                                <div class="badge_save">Save<strong>20%</strong></div>
                                <div class="short_info">
                                    <i class="icon_set_1_icon-30"></i>Walking tour<span class="price"><sup>$</sup>36</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Pompidue</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i>
                                <small>(75)</small>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box tour -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="tour_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_14.jpg")}}" width="800" height="533" class="img-fluid"
                                     alt="image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-28"></i>Skyline tours<span class="price"><sup>$</sup>42</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Tour Eiffel</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i>
                                <small>(75)</small>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box tour -->
                </div>
                <!-- /item -->
            </div>
            <!-- /carousel -->

            <p class="text-center add_bottom_30">
                <a href="#" class="btn_1">View all Tours</a>
            </p>

            <hr class="mt-5 mb-5">

            <div class="main_title">
                <h2>Paris <span>Top</span> Hotels</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>

            <div class="owl-carousel owl-theme list_carousel add_bottom_30">
                <div class="item">
                    <div class="hotel_container">
                        <div class="ribbon_3 popular"><span>Popular</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/hotel_1.jpg")}}" width="800" height="533" class="img-fluid" alt="image">
                                <div class="score"><span>7.5</span>Good</div>
                                <div class="short_info hotel">
                                    From/Per night<span class="price"><sup>$</sup>59</span>
                                </div>
                            </a>
                        </div>
                        <div class="hotel_title">
                            <h3><strong>Park Hyatt</strong> Hotel</h3>
                            <div class="rating">
                                <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star-empty"></i>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="#">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="hotel_container">
                        <div class="ribbon_3 popular"><span>Popular</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/hotel_2.jpg")}}" width="800" height="533" class="img-fluid" alt="image">
                                <div class="score"><span>9.0</span>Superb</div>
                                <div class="short_info hotel">
                                    From/Per night<span class="price"><sup>$</sup>45</span>
                                </div>
                            </a>
                        </div>
                        <div class="hotel_title">
                            <h3><strong>Mariott</strong> Hotel</h3>
                            <div class="rating">
                                <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star-empty"></i>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="#">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="hotel_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/hotel_3.jpg")}}" width="800" height="533" class="img-fluid" alt="image">
                                <div class="score"><span>9.5</span>Superb</div>
                                <div class="short_info hotel">
                                    From/Per night<span class="price"><sup>$</sup>39</span>
                                </div>
                            </a>
                        </div>
                        <div class="hotel_title">
                            <h3><strong>Lumiere</strong> Hotel</h3>
                            <div class="rating">
                                <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star-empty"></i>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="#">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="hotel_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/hotel_4.jpg")}}" width="800" height="533" class="img-fluid" alt="image">
                                <div class="score"><span>7.5</span>Good</div>
                                <div class="short_info hotel">
                                    From/Per night<span class="price"><sup>$</sup>45</span>
                                </div>
                            </a>
                        </div>
                        <div class="hotel_title">
                            <h3><strong>Novelle</strong> Hotel</h3>
                            <div class="rating">
                                <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star-empty"></i>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box -->
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="hotel_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/hotel_5.jpg")}}" width="800" height="533" class="img-fluid" alt="image">
                                <div class="score"><span>8.0</span>Good</div>
                                <div class="short_info hotel">
                                    From/Per night<span class="price"><sup>$</sup>39</span>
                                </div>
                            </a>
                        </div>
                        <div class="hotel_title">
                            <h3><strong>Louvre</strong> Hotel</h3>
                            <div class="rating">
                                <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star-empty"></i>
                            </div>
                            <!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="#">+<span
                                        class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div>
                            <!-- End wish list-->
                        </div>
                    </div>
                    <!-- End box -->
                </div>
                <!-- /item -->
            </div>
            <!-- /carousel -->

            <p class="text-center nopadding">
                <a href="#" class="btn_1">View all Hotels</a>
            </p>

        </div>
        <!-- End container -->

        <div class="white_bg">
            <div class="container margin_60">
                <div class="main_title">
                    <h2>Plan <span>Your Tour</span> Easly</h2>
                    <p>
                        Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                    </p>
                </div>
                <div class="row feature_home_2">
                    <div class="col-md-4 text-center">
                        <img src="{{asset("front-end-assets/img/adventure_icon_1.svg")}}" alt="" width="75" height="75">
                        <h3>Itineraries studied in detail</h3>
                        <p>Suscipit invenire petentium per in. Ne magna assueverit vel. Vix movet perfecto facilisis
                            in, ius ad maiorum corrumpit, his esse docendi in.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{asset("front-end-assets/img/adventure_icon_2.svg")}}" alt="" width="75" height="75">
                        <h3>Room and food included</h3>
                        <p> Cum accusam voluptatibus at, et eum fuisset sententiae. Postulant tractatos ius an, in
                            vis fabulas percipitur, est audiam phaedrum electram ex.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{asset("front-end-assets/img/adventure_icon_3.svg")}}" alt="" width="75" height="75">
                        <h3>Everything organized</h3>
                        <p>Integre vivendo percipitur eam in, graece suavitate cu vel. Per inani persius accumsan
                            no. An case duis option est, pro ad fastidii contentiones.</p>
                    </div>
                </div>

                <div class="banner_2">
                    <div class="wrapper d-flex align-items-center opacity-mask"
                         data-opacity-mask="rgba(0, 0, 0, 0.3)" style="background-color: rgba(0, 0, 0, 0.3);">
                        <div>
                            <h3>Your Perfect<br>Tour Experience</h3>
                            <p>Activities and accommodations</p>
                            <a href="#" class="btn_1">Read more</a>
                        </div>
                    </div>
                    <!-- /wrapper -->
                </div>
                <!-- /banner_2 -->

            </div>
            <!-- End container -->
        </div>
        <!-- End white_bg -->

        <div class="container margin_60">
            <div class="main_title">
                <h2>Lates <span>Blog</span> News</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <a class="box_news" href="#">
                        <figure><img src="{{asset("front-end-assets/img/news_home_1.jpg")}}" alt="">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>Mark Twain</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Pri oportere scribentur eu</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="#">
                        <figure><img src="{{asset("front-end-assets/img/news_home_2.jpg")}}" alt="">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>Jhon Doe</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Duo eius postea suscipit ad</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="#">
                        <figure><img src="{{asset("front-end-assets/img/news_home_3.jpg")}}" alt="">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>Luca Robinson</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Elitr mandamus cu has</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="#">
                        <figure><img src="{{asset("front-end-assets/img/news_home_4.jpg")}}" alt="">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>Paula Rodrigez</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Id est adhuc ignota delenit</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
            </div>
            <!-- /row -->
            <p class="btn_home_align"><a href="#" class="btn_1 rounded">View all news</a></p>
        </div>
        <!-- End container -->
    </main>
@endsection


@section("vendor-js")

    <script src="{{asset("front-end-assets/ltr/js/notify_func.js")}}"></script>

@endsection

@section("footer")


@endsection
