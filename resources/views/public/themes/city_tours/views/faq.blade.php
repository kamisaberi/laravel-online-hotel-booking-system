@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")


@endsection

@section("main")

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("front-end-assets/img/home_bg_1.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>Frequently questions</h1>
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
        <!-- Position -->

        <div class="container margin_60">
            <div class="row">
                <aside class="col-lg-3" id="sidebar">
                    <div class="theiaStickySidebar">
                        <div class="box_style_cat" id="faq_box">
                            <ul id="cat_nav">
                                <li><a href="#payment" class="active"><i class="icon_set_1_icon-95"></i>Payments</a>
                                </li>
                                <li><a href="#tips"><i class="icon_set_1_icon-95"></i>Suggestions and tips</a>
                                </li>
                                <li><a href="#reccomendations"><i class="icon_set_1_icon-95"></i>Travel reccomendations</a>
                                </li>
                                <li><a href="#terms"><i class="icon_set_1_icon-95"></i>Terms and conditons</a>
                                </li>
                                <li><a href="#booking"><i class="icon_set_1_icon-95"></i>Booking and vouchers</a>
                                </li>
                                <li><a href="#transfers"><i class="icon_set_1_icon-95"></i>Transfers</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--End sticky -->
                </aside>
                <!--End aside -->
                <div class="col-lg-9" id="faq">
                    <h3 class="nomargin_top">Payments</h3>
                    <div id="payment" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseOne_payment">Anim pariatur cliche
                                        reprehenderit?<i class="indicator icon-minus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_payment" class="collapse show" data-parent="#payment">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseTwo_payment">Parsnip lotus root celery?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo_payment" class="collapse" data-parent="#payment">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseThree_payment">Beet greens peanut salad?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree_payment" class="collapse" data-parent="#payment">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End payment -->

                    <h3>Suggestions and tips</h3>
                    <div id="tips" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#tips" href="#collapseOne_tips">Anim pariatur cliche reprehenderit?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_tips" class="collapse" data-parent="#tips">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#tips" href="#collapseTwo_tips">Parsnip lotus root celery?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo_tips" class="collapse" data-parent="#tips">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#tips" href="#collapseThree_tips">Beet greens peanut salad?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree_tips" class="collapse" data-parent="#tips">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End tips -->

                    <h3>Travel reccomendations</h3>
                    <div id="reccomendations" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#reccomendations" href="#collapseOne_reccomendations">Anim pariatur cliche
                                        reprehenderit?<i class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_reccomendations" class="collapse" data-parent="#reccomendations">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#reccomendations" href="#collapseTwo_reccomendations">Parsnip lotus root
                                        celery?<i class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo_reccomendations" class="collapse" data-parent="#reccomendations">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#reccomendations" href="#collapseThree_reccomendations">Beet greens peanut
                                        salad?<i class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree_reccomendations" class="collapse" data-parent="#reccomendations">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End reccomendations -->

                    <h3>Terms and conditions</h3>
                    <div id="terms" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#terms" href="#collapseOne_terms">Anim pariatur cliche reprehenderit?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_terms" class="collapse" data-parent="#terms">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#terms" href="#collapseTwo_terms">Parsnip lotus root celery?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo_terms" class="collapse" data-parent="#terms">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#terms" href="#collapseThree_terms">Beet greens peanut salad?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree_terms" class="collapse" data-parent="#terms">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End terms -->

                    <h3>Booking and vouchers</h3>
                    <div id="booking" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#booking" href="#collapseOne_booking">Anim pariatur cliche
                                        reprehenderit?<i class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_booking" class="collapse" data-parent="#booking">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#booking" href="#collapseTwo_booking">Parsnip lotus root celery?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo_booking" class="collapse" data-parent="#booking">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#booking" href="#collapseThree_booking">Beet greens peanut salad?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree_booking" class="collapse" data-parent="#booking">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End booking -->

                    <h3>Transfers</h3>
                    <div id="transfers" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#transfers" href="#collapseOne_transfers">Anim pariatur cliche
                                        reprehenderit?<i class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_transfers" class="collapse" data-parent="#transfers">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#transfers" href="#collapseTwo_transfers">Parsnip lotus root celery?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo_transfers" class="collapse" data-parent="#transfers">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#transfers" href="#collapseThree_transfers">Beet greens peanut salad?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree_transfers" class="collapse" data-parent="#transfers">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End transfers -->

                    <h3>Pricing</h3>
                    <div id="pricing" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#pricing" href="#collapseOne_pricing">Anim pariatur cliche
                                        reprehenderit?<i class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_pricing" class="collapse" data-parent="#pricing">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#pricing" href="#collapseTwo_pricing">Parsnip lotus root celery?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo_pricing" class="collapse" data-parent="#pricing">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#pricing" href="#collapseThree_pricing">Beet greens peanut salad?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree_pricing" class="collapse" data-parent="#pricing">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End pricing -->

                    <h3>Privacy</h3>
                    <div id="privacy" class="accordion_styled">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#privacy" href="#collapseOne_privacy">Anim pariatur cliche
                                        reprehenderit?<i class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseOne_privacy" class="collapse" data-parent="#privacy">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#privacy" href="faq_2.html#collapseTwo_privacy">Parsnip lotus root celery?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo_privacy" class="collapse" data-parent="#privacy">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#privacy" href="#collapseThree_privacy">Beet greens peanut salad?<i
                                            class="indicator icon-plus float-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree_privacy" class="collapse" data-parent="#privacy">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                    labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End privacy -->
                </div>
                <!-- End col lg-9 -->
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


        <script src="{{asset("front-end-assets/rtl/js/theia-sticky-sidebar.js")}}"></script>
        <script>
            jQuery('#sidebar').theiaStickySidebar({
                additionalMarginTop: 80
            });
        </script>
        <script>
            $('#faq_box a[href^="#"]').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
                    || location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top -115
                        }, 800);
                        return false;
                    }
                }
            });
        </script>



    @else

        <!-- Specific scripts -->
        <!-- Fixed sidebar -->
        <script src="{{asset("front-end-assets/ltr/js/theia-sticky-sidebar.js")}}"></script>
        <script>
            jQuery('#sidebar').theiaStickySidebar({
                additionalMarginTop: 80
            });
        </script>
        <script>
            $('#faq_box a[href^="#"]').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
                    || location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top -115
                        }, 800);
                        return false;
                    }
                }
            });
        </script>

    @endif


@endsection
