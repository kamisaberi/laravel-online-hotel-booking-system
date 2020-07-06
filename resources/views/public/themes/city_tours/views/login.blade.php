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
                                <a href="#0" class="social_bt facebook">Login with Facebook</a>
                                <a href="#0" class="social_bt google">Login with Google</a>
                                <div class="divider"><span>Or</span></div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class=" form-control " placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class=" form-control" placeholder="Password">
                                </div>
                                <p class="small">
                                    <a href="#">Forgot Password?</a>
                                </p>
                                <a href="#" class="btn_full">Sign in</a>
                                <a href="#" class="btn_full_outline">Register</a>
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



    @else

    @endif


@endsection
