@extends("public.themes.city_tours.layout.public")

@section("vendor-css")


@endsection

@section("header")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))

        <!-- SPECIFIC CSS -->
        <link href="{{asset("front-end-assets/css/blog.css")}}" rel="stylesheet">
        <link href="{{asset("front-end-assets/css/blog-rtl.css")}}" rel="stylesheet">

    @else
        <!-- SPECIFIC CSS -->
        <link href="{{asset("front-end-assets/css/blog.css")}}" rel="stylesheet">

    @endif


@endsection

@section("main")
    <section class="parallax-window" data-parallax="scroll" data-image-src="{{asset("front-end-assets/img/bg_blog.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>
                    {{__("theme.news")}}
                </h1>
                <p>
                    {{__("theme.lurem ipsum 1 line")}}
                </p>
            </div>
        </div>
    </section>
    <!-- End section -->

    <main>
        @include("public.themes.city_tours.widgets.breadcrumbs")
        <!-- End position -->

        <div class="container margin_60">
            <div class="row">

                <div class="col-lg-9">
                    <div class="box_style_1">

                        @foreach($newses as $news )
                            <div class="post">
                                <a href="#"><img src="{{asset("front-end-assets/img/blog-3.jpg")}}" alt="Image" class="img-fluid">
                                </a>
                                <div class="post_info clearfix">
                                    <div class="post-left">
                                        <ul>
                                            <li><i class="icon-calendar-empty"></i> On <span>12 Nov 2020</span>
                                            </li>
                                            <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a>
                                            </li>
                                            <li><i class="icon-tags"></i> Tags <a href="#">Works</a>, <a href="#">Personal</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a>
                                    </div>
                                </div>
                                <h2>{{__('theme.lurem ipsum short')}}</h2>
                                <p>
                                    {{__('theme.lurem ipsum 1 paragraph')}}
                                </p>
                                <p>
                                    {{__('theme.lurem ipsum 1 paragraph')}}
                                </p>
                                <a href="{{route("home.news.show" , ['id'=>$news->id])}}" class="btn_1">{{__('theme.read more')}}</a>
                            </div>
                            @if ($loop->last == false)
                                <hr>
                            @endif
                        @endforeach
                    </div>
                    <hr>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><span class="page-link">1<span class="sr-only">(current)</span></span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- end pagination-->

                </div>
                <!-- End col -->

                <aside class="col-lg-3">

                    <div class="widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="{{__("theme.search...")}}">
                            <span class="input-group-btn">
						<button class="btn btn-default" type="button" style="margin-left:0;"><i class="icon-search"></i></button>
						</span>
                        </div>
                        <!-- /input-group -->
                    </div>
                    <!-- End Search -->
                    <hr>
                    <div class="widget" id="cat_blog">
                        <h4>
                            {{__("theme.categories")}}
                        </h4>
                        <ul>
                            <li><a href="#">Places to visit</a>
                            </li>
                            <li><a href="#">Top tours</a>
                            </li>
                            <li><a href="#">Tips for travellers</a>
                            </li>
                            <li><a href="#">Events</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End widget -->

                    <hr>

                    <div class="widget">
                        <h4>
                            {{__("theme.recent post")}}
                        </h4>
                        <ul class="recent_post">
                            <li>
                                <i class="icon-calendar-empty"></i>{{__("theme.temp date")}}
                                <div><a href="#">
                                        {{__("theme.lurem ipsum short")}}
                                    </a>
                                </div>
                            </li>
                            <li>
                                <i class="icon-calendar-empty"></i>{{__("theme.temp date")}}
                                <div><a href="#">
                                        {{__("theme.lurem ipsum short")}}
                                    </a>
                                </div>
                            </li>
                            <li>
                                <i class="icon-calendar-empty"></i> {{__("theme.temp date")}}
                                <div><a href="#">
                                        {{__("theme.lurem ipsum short")}}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- End widget -->
                    <hr>
                    <div class="widget tags">
                        <h4>Tags</h4>
                        <a href="#">Lorem ipsum</a>
                        <a href="#">Dolor</a>
                        <a href="#">Long established</a>
                        <a href="#">Sit amet</a>
                        <a href="#">Latin words</a>
                        <a href="#">Excepteur sint</a>
                    </div>
                    <!-- End widget -->

                </aside>
                <!-- End aside -->

            </div>
            <!-- End row-->
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
