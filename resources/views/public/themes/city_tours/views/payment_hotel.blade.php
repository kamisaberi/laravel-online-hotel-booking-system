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

                <div class="col-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum">{{__("theme.your cart")}}</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route("home.cart")}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-4 bs-wizard-step active">
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
        @include("public.themes.city_tours.widgets.breadcrumbs")

        <!-- End position -->

        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8 add_bottom_15">
                    <div class="form_title">
                        <h3><strong>1</strong>{{__("theme.your details")}}</h3>
                        <p>
                            {{__("theme.lurem ipsum short")}}
                        </p>
                    </div>
                    <div class="step">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control" id="firstname_booking" name="firstname_booking">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" id="lastname_booking" name="lastname_booking">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="email_booking" name="email_booking" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm email</label>
                                    <input type="email" id="email_booking_2" name="email_booking_2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input type="text" id="telephone_booking" name="telephone_booking" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End step -->

                    <div class="form_title">
                        <h3><strong>2</strong>{{__("theme.payment information")}}</h3>
                        <p>
                            {{__("theme.lurem ipsum short")}}
                        </p>
                    </div>
                    <div class="step">
                        <div class="form-group">
                            <label>Name on card</label>
                            <input type="text" class="form-control" id="name_card_bookign" name="name_card_bookign">
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Card number</label>
                                    <input type="text" id="card_number" name="card_number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <img src="{{asset("front-end-assets/img/cards.png")}}" width="207" height="43" alt="Cards" class="cards">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Expiration date</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="expire_month" name="expire_month" class="form-control" placeholder="MM">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="expire_year" name="expire_year" class="form-control" placeholder="Year">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Security code</label>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <input type="text" id="ccv" name="ccv" class="form-control" placeholder="CCV">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <img src="{{asset("front-end-assets/img/icon_ccv.gif")}}" width="50" height="29" alt="ccv"><small>Last 3 digits</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row -->

                        <hr>

                        <h4>
                            {{__("theme.or checkout with Paypal")}}
                        </h4>
                        <p>

                            {{__("theme.lurem ipsum 1 sentence")}}
                        </p>
                        <p>
                            <img src="{{asset("front-end-assets/img/paypal_bt.png")}}" alt="Image">
                        </p>
                    </div>
                    <!--End step -->

                    <div class="form_title">
                        <h3><strong>3</strong>Billing Address</h3>
                        <p>
                            {{__("theme.lurem ipsum short")}}
                        </p>
                    </div>
                    <div class="step">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" name="country" id="country">
                                        <option value="" selected>Select your country</option>
                                        <option value="Europe">Europe</option>
                                        <option value="United states">United states</option>
                                        <option value="Asia">Asia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Street line 1</label>
                                    <input type="text" id="street_1" name="street_1" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Street line 2</label>
                                    <input type="text" id="street_2" name="street_2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" id="city_booking" name="city_booking" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" id="state_booking" name="state_booking" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label>Postal code</label>
                                    <input type="text" id="postal_code" name="postal_code" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!--End row -->
                    </div>
                    <!--End step -->

                    <div id="policy">
                        <h4>
                            {{__("theme.cancellation policy")}}
                        </h4>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="policy_terms" id="policy_terms">
                                {{__("theme.i accept terms and conditions and general policy.")}}
                            </label>
                        </div>
                        <a href="{{route("home.confirmation")}}" class="btn_1 green medium">{{__("theme.payout")}}</a>
                    </div>
                </div>

                <aside class="col-lg-4">
                    <div class="box_style_1">
                        <h3 class="inner">- {{__("theme.summary")}} -</h3>
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
                                    {{__("theme.nights")}}
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
                        <a class="btn_full" href="{{route("home.confirmation")}}">{{__("theme.payout")}}</a>
                        <a class="btn_full_outline" href="#"><i class="icon-right"></i> {{__("theme.modify your search")}}</a>
                    </div>
                    <div class="box_style_4">
                        <i class="icon_set_1_icon-57"></i>
                        <h4> <span>{{__("theme.need help")}}</span></h4>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                        <small>{{__("theme.support time")}}</small>
                    </div>
                </aside>

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
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-grey',
                radioClass: 'iradio_square-grey'
            });
        </script>

    @else
        <script>
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-grey',
                radioClass: 'iradio_square-grey'
            });
        </script>


    @endif

@endsection

@section("footer")


@endsection
