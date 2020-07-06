@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")


@endsection

@section("main")
    <main>
        <section id="hero" class="login">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                        <div id="login">
                            <div class="text-center"><img src="{{asset("front-end-assets/img/logo_sticky.png")}}" alt="Image" data-retina="true"></div>
                            <hr>
                            <form>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class=" form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class=" form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class=" form-control" id="password1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" class=" form-control" id="password2" placeholder="Confirm password">
                                </div>
                                <div id="pass-info" class="clearfix"></div>
                                <button class="btn_full">Create an account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End main -->


@endsection


@section("vendor-js")


@endsection

@section("footer")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

        <!-- Specific scripts -->
        <script src="{{asset("front-end-assets/rtl/js/pw_strenght.js")}}"></script>


    @else
        <!-- Specific scripts -->
        <script src="{{asset("front-end-assets/ltr/js/pw_strenght.js")}}"></script>

    @endif


@endsection
