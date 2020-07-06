@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")


@endsection

@section("main")
    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("front-end-assets/img/header_bg.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>
                    {{__("theme.contact us")}}
                </h1>
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
            <div class="row">
                <div class="col-md-8">
                    <div class="form_title">
                        <h3><strong><i class="icon-pencil"></i></strong>Fill the form below</h3>
                        <p>
                            {{__("theme.lurem ipsum short")}}
                        </p>
                    </div>
                    <div class="step">

                        <div id="message-contact"></div>
                        <form method="post" action="#" id="contactform">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{__("theme.first name")}}</label>
                                        <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="{{__("theme.enter name")}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{__("theme.last name")}}</label>
                                        <input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="{{__("theme.enter last name")}}">
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{__("theme.email")}}</label>
                                        <input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="{{__("theme.enter email")}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{__("theme.phone")}}</label>
                                        <input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="{{__("theme.enter phone number")}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>{{__("theme.message")}}</label>
                                        <textarea rows="5" id="message_contact" name="message_contact" class="form-control" placeholder="{{__("theme.write your message")}}"
                                                  style="height:200px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Human verification</label>
                                    <input type="text" id="verify_contact" class=" form-control add_bottom_30" placeholder="Are you human? 3 + 1 =">

                                    <input type="submit" value="{{__("theme.submit")}}" class="btn_1" id="submit-contact">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End col-md-8 -->

                <div class="col-md-4">
                    <div class="box_style_1">
                        <span class="tape"></span>
                        <h4>{{__("theme.address")}} <span><i class="icon-pin pull-right"></i></span></h4>
                        <p>
                            {{__("theme.temp address")}}
                        </p>
                        <hr>
                        <h4>
                            {{__("theme.help center")}}
                            <span><i class="icon-help pull-right"></i></span></h4>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                        <ul id="contact-info">
                            <li>+ 61 (2) 8093 3400 / + 61 (2) 8093 3402</li>
                            <li><a href="#">info@domain.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="box_style_4">
                        <i class="icon_set_1_icon-57"></i>
                        <h4><span>{{__("theme.need help")}}</span></h4>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                        <small>{{__("theme.support time")}}</small>
                    </div>
                </div>
                <!-- End col-md-4 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->

        <div id="map_contact"></div>
        <!-- end map-->
        <div id="directions">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="http://maps.google.com/maps" method="get" target="_blank">
                            <div class="input-group">
                                <input type="text" name="saddr" placeholder="Enter your starting point" class="form-control style-2"/>
                                <input type="hidden" name="daddr" value="New York, NY 11430"/>
                                <!-- Write here your end point -->
                                <span class="input-group-btn">
								<button class="btn" type="submit" value="Get directions" style="margin-left:0;">GET DIRECTIONS</button>
								</span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end directions-->
    </main>
    <!-- End main -->



@endsection


@section("vendor-js")


@endsection

@section("footer")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

        <!-- Specific scripts -->
        <script src="assets/validate.js"></script>
        <script src="../../maps.googleapis.com/maps/api/js_3.JS"></script>
        <script src="js/map_contact.js"></script>
        <script src="js/infobox.js"></script>



    @else

        <!-- Specific scripts -->
        <script src="assets/validate.js"></script>
        <script src="../maps.googleapis.com/maps/api/js_2.JS"></script>
        <script src="js/map_contact.js"></script>
        <script src="js/infobox.js"></script>


    @endif


@endsection
