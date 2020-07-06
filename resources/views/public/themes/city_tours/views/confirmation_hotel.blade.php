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

                <div class="col-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum">{{__("theme.your details")}}</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route("home.checkout")}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-4 bs-wizard-step complete">
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
                        <h3><strong><i class="icon-ok"></i></strong>
                            {{__("theme.thank you")}}
                        </h3>
                        <p>
                            {{__("theme.lurem ipsum short")}}
                        </p>
                    </div>
                    <div class="step">
                        <p>

                            {{__("theme.lurem ipsum 1 paragraph")}}
                        </p>
                    </div>
                    <!--End step -->

                    <div class="form_title">
                        <h3><strong><i class="icon-tag-1"></i></strong>

                            {{__("theme.booking summary")}}
                        </h3>
                        <p>
                            {{__("theme.lurem ipsum short")}}
                        </p>
                    </div>
                    <div class="step">
                        <table class="table table-striped confirm">
                            <tbody>
                            <tr>
                                <td>
                                    <strong>{{__("theme.name")}}</strong>
                                </td>
                                <td>
                                    Jhon Doe
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>{{__("theme.check in")}}</strong>
                                </td>
                                <td>
                                    10 April 2015
                                </td>
                            </tr>
                            <tr>
                                <td><strong>{{__("theme.check out")}}</strong>
                                </td>
                                <td>
                                    12 April 2015
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>{{__("theme.rooms")}}</strong>
                                </td>
                                <td>1 double room</td>
                            </tr>
                            <tr>
                                <td><strong>{{__("theme.nights")}}</strong>
                                </td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td><strong>{{__("theme.adults")}}</strong>
                                </td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td><strong>{{__("theme.children")}}</strong>
                                </td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>{{__("theme.payment type")}}</strong>
                                </td>
                                <td>
                                    Credit card
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>{{__("theme.total cost")}}</strong>
                                </td>
                                <td>
                                    $154
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--End step -->
                </div>
                <!--End col -->

                <aside class="col-lg-4">
                    <div class="box_style_1">
                        <h3 class="inner">
                            {{__("theme.thank you")}}
                        </h3>
                        <p>
                            {{__("theme.lurem ipsum 1 sentence")}}

                        </p>
                        <hr>
                        <a class="btn_full_outline" href="#" target="_blank">{{__("theme.view your invoice")}}</a>
                    </div>
                    <div class="box_style_4">
                        <i class="icon_set_1_icon-89"></i>
                        <h4>{{__("theme.need help")}}</span></h4>
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

@endsection

@section("footer")


@endsection
