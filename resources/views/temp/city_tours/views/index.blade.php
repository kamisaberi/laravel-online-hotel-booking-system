@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")


@endsection

@section("main")

    <section id="search_container">
        <div id="search">
            <ul class="nav nav-tabs">
                <li><a href="#tours" data-toggle="tab" class="active show">{{__("theme.tours")}}</a></li>
                <li><a href="#hotels" data-toggle="tab">{{__("theme.hotels")}}</a></li>
                <li><a href="#transfers" data-toggle="tab">{{__("theme.transfers")}}</a></li>
                <li><a href="#restaurants" data-toggle="tab">{{__("theme.restaurants")}}</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active show" id="tours">
                    <h3>{{__("theme.search tours in")}}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__("theme.search terms")}}</label>
                                <input type="text" class="form-control" id="firstname_booking" name="firstname_booking" placeholder="Type your search terms">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__("theme.things to do")}}</label>
                                <select class="ddslick" name="category">
                                    <option value="0" data-imagesrc="{{asset("front-end-assets/img/icons_search/all_tours.png")}}" selected>All tours</option>
                                    <option value="1" data-imagesrc="{{asset("front-end-assets/img/icons_search/sightseeing.png")}}">City sightseeing</option>
                                    <option value="2" data-imagesrc="{{asset("front-end-assets/img/icons_search/museums.png")}}">Museum tours</option>
                                    <option value="3" data-imagesrc="{{asset("front-end-assets/img/icons_search/historic.png")}}">Historic Buildings</option>
                                    <option value="4" data-imagesrc="{{asset("front-end-assets/img/icons_search/walking.png")}}">Walking tours</option>
                                    <option value="5" data-imagesrc="{{asset("front-end-assets/img/icons_search/eat.png")}}">Eat & Drink</option>
                                    <option value="6" data-imagesrc="{{asset("front-end-assets/img/icons_search/churches.png")}}">Churces</option>
                                    <option value="7" data-imagesrc="{{asset("front-end-assets/img/icons_search/skyline.png")}}">Skyline tours</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class="icon-calendar-7"></i> {{__("theme.date")}}</label>
                                <input class="date-pick form-control" data-date-format="M d, D" type="text">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class=" icon-clock"></i> {{__("theme.time")}}</label>
                                <input class="time-pick form-control" value="12:00 AM" type="text">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group">
                                <label>{{__("theme.adults")}}</label>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="adults" class="qty2 form-control" name="adults">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group">
                                <label>{{__("theme.children")}}</label>
                                <div class="numbers-row">
                                    <input type="text" value="0" id="children" class="qty2 form-control" name="children">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End row -->
                    <hr>
                    <button class="btn_1 green"><i class="icon-search"></i>{{__("theme.search now")}}</button>
                </div>
                <!-- End rab -->
                <div class="tab-pane" id="hotels">
                    <h3>{{__("theme.search hotels in")}}</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class="icon-calendar-7"></i> {{__("theme.check in")}}</label>
                                <input class="date-pick form-control" data-date-format="M d, D" type="text">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class="icon-calendar-7"></i> {{__("theme.check out")}}</label>
                                <input class="date-pick form-control" data-date-format="M d, D" type="text">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group">
                                <label>{{__("theme.adults")}}</label>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="adults" class="qty2 form-control" name="adults_2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group">
                                <label>{{__("theme.children")}}</label>
                                <div class="numbers-row">
                                    <input type="text" value="0" id="children" class="qty2 form-control" name="children_2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-12">
                            <div class="form-group">
                                <label>{{__("theme.rooms")}}</label>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="children" class="qty2 form-control" name="rooms">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__("theme.hotel name")}}</label>
                                <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Optionally type hotel name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__("theme.preferred city area")}}</label>
                                <select class="form-control" name="area">
                                    <option value="Centre" selected>Centre</option>
                                    <option value="Gar du Nord Station">Gar du Nord Station</option>
                                    <option value="La Defance">La Defance</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <hr>
                    <button class="btn_1 green"><i class="icon-search"></i>{{__("theme.search now")}}</button>
                </div>
                <div class="tab-pane" id="transfers">
                    <h3>Search Transfers in Paris</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="select-label">{{__("theme.pick up location")}}</label>
                                <select class="form-control">
                                    <option value="orly_airport">Orly airport</option>
                                    <option value="gar_du_nord">Gar du Nord Station</option>
                                    <option value="hotel_rivoli">Hotel Rivoli</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="select-label">{{__("theme.drop off location")}}</label>
                                <select class="form-control">
                                    <option value="orly_airport">Orly airport</option>
                                    <option value="gar_du_nord">Gar du Nord Station</option>
                                    <option value="hotel_rivoli">Hotel Rivoli</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class="icon-calendar-7"></i> {{__("theme.date")}}</label>
                                <input class="date-pick form-control" data-date-format="M d, D" type="text">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class=" icon-clock"></i> {{__("theme.time")}}</label>
                                <input class="time-pick form-control" value="12:00 AM" type="text">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <div class="form-group">
                                <label>{{__("theme.adults")}}</label>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-9">
                            <div class="form-group">
                                <div class="radio_fix">
                                    <label class="radio-inline" style="padding-left:0">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                        {{__("theme.one way")}}
                                    </label>
                                </div>
                                <div class="radio_fix">
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        {{__("theme.return")}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <hr>
                    <button class="btn_1 green"><i class="icon-search"></i>{{__("theme.search now")}}</button>
                </div>
                <div class="tab-pane" id="restaurants">
                    <h3>{{__("theme.search restaurants in")}}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__("theme.search by name")}}</label>
                                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="Type your search terms">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__("theme.food type")}}</label>
                                <select class="ddslick" name="category_2">
                                    <option value="0" data-imagesrc="{{asset("front-end-assets/img/icons_search/all_restaurants.png")}}" selected>All restaurants</option>
                                    <option value="1" data-imagesrc="{{asset("front-end-assets/img/icons_search/fast_food.png")}}">Fast food</option>
                                    <option value="2" data-imagesrc="{{asset("front-end-assets/img/icons_search/pizza_italian.png")}}">Pizza / Italian</option>
                                    <option value="3" data-imagesrc="{{asset("front-end-assets/img/icons_search/international.png")}}">International</option>
                                    <option value="4" data-imagesrc="{{asset("front-end-assets/img/icons_search/japanese.png")}}">Japanese</option>
                                    <option value="5" data-imagesrc="{{asset("front-end-assets/img/icons_search/chinese.png")}}">Chinese</option>
                                    <option value="6" data-imagesrc="{{asset("front-end-assets/img/icons_search/bar.png")}}">Coffee Bar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class="icon-calendar-7"></i> {{__("theme.date")}}</label>
                                <input class="date-pick form-control" data-date-format="M d, D" type="text">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class=" icon-clock"></i> {{__("theme.time")}}</label>
                                <input class="time-pick form-control" value="12:00 AM" type="text">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group">
                                <label>{{__("theme.adults")}}</label>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="adults" class="qty2 form-control" name="adults">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group">
                                <label>{{__("theme.children")}}</label>
                                <div class="numbers-row">
                                    <input type="text" value="0" id="children" class="qty2 form-control" name="children">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End row -->
                    <hr>
                    <button class="btn_1 green"><i class="icon-search"></i>{{__("theme.search now")}}</button>
                </div>
            </div>
        </div>
    </section>
    <!-- End hero -->

    <main>
        <div class="container margin_60">

            <div class="main_title">
                <h2><span>{{__("theme.top")}}</span> {{__("theme.tours")}}</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="tour_container">
                        <div class="ribbon_3 popular"><span>{{__("theme.popular")}}</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_1.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup>39</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Arc Triomphe</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.2s">
                    <div class="tour_container">
                        <div class="ribbon_3 popular"><span>{{__("theme.popular")}}</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_2.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="badge_save">Save<strong>30%</strong></div>
                                <div class="short_info">
                                    <i class="icon_set_1_icon-43"></i>Churches<span class="price"><sup>$</sup>45</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Notredame</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="tour_container">
                        <div class="ribbon_3 popular"><span>{{__("theme.popular")}}</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_3.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup>48</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Versailles</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.4s">
                    <div class="tour_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_4.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="badge_save">Save<strong>30%</strong></div>
                                <div class="short_info">
                                    <i class="icon_set_1_icon-30"></i>Walking tour<span class="price"><sup>$</sup>36</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Pompidue</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.5s">
                    <div class="tour_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_14.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-28"></i>Skyline tours<span class="price"><sup>$</sup>42</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Tour Eiffel</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="tour_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_5.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup>40</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Pantheon</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.7s">
                    <div class="tour_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_8.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-3"></i>City sightseeing<span class="price"><sup>$</sup>35</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Open Bus</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.8s">
                    <div class="tour_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_9.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-4"></i>Museums<span class="price"><sup>$</sup>38</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Louvre museum</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="tour_container">
                        <div class="ribbon_3"><span>Top rated</span></div>
                        <div class="img_container">
                            <a href="#">
                                <img src="{{asset("front-end-assets/img/tour_box_12.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                <div class="short_info">
                                    <i class="icon_set_1_icon-14"></i>Eat &amp; drink<span class="price"><sup>$</sup>25</span>
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <h3><strong>Boulangerie</strong> tour</h3>
                            <div class="rating">
                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile"></i><small>(75)</small>
                            </div><!-- end rating -->
                            <div class="wishlist">
                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span
                                            class="tooltip-back">Add to wishlist</span></span></a>
                            </div><!-- End wish list-->
                        </div>
                    </div><!-- End box tour -->
                </div><!-- End col -->

            </div><!-- End row -->

            <p class="text-center nopadding">
                <a href="#" class="btn_1 medium"><i class="icon-eye-7"></i>{{__("theme.view all tours")}} (144) </a>
            </p>
        </div><!-- End container -->

        <div class="white_bg">
            <div class="container margin_60">
                <div class="main_title">
                    <h2>Other <span>{{__("theme.popular")}}</span> tours</h2>
                    <p>
                        Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                    </p>
                </div>
                <div class="row add_bottom_45">
                    <div class="col-lg-4 other_tours">
                        <ul>
                            <li><a href="#"><i class="icon_set_1_icon-3"></i>Tour Eiffel<span class="other_tours_price">$42</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-30"></i>Shopping tour<span class="other_tours_price">$35</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-44"></i>Versailles tour<span class="other_tours_price">$20</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-3"></i>Montparnasse skyline<span class="other_tours_price">$26</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-44"></i>Pompidue<span class="other_tours_price">$26</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-3"></i>Senna River tour<span class="other_tours_price">$32</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 other_tours">
                        <ul>
                            <li><a href="#"><i class="icon_set_1_icon-1"></i>Notredame<span class="other_tours_price">$48</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-4"></i>Lafaiette<span class="other_tours_price">$55</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-30"></i>Trocadero<span class="other_tours_price">$76</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-3"></i>Open Bus tour<span class="other_tours_price">$55</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-30"></i>Louvre museum<span class="other_tours_price">$24</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-3"></i>Madlene Cathedral<span class="other_tours_price">$24</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 other_tours">
                        <ul>
                            <li><a href="#"><i class="icon_set_1_icon-37"></i>Montparnasse<span class="other_tours_price">$36</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-1"></i>D'Orsey museum<span class="other_tours_price">$28</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-50"></i>Gioconda Louvre musuem<span class="other_tours_price">$44</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-44"></i>Tour Eiffel<span class="other_tours_price">$56</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-50"></i>Ladefanse<span class="other_tours_price">$16</span></a>
                            </li>
                            <li><a href="#"><i class="icon_set_1_icon-44"></i>Notredame<span class="other_tours_price">$26</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End row -->

                <div class="banner colored">
                    <h4>Discover our Top tours <span>from $34</span></h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in.
                    </p>
                    <a href="#" class="btn_1 white">{{__("theme.read more")}}</a>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <p>
                            <a href="#"><img src="{{asset("front-end-assets/img/bus.jpg")}}" alt="Pic" class="img-fluid"></a>
                        </p>
                        <h4><span>Sightseen tour</span> booking</h4>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <p>
                            <a href="#"><img src="{{asset("front-end-assets/img/transfer.jpg")}}" alt="Pic" class="img-fluid"></a>
                        </p>
                        <h4><span>Transfer</span> booking</h4>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <p>
                            <a href="#"><img src="{{asset("front-end-assets/img/guide.jpg")}}" alt="Pic" class="img-fluid"></a>
                        </p>
                        <h4><span>Tour guide</span> booking</h4>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <p>
                            <a href="#"><img src="{{asset("front-end-assets/img/hotel.jpg")}}" alt="Pic" class="img-fluid"></a>
                        </p>
                        <h4><span>Hotel</span> booking</h4>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                        </p>
                    </div>
                </div>
                <!-- End row -->

            </div>
            <!-- End container -->
        </div>
        <!-- End white_bg -->

        <section class="promo_full">
            <div class="promo_full_wp magnific">
                <div>
                    <h3>BELONG ANYWHERE</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                    </p>
                    <a href="#" class="video"><i class="icon-play-circled2-1"></i></a>
                </div>
            </div>
        </section>
        <!-- End section -->

        <div class="container margin_60">

            <div class="main_title">
                <h2>Some <span>good</span> reasons</h2>
                <p>
                    Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                </p>
            </div>

            <div class="row">

                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-41"></i>
                        <h3><span>+120</span> Premium tours</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="#" class="btn_1 outline">Read more</a>
                    </div>
                </div>

                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.4s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-30"></i>
                        <h3><span>+1000</span> Customers</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="#" class="btn_1 outline">Read more</a>
                    </div>
                </div>

                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="feature_home">
                        <i class="icon_set_1_icon-57"></i>
                        <h3><span>H24 </span> Support</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                        </p>
                        <a href="#" class="btn_1 outline">Read more</a>
                    </div>
                </div>

            </div>
            <!--End row -->

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset("front-end-assets/img/laptop.png")}}" alt="Laptop" class="img-fluid laptop">
                </div>
                <div class="col-md-6">
                    <h3><span>Get started</span> with CityTours</h3>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                    </p>
                    <ul class="list_order">
                        <li><span>1</span>Select your preferred tours</li>
                        <li><span>2</span>Purchase tickets and options</li>
                        <li><span>3</span>Pick them directly from your office</li>
                    </ul>
                    <a href="http://www.ansonika.com/citytours/html_rtl/all_tour_list.html" class="btn_1">Start now</a>
                </div>
            </div>
            <!-- End row -->

        </div>
        <!-- End container -->
    </main>
    <!-- End main -->


@endsection


@section("vendor-js")


@endsection

@section("footer")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <script>
            $('input.date-pick').datepicker({
                rtl: true
            });
            $('input.time-pick').timepicker({
                minuteStep: 15,
                showInpunts: false
            })
        </script>

        <script src="{{asset("front-end-assets/rtl/js/jquery.ddslick.js")}}"></script>
        <script>
            $("select.ddslick").each(function () {
                $(this).ddslick({
                    showSelectedHTML: true
                });
            });
        </script>

        <!-- Check box and radio style iCheck -->
        <script>
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-grey',
                radioClass: 'iradio_square-grey'
            });
        </script>



    @else

        <script>
            $('input.date-pick').datepicker('setDate', 'today');
            $('input.time-pick').timepicker({
                minuteStep: 15,
                showInpunts: false
            })
        </script>

        <script src="{{asset("front-end-assets/ltr/js/jquery.ddslick.js")}}"></script>
        <script>
            $("select.ddslick").each(function () {
                $(this).ddslick({
                    showSelectedHTML: true
                });
            });
        </script>

        <!-- Check box and radio style iCheck -->
        <script>
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-grey',
                radioClass: 'iradio_square-grey'
            });
        </script>


    @endif



@endsection
