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
                <h1>
                    {{__("theme.gallery page")}}
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
            <div class="main_title">
                <h2><span>{{__('theme.galleries')}}</span></h2>
                <p>
                    {{__('theme.lurem ipsum 1 line')}}
                </p>
            </div>
            <hr>
            <div class="row add_bottom_60 ">
                @foreach($galleries as $gallery)
                    <div class="col-sm-4">
                        <div class="img_wrapper_gallery">
                            <div class="img_container_gallery">
                                <a href="{{route('home.gallery.show' , ['id'=>$gallery->id])}}" title="Photo title" data-effect="mfp-zoom-in">
                                    <img src="{{asset('front-end-assets/img/notredame.jpg')}}" alt="Image" class="img-fluid">
                                    <i class="icon-resize-full-2"></i>
                                </a>
                            </div>
                        </div>
                        <h3 class="text-center">{{$gallery->title}}</h3>
                    </div>
                @endforeach
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
