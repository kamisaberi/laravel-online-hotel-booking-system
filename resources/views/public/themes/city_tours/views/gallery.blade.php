@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

    @else

    @endif

@endsection

@section("main")
    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("front-end-assets/img/header_bg.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>Gallery page</h1>
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
                <h2><span>{{$gallery->title}}</span> </h2>
                <p>
                    {{$gallery->description}}
                </p>
            </div>
            <hr>
            <div class="row magnific-gallery add_bottom_60 ">

                @foreach($gallery->images as $image)
                    <div class="col-md-3 col-sm-6">
                        <div class="img_wrapper_gallery">
                            <div class="img_container_gallery">
                                <a href="{{$image->path}}" title="Photo title" data-effect="mfp-zoom-in">
                                    <img src="{{$image->path}}" alt="Image" class="img-fluid">
                                    <i class="icon-resize-full-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
            <!-- End row -->
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
