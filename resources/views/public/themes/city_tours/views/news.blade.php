@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")
    @if(in_array(App::getLocale(),config('base.rtl_locales')))

    @else

    @endif



@endsection

@section("main")

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('front-end-assets/img/header_bg.jpg')}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>General page</h1>
                <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
            </div>
        </div>
    </section>
    <!-- End Section -->

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

        <div class="container margin_60">
            <div class="main_title">
                <h2>Some <span>Paris </span>tips for travellers</h2>
                <p>
                    Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                </p>
            </div>
            <hr>
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-5">
                    <img src="{{asset('front-end-assets/img/tour_box_13.jpg')}}" alt="Image" class="img-fluid styled">
                </div>
                <div class="col-lg-7 col-md-7">
                    <h3>Paris <span>nice places</span></h3>
                    <p>
                        Ludus albucius <strong>adversarium eam eu</strong>. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri
                        suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo.
                    </p>
                    <h4>Mel at vide soluta </h4>
                    <p>
                        Ad cum movet fierent assueverit, mei stet legere ne. Mel at vide soluta, ut utamur antiopam inciderint sed. Ut iriure perpetua voluptaria has, vim postea
                        denique in, <strong>mollis pertinax elaboraret</strong> sed in. Per no vidit timeam, quis omittam sed at. Ludus albucius adversarium eam eu. Sit eu reque tation
                        aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae.
                    </p>
                    <h4>Don't forget</h4>
                    <p>
                        Ad cum movet fierent assueverit, mei stet legere ne. Mel at vide soluta, ut <a href="#">utamur antiopam inciderint</a> sed. Ut iriure perpetua
                        voluptaria has, vim postea denique in, mollis pertinax elaboraret sed in. Per no vidit timeam, quis omittam sed at.
                    </p>
                    <div class="general_icons">
                        <ul>
                            <li><i class="icon_set_1_icon-34"></i>Camera</li>
                            <li><i class="icon_set_1_icon-31"></i>Video camera</li>
                            <li><i class="icon_set_1_icon-35"></i>Credit cards</li>
                            <li><i class="icon_set_1_icon-63"></i>Mobile</li>
                            <li><i class="icon_set_1_icon-33"></i>Travel bag</li>
                            <li><i class="icon_set_1_icon-9"></i>Snack</li>
                            <li><i class="icon_set_1_icon-37"></i>Map</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <hr>
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-5">
                    <img src="{{asset('front-end-assets/img/tour_box_11.jpg')}}" alt="Image" class="img-fluid styled">
                </div>
                <div class="col-lg-7 col-md-7">
                    <h3>Paris <span>magic moments</span></h3>
                    <p>
                        Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne
                        legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo.
                    </p>
                    <h4>Mel at vide soluta </h4>
                    <p>
                        Ad cum movet fierent assueverit, mei stet legere ne. <strong>Mel at vide soluta</strong>, ut utamur antiopam inciderint sed. Ut iriure perpetua voluptaria has,
                        vim postea denique in, mollis pertinax elaboraret sed in. Per no vidit timeam, quis omittam sed at. Ludus albucius adversarium eam eu. Sit eu reque tation
                        aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae.
                    </p>
                    <h4>Per no vidit timeam</h4>
                    <p>
                        Ad cum movet fierent assueverit, mei stet legere ne. Mel at vide soluta, ut utamur antiopam inciderint sed. Ut iriure perpetua voluptaria has, vim postea
                        denique in, mollis pertinax elaboraret sed in. Per no vidit timeam, quis omittam sed at. <strong>Ludus albucius adversarium</strong> eam eu. Sit eu reque tation
                        aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae.
                    </p>
                </div>
            </div>
            <!-- End row -->
            <hr>
            <div class="row justify-content-between add_bottom_30">
                <div class="col-lg-4 col-md-5 text-center">
                    <img src="{{asset('front-end-assets/img/bag.png')}}" alt="Image">
                </div>
                <div class="col-lg-7 col-md-7">
                    <h3>Do not <span>Forget</span></h3>
                    <p>
                        Ludus albucius <strong>adversarium eam eu</strong>. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri
                        suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo.
                    </p>
                    <h4>Mel at vide soluta </h4>
                    <p>
                        Ad cum movet fierent assueverit, mei stet legere ne. Mel at vide soluta, ut utamur antiopam inciderint sed. Ut iriure perpetua voluptaria has, vim postea
                        denique in, <strong>mollis pertinax elaboraret</strong> sed in. Per no vidit timeam, quis omittam sed at. Ludus albucius adversarium eam eu. Sit eu reque tation
                        aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae.
                    </p>
                    <h4>Per no vidit timeam</h4>
                    <p>
                        Ad cum movet fierent assueverit, mei stet legere ne. Mel at vide soluta.
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list_ok">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>No scripta electram necessitatibus sit</li>
                                <li>Quidam percipitur instructior an eum</li>
                                <li>Ut est saepe munere ceteros</li>
                                <li>No scripta electram necessitatibus sit</li>
                                <li>Quidam percipitur instructior an eum</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list_ok">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>No scripta electram necessitatibus sit</li>
                                <li>Quidam percipitur instructior an eum</li>
                                <li>No scripta electram necessitatibus sit</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End row  -->
                </div>
            </div>
            <!-- End row -->

            <hr class="add_bottom_45">

            <div class="main_title">
                <h2><span>Weather </span>forecast in Paris</h2>
                <p>
                    Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                </p>
            </div>
            <div id="weather" class="clearfix"></div>
            <!-- Weather widget -->

        </div>
        <!-- End container -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 nopadding features-intro-img">
                    <div class="features-bg">
                        <div class="features-img">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 nopadding">
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
        <!-- End container-fluid -->
    </main>
    <!-- End main -->




@endsection


@section("vendor-js")


@endsection

@section("footer")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

    @else

        <script src="{{asset('front-end-assets/ltr/js/jquery.simpleWeather.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $.simpleWeather({
                    location: 'Paris, France',
                    woeid: '',
                    unit: 'c',
                    success: function (weather) {
                        html = '<h4><i class="weathericon-' + weather.code + '"></i> ' + weather.temp + '&deg;' + weather.units.temp + '</h4>';
                        html += '<ul><li>' + weather.city + ', ' + weather.region + '</li>';
                        html += '<li class="currently">' + weather.currently + '</li>';
                        html += '<li>' + weather.wind.direction + ' ' + weather.wind.speed + ' ' + weather.units.speed + '</li></ul>';

                        for (var i = 0; i < weather.forecast.length; i++) {
                            html += '<span class="details_forecast">' + weather.forecast[i].day + ': ' + weather.forecast[i].high + '</span>';
                        }

                        $("#weather").html(html);
                    },
                    error: function (error) {
                        $("#weather").html('<p>' + error + '</p>');
                    }
                });
            });
        </script>

    @endif


@endsection
