@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")


@endsection

@section("main")

    <section id="hero_2">
        <div class="intro_title">
            <h1>Place your order</h1>
            <div class="bs-wizard row">

                <div class="col-4 bs-wizard-step active">
                    <div class="text-center bs-wizard-stepnum">{{__("theme.your cart")}}</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route("home.cart")}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-4 bs-wizard-step disabled">
                    <div class="text-center bs-wizard-stepnum">{{__("theme.your details")}}</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route("home.checkout")}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-4 bs-wizard-step disabled">
                    <div class="text-center bs-wizard-stepnum">{{__("theme.finish")}}</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route("home.confirmation")}}" class="bs-wizard-dot"></a>
                </div>

            </div>
            <!-- End bs-wizard -->
        </div>
        <!-- End intro-title -->
    </section>
    <!-- End Section hero_2 -->
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
        <!-- End position -->


        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8">
                    <div class="alert alert-info" role="alert"><strong>Rooms available</strong> for the selected dates.
                        <br>PLEASE SELECT YOUR QUANTITY.
                    </div>
                    <table class="table table-striped cart-list add_bottom_30">
                        <thead>
                        <tr>
                            <th>
                                Room Type
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Per night
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <a href="#" data-toggle="modal" data-target="#modal_single_room"><img src="{{asset("front-end-assets/img/thumb_cart_1.jpg")}}" alt="Image">
                                    </a>
                                </div>
                                <span class="item_cart"><a href="#" data-toggle="modal" data-target="#modal_single_room">Single Room</a></span>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="0" id="quantity_1" class="qty2 form-control" name="quantity_1">
                                </div>
                            </td>
                            <td>
                                <strong>€80</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <a href="#" data-toggle="modal" data-target="#modal_double_room"><img src="{{asset("front-end-assets/img/thumb_cart_1.jpg")}}" alt="Image">
                                    </a>
                                </div>
                                <span class="item_cart"><a href="#" data-toggle="modal" data-target="#modal_double_room">Double room</a></span>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" value="0" id="quantity_2" class="qty2 form-control" name="quantity_2">
                                </div>
                            </td>
                            <td>
                                <strong>€130</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped options_cart">
                        <thead>
                        <tr>
                            <th colspan="3">
                                Add options / Services
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <i class="icon_set_1_icon-26"></i>
                            </td>
                            <td>
                                Pick up service <strong>+$34*</strong>
                            </td>
                            <td>
                                <label class="switch-light switch-ios float-right">
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
                                <i class="icon_set_1_icon-15"></i>
                            </td>
                            <td>
                                Welcome bottle <strong>+$24</strong>
                            </td>
                            <td>
                                <label class="switch-light switch-ios float-right">
                                    <input type="checkbox" name="option_4" id="option_4" value="" checked>
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
                                <i class="icon_set_1_icon-59"></i>
                            </td>
                            <td>
                                Coffe break <strong>+$12*</strong>
                            </td>
                            <td>
                                <label class="switch-light switch-ios float-right">
                                    <input type="checkbox" name="option_5" id="option_5" value="" checked>
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
                                <i class="icon_set_1_icon-58"></i>
                            </td>
                            <td>
                                Dinner <strong>+$26*</strong>
                            </td>
                            <td>
                                <label class="switch-light switch-ios float-right">
                                    <input type="checkbox" name="option_6" id="option_6" value="">
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
                                <i class="icon_set_1_icon-40"></i>
                            </td>
                            <td>
                                Bike rent <strong>+$26*</strong>
                            </td>
                            <td>
                                <label class="switch-light switch-ios float-right">
                                    <input type="checkbox" name="option_7" id="option_7" value="">
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
                    <div class="add_bottom_15"><small>* Prices for person.</small>
                    </div>
                </div>
                <!-- End col-lg-8 -->

                <aside class="col-lg-4">
                    <div class="box_style_1">
                        <h3 class="inner">- Summary -</h3>
                        <table class="table table_summary">
                            <tbody>
                            <tr>
                                <td>
                                    {{__("theme.check in")}}
                                </td>
                                <td class="text-right">
                                    10 April 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{__("theme.check out")}}
                                </td>
                                <td class="text-right">
                                    12 April 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{__("theme.rooms")}}
                                </td>
                                <td class="text-right">
                                    1 double room
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{__("theme.rooms")}}
                                </td>
                                <td class="text-right">
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{__("theme.adults")}}
                                </td>
                                <td class="text-right">
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{__("theme.children")}}
                                </td>
                                <td class="text-right">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{__("theme.welcome bottle")}}
                                </td>
                                <td class="text-right">
                                    $34
                                </td>
                            </tr>
                            <tr class="total">
                                <td>
                                    {{__("theme.total cost")}}
                                </td>
                                <td class="text-right">
                                    $154
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a class="btn_full" href="{{route("home.checkout")}}">{{__("theme.payout")}}</a>
                        <a class="btn_full_outline" href="#"><i class="icon-right"></i> {{__("theme.modify your search")}}</a>
                    </div>
                    <div class="box_style_4">
                        <i class="icon_set_1_icon-57"></i>
                        <h4><span>{{__("theme.need help")}}</span></h4>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                        <small>{{__("theme.support time")}}</small>
                    </div>
                </aside>
                <!-- End aside -->

            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </main>
    <!-- End main -->


@endsection


@section("vendor-js")


    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <script>
            $('.carousel-thumbs').owlCarousel({
                loop: true,
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
                        nav: false,
                        loop: false
                    }
                }
            });

        </script>
    @else
        <script>
            $('.carousel-thumbs').owlCarousel({
                loop: true,
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
                        nav: false,
                        loop: false
                    }
                }
            });
        </script>
    @endif

@endsection

@section("footer")


@endsection
