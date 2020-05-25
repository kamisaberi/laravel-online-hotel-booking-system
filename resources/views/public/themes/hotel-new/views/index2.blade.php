@extends('public.themes.hotel-new.layouts.public')


@section('header')

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet'/>

@endsection
@section('container')


    <div class="slide">
        <img id="in-slide-img" src="{{asset('images/slider-txt.png')}}" class="in-slide-img responsive-img">
        <ul>

            @if(isset($slides ))
                @foreach($slides as $slide)
                    <li data-bg="{{$slide->properties['path']->value}}"></li>
                @endforeach
            @else
                <li data-bg="{{asset('uploads/slider1.jpg')}}"></li>
            @endif

        </ul>
    </div>

    <!--content-->

    <div class="content-sb">

        <div class="container">
            <span>درباره ما</span> <br>
            <h5>{{$hotel->title}}</h5>
            <p id="about-us-p">
                {{$hotel->description}}
            </p>
        </div>

    </div>

    <!--posts-->

    <div class="posts">
        <div class="row" style="margin: 0 !important;">

            {{--            @php($cnt=0)--}}
            {{--            @foreach($galleries as $gallery)--}}
            {{--                @php($cnt++)--}}
            {{--                <div class="col s12 l3 post">--}}
            {{--                    <img class="responsive-img" src="{{$gallery->properties->path}}">--}}
            {{--                    <div class="overlay">--}}
            {{--                        <div class="text-overlay"><span>تصویر بزرگتر</span></div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                @if($cnt == 8)--}}
            {{--                    @break--}}
            {{--                @endif--}}
            {{--            @endforeach--}}

        </div>
    </div>

    <!--facilities-->

    <div class="facilities">

        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row">

                    @isset($home_page_middle_navigations )
                        @foreach($home_page_middle_navigations as $navigation)
                            @if($navigation->link_type == "route")
                                @if(isset($navigation->properties->key) and  isset($navigation->properties->value) )
                                    <div class="col s12 l4 facilities-part">
                                        <div class="icon-block">
                                            <img src="{{asset('images/clock.png')}}" class="responsive-img facilities-img"><br>
                                            <h5 class="center">{{$navigation->properties->title}}</h5>
                                            <p class="light center">
                                                <br>
                                                <br>
                                                <br>
                                            </p>
                                            <a href="{{route($navigation->properties->route, [$navigation->properties->key=>$navigation->properties->value])}}">
                                                <h6>{{__('layout.room.more information')}}</h6>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col s12 l4 facilities-part">
                                        <div class="icon-block">
                                            <img src="{{asset('images/clock.png')}}" class="responsive-img facilities-img"><br>
                                            <h5 class="center">{{$navigation->properties->title}}</h5>
                                            <p class="light center">
                                                <br>
                                                <br>
                                                <br>
                                            </p>
                                            <a href="{{route($navigation->properties->route)}}">
                                                <h6>{{__('layout.room.more information')}}</h6>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @elseif($navigation->link_type == "url")
                                <div class="col s12 l4 facilities-part">
                                    <div class="icon-block">
                                        <img src="{{asset('images/clock.png')}}" class="responsive-img facilities-img"><br>
                                        <h5 class="center">{{$navigation->properties->title}}</h5>
                                        <p class="light center">
                                            <br>
                                            <br>
                                            <br>
                                        </p>
                                        <a href="{{$navigation->properties->url}}">
                                            <h6>{{__('layout.room.more information')}}</h6>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endisset


                </div>

            </div>

        </div>


    </div>

    <!--reservation-->

    <div class="reservation">

        <span>سامانه رزرواسیون آنلاین</span> <br>
        <h5>{{$hotel->title}}</h5>

        <div class="container">
            <div class="row">
                @foreach($rooms as $room)
                    @include('public.themes.hotel-new.widgets.room_widget' , ['data'=>$room])
                @endforeach
            </div>
        </div>
    </div>

    <!--restaurant parallax-->

    <div class="restaurant">
        <div class="parallax-container">
            <div class="container center">
                <img id="in-parallax-img" src="{{asset('images/restaurant-txt.png')}}"
                     class="responsive-img restaurant-img">
                <span id="in-parallax-span">
                {{$hotel->description}}
                </span>
            </div>
            <div class="parallax"><img src="{{asset('images/footer_bg.jpg')}}"></div>
        </div>
    </div>

    <!--address with map-->

    <div class="address">
        <div class="container">
            <div class="row" style="margin: 0 !important;">
                <div class="col s12 l5 address-part center-on-small-only ">
                    <h6>کمی با ما آشنا شوید</h6>
                    <span>
{{$application->description}}

    </span>
                </div>
                <div class="col s12 l7">
                    <div id='map' style='width: 100%; height: 370px;'></div>
                    <img id="map-img" src="{{asset('images/map.jpg')}}" class="responsive-img left" hidden>
                </div>
            </div>
        </div>
    </div>

    <!--address bar with text and icon-->

    <div class="address-bar">
        <div class="container">
            <div class="row center-on-small-only" style="margin: 0 !important;">
                <div class="col l1 s12"><img src="{{asset('images/location.png')}}"></div>
                <div class="col l9 s12"><span>{{$hotel->address}}</span>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('footer')

@endsection