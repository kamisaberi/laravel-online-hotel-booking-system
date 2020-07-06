@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")
    @if(in_array(App::getLocale(),config('base.rtl_locales')))

        <!-- SPECIFIC CSS -->
        <link href="{{asset("front-end-assets/css/admin.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/admin-rtl.css")}}" rel="stylesheet">

    @else

        <!-- SPECIFIC CSS -->
        <link href="{{asset("front-end-assets/css/admin.css")}}" rel="stylesheet">

    @endif


@endsection

@section("main")

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("front-end-assets/img/admin_top.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>Hello Clara!</h1>
                <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
            </div>
        </div>
    </section>
    <!-- End section -->

    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a>
                    </li>
                    <li><a href="#">Category</a>
                    </li>
                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- End Position -->

        <div class="margin_60 container">
            <div id="tabs" class="tabs">
                <nav>
                    <ul>
                        <li><a href="#section-1" class="icon-booking"><span>Bookings</span></a>
                        </li>
                        <li><a href="#section-2" class="icon-wishlist"><span>Wishlist</span></a>
                        </li>
                        <li><a href="#section-3" class="icon-settings"><span>Settings</span></a>
                        </li>
                        <li><a href="#section-4" class="icon-profile"><span>Profile</span></a>
                        </li>
                    </ul>
                </nav>
                <div class="content">

                    <section id="section-1">
                        <div id="tools">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-6">
                                    <div class="styled-select-filters">
                                        <select name="sort_type" id="sort_type">
                                            <option value="" selected>Sort by type</option>
                                            <option value="tours">Tours</option>
                                            <option value="hotels">Hotels</option>
                                            <option value="transfers">Transfers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-6">
                                    <div class="styled-select-filters">
                                        <select name="sort_date" id="sort_date">
                                            <option value="" selected>Sort by date</option>
                                            <option value="oldest">Oldest</option>
                                            <option value="recent">Recent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/tools -->

                        <div class="strip_booking">
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <div class="date">
                                        <span class="month">Dec</span>
                                        <span class="day"><strong>23</strong>Sat</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5">
                                    <h3 class="hotel_booking">Hotel Mariott Paris<span>2 Adults / 2 Nights</span></h3>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <ul class="info_booking">
                                        <li><strong>Booking id</strong> 23442</li>
                                        <li><strong>Booked on</strong> Sat. 23 Dec. 2015</li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="booking_buttons">
                                        <a href="#0" class="btn_2">Edit</a>
                                        <a href="#0" class="btn_3">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                        </div>
                        <!-- End strip booking -->

                        <div class="strip_booking">
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <div class="date">
                                        <span class="month">Dec</span>
                                        <span class="day"><strong>27</strong>Fri</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5">
                                    <h3 class="tours_booking">Louvre Museum<span>2 Adults / 2 Childs</span></h3>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <ul class="info_booking">
                                        <li><strong>Booking id</strong> 23442</li>
                                        <li><strong>Booked on</strong> Sat. 20 Dec. 2015</li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="booking_buttons">
                                        <a href="#0" class="btn_2">Edit</a>
                                        <a href="#0" class="btn_3">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                        </div>
                        <!-- End strip booking -->

                        <div class="strip_booking">
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <div class="date">
                                        <span class="month">Dec</span>
                                        <span class="day"><strong>28</strong>Fri</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5">
                                    <h3 class="tours_booking">Tour Eiffel<span>2 Adults</span></h3>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <ul class="info_booking">
                                        <li><strong>Booking id</strong> 23442</li>
                                        <li><strong>Booked on</strong> Sat. 20 Dec. 2015</li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="booking_buttons">
                                        <a href="#0" class="btn_2">Edit</a>
                                        <a href="#0" class="btn_3">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                        </div>
                        <!-- End strip booking -->

                        <div class="strip_booking">
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <div class="date">
                                        <span class="month">Dec</span>
                                        <span class="day"><strong>30</strong>Fri</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5">
                                    <h3 class="transfers_booking">Orly Airport<span>2 Adults / 2Childs</span></h3>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <ul class="info_booking">
                                        <li><strong>Booking id</strong> 23442</li>
                                        <li><strong>Booked on</strong> Sat. 20 Dec. 2015</li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="booking_buttons">
                                        <a href="#0" class="btn_2">Edit</a>
                                        <a href="#0" class="btn_3">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                        </div>
                        <!-- End strip booking -->

                    </section>
                    <!-- End section 1 -->

                    <section id="section-2">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="hotel_container">
                                    <div class="img_container">
                                        <a href="#">
                                            <img src="{{asset("front-end-assets/img/hotel_1.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                            <div class="ribbon top_rated">
                                            </div>
                                            <div class="score">
                                                <span>7.5</span>Good
                                            </div>
                                            <div class="short_info hotel">
                                                From/Per night<span class="price"><sup>$</sup>59</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hotel_title">
                                        <h3><strong>Park Hyatt</strong> Hotel</h3>
                                        <div class="rating">
                                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star-empty"></i>
                                        </div>
                                        <!-- end rating -->
                                        <div class="wishlist_close_admin">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <!-- End box tour -->
                            </div>
                            <!-- End col-md-6 -->

                            <div class="col-lg-4 col-md-6 ">
                                <div class="hotel_container">
                                    <div class="img_container">
                                        <a href="#">
                                            <img src="{{asset("front-end-assets/img/hotel_2.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                            <div class="ribbon top_rated">
                                            </div>
                                            <div class="score">
                                                <span>9.0</span>Superb
                                            </div>
                                            <div class="short_info hotel">
                                                From/Per night<span class="price"><sup>$</sup>45</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hotel_title">
                                        <h3><strong>Mariott</strong> Hotel</h3>
                                        <div class="rating">
                                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star-empty"></i>
                                        </div>
                                        <!-- end rating -->
                                        <div class="wishlist_close_admin">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <!-- End box -->
                            </div>
                            <!-- End col-md-6 -->

                            <div class="col-lg-4 col-md-6">
                                <div class="tour_container">
                                    <div class="img_container">
                                        <a href="#">
                                            <img src="{{asset("front-end-assets/img/tour_box_1.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                            <div class="ribbon top_rated">
                                            </div>
                                            <div class="short_info">
                                                <i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup>45</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="tour_title">
                                        <h3><strong>Arc Triomphe</strong> tour</h3>
                                        <div class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile"></i><small>(75)</small>
                                        </div>
                                        <!-- end rating -->
                                        <div class="wishlist_close_admin">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <!-- End box tour -->
                            </div>
                            <!-- End col-md-6 -->

                            <div class="col-lg-4 col-md-6">
                                <div class="tour_container">
                                    <div class="img_container">
                                        <a href="#">
                                            <img src="{{asset("front-end-assets/img/tour_box_3.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                            <div class="ribbon popular">
                                            </div>
                                            <div class="short_info">
                                                <i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup>45</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="tour_title">
                                        <h3><strong>Versailles</strong> tour</h3>
                                        <div class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile"></i><small>(75)</small>
                                        </div>
                                        <!-- end rating -->
                                        <div class="wishlist_close_admin">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <!-- End box tour -->
                            </div>
                            <!-- End col-md-6 -->

                            <div class="col-lg-4 col-md-6">
                                <div class="tour_container">
                                    <div class="img_container">
                                        <a href="#">
                                            <img src="{{asset("front-end-assets/img/tour_box_4.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                            <div class="ribbon popular">
                                            </div>
                                            <div class="short_info">
                                                <i class="icon_set_1_icon-30"></i>Walking tour<span class="price"><sup>$</sup>45</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="tour_title">
                                        <h3><strong>Pompidue</strong> tour</h3>
                                        <div class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile"></i><small>(75)</small>
                                        </div>
                                        <!-- end rating -->
                                        <div class="wishlist_close_admin">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <!-- End box tour -->
                            </div>
                            <!-- End col-md-6 -->

                            <div class="col-lg-4 col-md-6">
                                <div class="transfer_container">
                                    <div class="img_container">
                                        <a href="#">
                                            <img src="{{asset("front-end-assets/img/transfer_1.jpg")}}" width="800" height="533" class="img-fluid" alt="Image">
                                            <div class="ribbon top_rated">
                                            </div>
                                            <div class="short_info">
                                                From/Per person<span class="price"><sup>$</sup>45</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="transfer_title">
                                        <h3><strong>Orly Airport</strong> private</h3>
                                        <div class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile"></i><small>(75)</small>
                                        </div>
                                        <!-- end rating -->
                                        <div class="wishlist_close_admin">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <!-- End box tour -->
                            </div>
                            <!-- End col-md-6 -->

                        </div>
                        <!-- End row -->
                        <button type="submit" class="btn_1 green">Update wishlist</button>
                    </section>
                    <!-- End section 2 -->

                    <section id="section-3">
                        <div class="row">
                            <div class="col-md-6 add_bottom_30">
                                <h4>Change your password</h4>
                                <div class="form-group">
                                    <label>Old password</label>
                                    <input class="form-control" name="old_password" id="old_password" type="password">
                                </div>
                                <div class="form-group">
                                    <label>New password</label>
                                    <input class="form-control" name="new_password" id="new_password" type="password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm new password</label>
                                    <input class="form-control" name="confirm_new_password" id="confirm_new_password" type="password">
                                </div>
                                <button type="submit" class="btn_1 green">Update Password</button>
                            </div>
                            <div class="col-md-6 add_bottom_30">
                                <h4>Change your email</h4>
                                <div class="form-group">
                                    <label>Old email</label>
                                    <input class="form-control" name="old_password" id="old_password" type="password">
                                </div>
                                <div class="form-group">
                                    <label>New email</label>
                                    <input class="form-control" name="new_password" id="new_password" type="password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm new email</label>
                                    <input class="form-control" name="confirm_new_password" id="confirm_new_password" type="password">
                                </div>
                                <button type="submit" class="btn_1 green">Update Email</button>
                            </div>
                        </div>
                        <!-- End row -->

                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Notification settings</h4>
                                <table class="table table-striped options_cart">
                                    <tbody>
                                    <tr>
                                        <td style="width:10%">
                                            <i class="icon_set_1_icon-33"></i>
                                        </td>
                                        <td style="width:60%">
                                            New Citytours Tours
                                        </td>
                                        <td style="width:35%">
                                            <label class="switch-light switch-ios pull-right">
                                                <input type="checkbox" name="option_1" id="option_1" checked value="">
                                                <span>
													<span>No</span>
													<span>Yes</span>
													</span>
                                                <a></a>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="icon_set_1_icon-6"></i>
                                        </td>
                                        <td>
                                            New Citytours Hotels
                                        </td>
                                        <td>
                                            <label class="switch-light switch-ios pull-right">
                                                <input type="checkbox" name="option_2" id="option_2" value="">
                                                <span>
													<span>No</span>
													<span>Yes</span>
													</span>
                                                <a></a>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="icon_set_1_icon-26"></i>
                                        </td>
                                        <td>
                                            New Citytours Transfers
                                        </td>
                                        <td>
                                            <label class="switch-light switch-ios pull-right">
                                                <input type="checkbox" name="option_3" id="option_3" value="" checked>
                                                <span>
							<span>No</span>
													<span>Yes</span>
													</span>
                                                <a></a>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="icon_set_1_icon-81"></i>
                                        </td>
                                        <td>
                                            New Citytours special offers
                                        </td>
                                        <td>
                                            <label class="switch-light switch-ios pull-right">
                                                <input type="checkbox" name="option_4" id="option_4" value="">
                                                <span>
							<span>No</span>
													<span>Yes</span>
													</span>
                                                <a></a>
                                            </label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn_1 green">Update notifications settings</button>
                            </div>
                        </div>
                        <!-- End row -->
                    </section>
                    <!-- End section 3 -->

                    <section id="section-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Your profile</h4>
                                <ul id="profile_summary">
                                    <li>Username <span>info@clara.com</span>
                                    </li>
                                    <li>First name <span>Clara</span>
                                    </li>
                                    <li>Last name <span>Tomson</span>
                                    </li>
                                    <li>Phone number <span>+00 032 42366</span>
                                    </li>
                                    <li>Date of birth <span>13/04/1975</span>
                                    </li>
                                    <li>Street address <span>24 Rue de Rivoli</span>
                                    </li>
                                    <li>Town/City <span>Paris</span>
                                    </li>
                                    <li>Zip code <span>002843</span>
                                    </li>
                                    <li>Country <span>France</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <img src="{{asset("front-end-assets/img/tourist_guide_pic.jpg")}}" alt="Image" class="img-fluid styled profile_pic">
                                </p>
                            </div>
                        </div>
                        <!-- End row -->

                        <div class="divider"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Edit profile</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input class="form-control" name="first_name" id="first_name" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input class="form-control" name="last_name" id="last_name" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- End row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input class="form-control" name="email_2" id="email_2" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of birth <small>(dd/mm/yyyy)</small>
                                    </label>
                                    <input class="form-control" name="email" id="email" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- End row -->

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Edit address</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street address</label>
                                    <input class="form-control" name="first_name" id="first_name" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City/Town</label>
                                    <input class="form-control" name="last_name" id="last_name" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- End row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip code</label>
                                    <input class="form-control" name="email" id="email" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select id="country" class="form-control" name="country">
                                        <option value="">Select...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End row -->

                        <hr>
                        <h4>Upload profile photo</h4>
                        <div class="form-inline upload_1">
                            <div class="form-group">
                                <input type="file" name="files[]" id="js-upload-files" multiple>
                            </div>
                            <button type="submit" class="btn_1 green" id="js-upload-submit">Upload file</button>
                        </div>
                        <!-- Drop Zone -->
                        <h5>Or drag and drop files below</h5>
                        <div class="upload-drop-zone" id="drop-zone">
                            Just drag and drop files here
                        </div>
                        <!-- Progress Bar -->
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                        <!-- Upload Finished -->
                        <div class="js-upload-finished">
                            <h5>Processed files</h5>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
                            </div>
                        </div>
                        <!-- End Hidden on mobiles -->

                        <hr>
                        <button type="submit" class="btn_1 green">Update Profile</button>
                    </section>
                    <!-- End section 4 -->

                </div>
                <!-- End content -->
            </div>
            <!-- End tabs -->
        </div>
        <!-- end container -->
    </main>
    <!-- End main -->


@endsection


@section("vendor-js")


@endsection

@section("footer")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

        <!-- Specific scripts -->
        <script src="{{asset("front-end-assets/rtl/js/tabs.js")}}"></script>
        <script>
            new CBPFWTabs(document.getElementById('tabs'));
        </script>
        <script>
            $('.wishlist_close_admin').on('click', function (c) {
                $(this).parent().parent().parent().fadeOut('slow', function (c) {});
            });
        </script>


    @else
        <!-- Specific scripts -->
        <script src="{{asset("front-end-assets/ltr/js/tabs.js")}}"></script>
        <script>
            new CBPFWTabs(document.getElementById('tabs'));
        </script>
        <script>
            $('.wishlist_close_admin').on('click', function (c) {
                $(this).parent().parent().parent().fadeOut('slow', function (c) {});
            });
        </script>

    @endif


@endsection
