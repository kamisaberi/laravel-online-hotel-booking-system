@extends('public.themes.hotel-new.layouts.public')

@section("header")

    <link rel="stylesheet" href="{{asset('style/lightslider.css')}}">


    @if(in_array(app()->getLocale() , config('base.rtl_locales')) == true)
        <link rel="stylesheet" href="{{asset('style/style_single-rtl.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('style/style_single-ltr.css')}}">
    @endif

    <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet'/>


    <link href="{{asset('style/jquerysctipttop.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('style/pwt-datepicker.css')}}">


    <link rel="stylesheet" href="{{asset('vendors/plyr/plyr.css')}}">




    <link rel="stylesheet" href="{{asset('style/style_archive.css')}}">


    <style>

        .modal {
            width: 50% !important;
            max-height: 80% !important;
            overflow-y: hidden !important;
        }


    </style>

@endsection

@section('container')

    <div class="post-parallax">
        <!--todo id va avaz kardan media screen-->
        <div class="parallax-container pc2" id="parallax-container">
            <div class="container" style="margin-top: 85px">
            <span class="span-location">
                <span style="color: #dab662">{{__('layout.room.your location')}}</span>
                صفحه اصلی / اتاق و سوییت ها / اتاق دو خوابه
            </span>
            </div>
            <div class="parallax"><img src="{{asset('images/post_bg.jpg')}}"></div>
        </div>
    </div>
    <!--todo media screen-->
    <div class="content2 " id="content-2">

        <div class="post-single container">
            <!--todo baraye class h6 va span class va id sakhte shod -->
            <div class="row">
                <div class="col l6 m12 s12 center-on-small-only">
                    <h6 class="title-post" id="title-h6">
                        {{$data->title}}
                    </h6>
                    @if( isset($data->properties['price']) )
                        <span class="span-post" id="span-post">
                                {{__('layout.room.price per night')}}

                            @isset($data->properties['price']->value)
                                @if(count($data->properties['price']->value[$current_date]) == 2
                                &&  $data->properties['price']->value[$current_date][0] < $data->properties['price']->value[$current_date][1] )
                                    <span>
                                    {{number_format($data->properties['price']->value[$current_date][0])}}
                                </span>
                                    <span style="text-decoration: line-through;">
                                    {{number_format($data->properties['price']->value[$current_date][1])}}
                            </span>
                                @elseif(count($data->properties['price']->value) == 1)
                                    {{isset($data->properties['price']->value[$current_date][0]) ? number_format($data->properties['price']->value[$current_date][0]) : '0'}}
                                @endif
                            @endisset

                            {{__('layout.room.tooman')}}
                            </span>
                    @endif
                </div>


                <div class="col l6 m12 s12 center-on-small-only" style="padding-left: 10px !important;">


                    @if(isset($data->properties['available']) and ($data->properties['available']->value ==1 or $data->properties['available']->value ==0))
                        <a href="#modal1" class="btn-small btn-cream margin-top modal-trigger" id="btn-res">
                            {{__('layout.room.reserve it')}}
                        </a>
                    @else
                        <a href="#" class="btn-small btn-cream margin-top modal-trigger" id="btn-res">
                            {{__('layout.room.you cant reserve it right now')}}
                        </a>
                    @endif

                    @if(isset($data->properties['video-file']->value[0]->value))
                        <div class="modal" id="modal-video" style="z-index: -1 !important;">
                            <div class="modal-content" style="z-index: -1 !important;">

                                <video poster="{{asset('videos/poster.png')}}" id="player" playsinline controls
                                       style="margin-top: 16px !important;">
                                    <source src="{{$data->properties['video-file']->value[0]->value}}" type="video/mp4"/>

                                    {{--                            <!-- Captions are optional -->--}}
                                    {{--                            <track kind="captions"--}}
                                    {{--                                   label="English captions" src="{{asset('images/gallary/18.png')}}"--}}
                                    {{--                                   srclang="en"--}}
                                    {{--                                   default/>--}}
                                </video>
                            </div>
                            <div class="modal-footer container">

                            </div>
                        </div>
                    @endif

                    @if(isset($data->properties['flash-file']->value[0]->value))
                        <div class="modal" id="modal-360" style="z-index: -1 !important;">
                            <div class="modal-content" style="z-index: -1 !important;">
                                <embed src="{{$data->properties['flash-file']->value[0]->value}}" style="width: 100%; height: 600px;"
                                       quality="high" pluginspage="http://www.macromedia.com/go/getfashplayer"
                                       type="application/x-shockwave-flash">
                            </div>
                            <div class="modal-footer container">
                            </div>
                        </div>
                @endif

                <!-- Modal Structure -->
                    <div class="modal" id="modal1" style="z-index: -1 !important; height: 600px !important; width: 75% !important;">
                        <div class="modal-content" style="z-index: -1 !important;">
                            <div class="row">

                                <form method="get"
                                      action="{{route('home.services.launch', ['type'=>'booking'])}}">
                                    <div class="col l4 s12 height100">

                                        <p>{{__('layout.room.enter date')}}</p>

                                        <div id="app">
                                            <input type="text"
                                                   class="dp1"
                                                   v-model="date"
                                                   id="alternateField"
                                                   name="start"
                                                   placeholder="تاریخ را انتخاب نمایید">

                                            @if(isset($inactives) and $inactives == "")
                                                <date-picker
                                                        :min="today"
                                                        v-model="date"
                                                        format="jYYYY/jMM/jDD"
                                                        element="alternateField">
                                                </date-picker>
                                            @elseif(isset($inactives))
                                                <date-picker
                                                        :min="today"
                                                        :disable="{{$inactives}}"
                                                        v-model="date"
                                                        format="jYYYY/jMM/jDD"
                                                        element="alternateField">
                                                </date-picker>
                                            @else
                                                <date-picker
                                                        :min="today"
                                                        v-model="date"
                                                        format="jYYYY/jMM/jDD"
                                                        element="alternateField">
                                                </date-picker>
                                            @endif
                                        </div>

                                        {{--                                    <input style="z-index: 5 !important;" type="text" class="datePicker dp1"--}}
                                        {{--                                           value="todayUnix"/>--}}
                                        {{--                                    <input type="hidden"--}}
                                        {{--                                           id="alternateField" name="start"/>--}}

                                        <input type="hidden" value="1"
                                               id="step" name="step"/>

                                        <input style="z-index: 5 !important; display: block;" type="hidden"
                                               name="type" value="room"/>
                                        <input style="z-index: 5 !important; display: block;" type="hidden"
                                               name="object" value="{{$data->id}}"/>

                                    </div>
                                    <div class="col l4 s12 height100">

                                        <p>{{__('layout.room.duration')}}</p>
                                        <!--<input type="text">-->

                                        <select class="slct-night" name="count" required>
                                            <option value="" disabled selected>{{__('layout.room.choose duration')}}</option>
                                            <option value="1">{{__('layout.room.1 night')}}</option>
                                            <option value="2">{{__('layout.room.2 nights')}}</option>
                                            <option value="3">{{__('layout.room.3 nights')}}</option>
                                            <option value="4">{{__('layout.room.4 nights')}}</option>
                                            <option value="5">{{__('layout.room.5 nights')}}</option>
                                            <option value="6">{{__('layout.room.6 nights')}}</option>
                                            <option value="7">{{__('layout.room.7 nights')}}</option>
                                        </select>

                                    </div>
                                    <div class="col l4 s12 height100">

                                        <p>{{__('layout.room.last step')}}</p>
                                        <input type="submit" href="#" value="درج مشخصات"
                                               class="btn-small center btn-red btn-submit">


                                    </div>
                                </form>

                            </div>

                        </div>

                        <!--todo modal footer avaz shod ye seri chiz ha / in div ro jaygozin konin-->
                        <div class="modal-footer container" hidden>

                            <div class="row modal-footer2" style="margin: 0 !important;">

                                <div class="col l3 s12 padding-col">
                                    <div class="date-picked-first">
                                        <div>
                                            <span class="center date-picked-title">دوشنبه 27 فروردین 98</span>
                                        </div>

                                        <p class="date-picked-description center center-align">
                                            7/127/256 ریال
                                        </p>
                                    </div>
                                </div>

                                <div class="col l3 s12 padding-col">
                                    <div class="date-picked-first">
                                        <div>
                                            <span class="center date-picked-title">دوشنبه 27 فروردین 98</span>
                                        </div>

                                        <p class="date-picked-description center center-align">
                                            7/127/256 ریال
                                        </p>
                                    </div>
                                </div>

                                <div class="col l3 s12 padding-col">
                                    <div class="date-picked-first">
                                        <div>
                                            <span class="center date-picked-title">دوشنبه 27 فروردین 98</span>
                                        </div>

                                        <p class="date-picked-description center center-align">
                                            7/127/256 ریال
                                        </p>
                                    </div>
                                </div>

                                <div class="col l3 s12 padding-col">
                                    <div class="date-picked-first">
                                        <div>
                                            <span class="center date-picked-title">دوشنبه 27 فروردین 98</span>
                                        </div>

                                        <p class="date-picked-description center center-align">
                                            7/127/256 ریال
                                        </p>
                                    </div>
                                </div>


                            </div>

                            <!--<a href="#!" class="modal-close waves-effect waves-red btn-flat">بستن</a>-->
                        </div>

                    </div>


                    <!--todo id btn-fav sakhte shod-->
                    <a id="btn-fav" href="#" class="btn-small btn-reserve " hidden>
                        {{__('layout.room.add to favorites')}}
                    </a>
                    <!--todo bareye img yek id tarif shod-->
                    <img id="img-share" src="{{asset('images/share.png')}}" hidden
                         class="responsive-img img-share center-on-small-only">


                </div>
            </div>


            <!--Image gallery-->
            <!--todo mediaScreen-->

            <div class="img-gallery" id="image-gallery">

                <ul id="lightSlider">
                    @if(isset($data->properties['slide-images']) == true
                    and isset($data->properties['slide-images']->value)
                    and count($data->properties['slide-images']->value)>0)
                        @foreach( $data->properties['slide-images']->value as $slide)
                            <li data-thumb="{{$slide->value}}">
                                <img src="{{$slide->value}}"/>
                            </li>
                        @endforeach
                    @else
                        <li data-thumb="{{asset('uploads/room-000.jpg')}}">
                            <img src="{{asset('uploads/room-000.jpg')}}"/>
                        </li>
                    @endif
                </ul>

                <div class="row" style="margin-top: 8px">
                    <div class="col m6 left">

                        @if(isset($data->properties['video-file']->value[0]->value))
                            <a href="#modal-video" class="modal-trigger left">
                                <img src="{{asset('images/video-512.png')}}" width="32">
                            </a>
                        @endif


                    </div>
                    <div class="col m6">
                        @if(isset($data->properties['flash-file']->value[0]->value))
                            <a href="#modal-360" class="modal-trigger right">
                                <img src="{{asset('images/360-512.png')}}" width="32">
                            </a>
                        @endif
                    </div>
                </div>

            </div>


            <!--Image gallery-->

            <div class="exit-txt-img hide-on-med-and-down">
                <img class="responsive-img img-exit" src="{{asset('images/exit.png')}}">
                <span class="span-exit">
                        {{__('layout.room.guest exit time')}}
                    </span>
            </div>

            <br>
            <br>


            <div class="row" style="margin: 0 !important; height: 150px">
                <div class="col l5 s12  special-service hide-on-med-and-down">
                    <div>
                     <span class="center special-service-title">
                                {{__('layout.room.special offers for reserving rooms')}}
                     </span>
                    </div>
                    <p class="special-service-description">
                        {{__('layout.room.rasht location tours')}}
                    </p>
                </div>
            </div>


            <div class="row post-txt-div">
                <p class="post-txt col l5 s12">
                    {{$hotel->description}}
                </p>
            </div>
            <div class="line hide-on-med-and-down"></div>


            <div class="row">
                <div class="col l12 s12  options-title-bg">
                    <div class="img-options-bg ">
                        <img src="{{asset('images/door-hanger.png')}}" class="responsive-img img-options">
                    </div>
                    <div class="options-title-txt-bg">
                            <span class="options-title-txt">
                {{__('layout.room.facilities')}}
                                {{$hotel->title}}
                            </span>
                        <br>
                        <span class="options-title-desc">hotel options</span>
                    </div>
                </div>


                @php($hotel_t= [])
                @foreach($hotel->properties as $v)
                    @if($v->input_type== 'check' and $v->value=='1' )
                        @php($hotel_t[$v->title]=$v->value)
                    @endif
                @endforeach
                @if(count($hotel_t) >0 )
                    @php($htls=array_chunk($hotel_t , count($hotel_t)%2 ==0 ? count($hotel_t)/2 : (count($hotel_t)+1)/2  ,true))
                @else
                    @php($htls=[])
                @endif
                @foreach($htls as $htl)
                    <div class="col l3 m6 s12">
                        @foreach($htl as $k=>$v)
                            <div class="check-txt-img">
                                <img class="responsive-img" src="{{asset('images/checked.png')}}">
                                <span>{{$k}}</span>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <div class="col l6 s12">
                    <ul class="collection table-of-options" id="table-of-options">
                        @foreach($hotel->properties as $v)
                            @if($v->input_type=='text')
                                <li class="collection-item">
                                    <div>
                                        {{$v->title}}
                                        <span class="secondary-content">{{$v->value}}</span>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>


            </div>


            @if(isset($data->content))
                <div class="row" style="margin: 0 !important; height: 150px">
                    <div class="col l12 s12  special-service hide-on-med-and-down">
                        <div>
                     <span class="center special-service-title">
                     </span>
                        </div>
                        <p class="special-service-description">
                            {!! $data->content !!}
                        </p>
                    </div>
                </div>

            @endif

            <div class="row">


                <div class="col l12 s12  options-title-bg">
                    <div class="img-options-bg ">
                        <img src="{{asset('images/door-hanger.png')}}" class="responsive-img img-options">
                    </div>
                    <div class="options-title-txt-bg">
                            <span class="options-title-txt">
                {{__('layout.room.facilities')}}
                                {{$data->title}}
                            </span>
                        <br>
                        <span class="options-title-desc">hotel options</span>
                    </div>
                </div>


                @php($hotel_t= [])
                @foreach($data->properties as $v)
                    @if($v->input_type== 'check' and $v->value == '1')
                        @php($hotel_t[$v->title]=$v->value)
                    @endif
                @endforeach
                @if(count($hotel_t )>0)
                    @php($htls=array_chunk($hotel_t , count($hotel_t)%2 ==0 ? count($hotel_t)/2 : (count($hotel_t)+1)/2  ,true))
                @else
                    @php($htls=[])
                @endif
                @foreach($htls as $htl)
                    <div class="col l3 m6 s12">
                        @foreach($htl as $k=>$v)
                            <div class="check-txt-img">
                                <img class="responsive-img" src="{{asset('images/checked.png')}}">
                                <span>{{$k}}</span>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <div class="col l6 s12">
                    <ul class="collection table-of-options" id="table-of-options">
                        @foreach($data->properties as $v)
                            @if($v->input_type=='text')
                                <li class="collection-item">
                                    <div>
                                        {{$v->value}}
                                        <span class="secondary-content">{{$v->value}}</span>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!--post single-->

        <div class="container">

            <div class="reserve-box hide-on-med-and-down" style="height: 100px;">
                <div class="row">
                    <div class="col l7 s7 height110">
                        <h6>
                            {{__('layout.room.reserve')}}
                            {{$data->title}}
                        </h6>
                        <span>
                            {{$data->description}}
                        </span>
                    </div>
                    <div class="col l5 s5 height110">
                        {{--<a href="#" class="btn-small left btn-cream btn-reserve2">رزرو کنید</a>--}}
                        @if( isset($data->properties['price']) )
                            <a href="#" class="btn-small btn-red btn-price">
                                {{__('layout.room.per night price')}}
                                {{isset($data->properties['price']->value[$current_date][0]) ? number_format($data->properties['price']->value[$current_date][0]) : '0'}}
                                {{__('layout.room.tooman')}}
                            </a>
                        @endif
                    </div>
                </div>
            </div>


            <div class="box-reserve-bottom hide-on-med-and-down">
                {{--                {{__('layout.room.extra bed costs')}}--}}
                {{--                    900000 ریال--}}

            </div>

        </div>


    </div>

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
                    <h6>{{__('layout.public.get to know us a bit')}}</h6>
                    <span>
                        {{--{{$data['description']->title}}--}}
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
                <div class="col l9 s12"><span>
                        {{$hotel->address}}
                    </span>
                </div>
            </div>
        </div>
    </div>


@endsection

@section("footer")


    <script src="{{asset('scripts/lightslider.js')}}"></script>
    <script src="{{asset('scripts/pwt-date.js')}}"></script>
    <script src="{{asset('scripts/pwt-datepicker.js')}}"></script>
    <script src="{{asset('vendors/plyr/plyr.js')}}"></script>

    <script>


        var player = new Plyr('#player');

        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function () {
            $('.parallax').parallax();
            $('.modal').modal();
            $('select').formSelect();
            $('.tabs').tabs();
        });


        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function () {


        });


    </script>


    <script>

        $(document).ready(function () {
            $('#lightSlider').lightSlider({

                gallery: true,
                item: 1,
                loop: true,
                slideMargin: 0,
                thumbItem: 9,
                responsive: [
                    {
                        breakpoint: 800,
                        settings: {
                            item: 1,
                            slideMove: 1,
                            slideMargin: 6,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            item: 1,

                            slideMove: 1
                        }
                    }
                ]

            });
        });


    </script>


    <script>

        $(".datePicker").val('');
        var dp;
        $(document).ready(function () {
            var options = {
                format: "YYYY/MM/DD",
                formatter: function (unix) {
                    var pdate = new persianDate(unix);
                    pdate.formatPersian = false;
                    return pdate.format("YYYY/MM/DD");
//return new persinDate(unix).format("YYYY/MM/DD");
                },
                daysTitleFormat: "YYYY MMMM",
                observer: true,
                sendOption: "p",
                initialValue: true,
//position : [2, 2],
                autoclose: true,
                toolbox: true,
                minDate: new Date().getTime(),
                altField: "#alternateField",
                altFormat: "u",
                altFieldFormatter: function (unix) {
                    var pdate = new persianDate(unix);
                    // pdate.formatPersian
                    pdate.formatPersian = false;
                    return pdate.format("YYYY MM DD");
                },
                onShow: function () {
//console.log("user config onShow event ")
                },
                onHide: function () {
//console.log("user config onHide event ")
                },
                onSelect: function (unix) {
//console.log("user config onSelect event as : "+unix)

                }
            };

            $(".datePicker").persianDatepicker(options);

            // var tt = new Date().getTime();
            // alert(tt);
            // var pd = $('.datePicker').persianDatepicker();
            // pd.setDate(tt);


            dp = $(".datePicker").data("datepicker");
        });


    </script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                date: moment().format('jYYYY/jMM/jDD'),
                today: moment().format('jYYYY/jMM/jDD'),
                // disable:"['1398/07/13']",
            },
            components: {
                DatePicker: VuePersianDatetimePicker
            }
        });
    </script>



@endsection
