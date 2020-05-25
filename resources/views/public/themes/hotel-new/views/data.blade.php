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

{{--    {{dd($widgets)}}--}}
    @if(isset($datas))

        @if(count($widgets) > 0 and $widgets[0]->type == 'main')
            @include($widgets[0]->name, ['datas'=>$datas])
        @endif
    @else
        @if(count($widgets) > 0 and $widgets[0]->type == 'main')
            @include($widgets[0]->name, ['data' =>$object])
        @endif
    @endif

    <!--todo media screen-->
    {{--    <div class="content2" id="content-2">--}}
    {{--    </div>--}}

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
