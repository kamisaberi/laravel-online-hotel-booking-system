@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

    @else

    @endif

@endsection

@section("main")
    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("front-end-assets/img/tourist_guide.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>I am Madlene</h1>
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
            <div id="tour_guide">
                <p>
                    <img src="{{asset("front-end-assets/img/tourist_guide_pic.jpg")}}" alt="Image" class="rounded-circle styled">
                </p>
                <h2>Madlene - Certified tourist guide</h2>
                <p class="lead add_bottom_30">
                    "Eu tota moderatius usu, ad putant aliquando constituam ius, <strong>commodo sententiae</strong> suscipiantur nam eu. Tamquam nominati abhorreant at vis, has id
                    harum melius petentium. Mea wisi debet omnium ne, est ea graecis noluisse recusabo, denique deterruisset ius et."
                </p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>Some words about me</h3>
                    <p>
                        Lorem ipsum dolor sit amet, ex justo nominavi eum, cu veniam salutatus reprimique quo, nisl virtute meliore ei eos. Quaestio consequat sed no, urbanitas
                        honestatis ei usu. Ex nec aliquid appetere petentium, ei eum soleat possim. Has ea omnes prompta. Vel te magna voluptaria, cu nec fabulas voluptatum, has et
                        dictas quaeque labores. Qui ex mazim sadipscing.
                    </p>
                    <h5>Education</h5>
                    <p>
                        Lorem ipsum dolor sit amet, ex justo nominavi eum, cu veniam salutatus reprimique quo, nisl virtute meliore ei eos. Quaestio consequat sed no, urbanitas
                        honestatis ei usu. Ex nec aliquid appetere petentium, ei eum soleat possim. Has ea omnes prompta. Vel te magna voluptaria, cu nec fabulas voluptatum, has et
                        dictas quaeque labores. Qui ex mazim sadipscing.
                    </p>
                    <h5>Past experiences</h5>
                    <p>
                        Lorem ipsum dolor sit amet, ex justo nominavi eum, cu veniam salutatus reprimique quo, nisl virtute meliore ei eos. Quaestio consequat sed no, urbanitas
                        honestatis ei usu. Ex nec aliquid appetere petentium, ei eum soleat possim. Has ea omnes prompta. Vel te magna voluptaria, cu nec fabulas voluptatum, has et
                        dictas quaeque labores. Qui ex mazim sadipscing.
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Spoken languages</h3>
                    <p>
                        Eu tota moderatius usu, ad putant aliquando constituam ius, commodo sententiae suscipiantur nam eu.
                    </p>
                    <p>
                        <img src="{{asset("front-end-assets/img/lang_en.png")}}" width="40" height="26" alt="Image" data-retina="true">
                        <img src="{{asset("front-end-assets/img/lang_fr.png")}}" width="40" height="26" alt="Image"
                                                                                                               data-retina="true">
                        <img src="{{asset("front-end-assets/img/lang_de.png")}}" width="40" height="26" alt="Image" data-retina="true">
                        <img src="{{asset("front-end-assets/img/lang_es.png")}}" width="40" height="26" alt="Image"
                                                                                                               data-retina="true">
                    </p>
                    <h3><i class=""></i>Certificates</h3>
                    <p>
                        Eu tota moderatius usu, ad putant aliquando constituam ius, commodo sententiae suscipiantur nam eu.
                    </p>
                    <ul class="list_ok">
                        <li>Putant aliquando constituam</li>
                        <li>Commodo sententiae</li>
                        <li>Denique deterruisset</li>
                        <li>Putant aliquando constituam</li>
                    </ul>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 nopadding features-intro-img">
                    <div class="features-bg">
                        <div class="features-img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 nopadding">
                    <div class="features-content">
                        <h3>"Ex vero mediocrem"</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada
                            fames ac ante ipsum primis in faucibus.
                        </p>
                        <p>
                            <a href="#" class=" btn_1 white">Read more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container margin_60">
            <div class="main_title">
                <h2>What <span>customers </span>says</h2>
                <p>
                    Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="review_strip">
                        <img src="{{asset("front-end-assets/img/avatar1.jpg")}}" alt="Image" class="rounded-circle">
                        <h4>Jhon Doe</h4>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada
                            fames ac ante ipsum primis in faucibus."
                        </p>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i
                                class=" icon-star-empty"></i>
                        </div>
                    </div>
                    <!-- End review strip -->
                </div>

                <div class="col-md-6">
                    <div class="review_strip">
                        <img src="{{asset("front-end-assets/img/avatar2.jpg")}}" alt="Image" class="rounded-circle">
                        <h4>Mark Schulz</h4>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada
                            fames ac ante ipsum primis in faucibus."
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
                <div class="col-md-6">
                    <div class="review_strip">
                        <img src="{{asset("front-end-assets/img/avatar3.jpg")}}" alt="Image" class="rounded-circle">
                        <h4>Tony Costello</h4>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada
                            fames ac ante ipsum primis in faucibus."
                        </p>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i
                                class=" icon-star-empty"></i>
                        </div>
                    </div>
                    <!-- End review strip -->
                </div>

                <div class="col-md-6">
                    <div class="review_strip">
                        <img src="{{asset("front-end-assets/img/avatar1.jpg")}}" alt="Image" class="rounded-circle">
                        <h4>Peter Gabriel</h4>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada
                            fames ac ante ipsum primis in faucibus."
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
        </div>
        <!-- End container -->
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
