@extends('public.themes.hotel-new.layouts.public2')

@section("header")

    <script type="text/javascript" src="{{asset('scripts/jquery.countdownTimer.js')}}"></script>
@endsection

@section('container')

    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">
        <div class="post-single" style=" ">
            <div id="example-basic">
                <h3>{{__('layout.reserve.fill information')}}</h3>
                <section style="padding: 0 !important;  width: 100%">
                    <div class="row">
                        <!--right side of post header-->
                        <div class="col l6 s12 center-on-small-only">
                            <h6 id="title-h6">{{__('layout.reserve.reservatore information')}}</h6>

                        </div>

                    </div>

                    <div class="row">

                        <div id="right-side-content" class="col l6 s12  content-right-side ">
                            <form action="{{route('home.booking.save', ['room'=>'1'])}}" method="post">
                                {{csrf_field()}}
                                <input id="date" name="date" type="hidden" class="dp2 col l11 s11 "
                                       placeholder="تاریخ حالا"
                                       value="1399/01/20">

                                <div class="row">
                                    <div id="app" class="col l5 s5">
                                        <input type="text"
                                               class="dp2 col l12 s11"
                                               v-model="date"
                                               id="start_date"
                                               name="start_date"
                                               placeholder="تاریخ را انتخاب نمایید">
                                        <date-picker
                                                :min="today"
                                                v-model="date"
                                                format="jYYYY/jMM/jDD"
                                                element="start_date">
                                        </date-picker>
                                    </div>
                                    <div class="col l5 s5" style="margin-top: 15px !important;">
                                        <select name="count" id="count">
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
                                    <div class="col l2">
                                        <input type="button" id="update-dates-prices" style="width:100%; margin-top: 24px !important;" value="بروزرسانی"
                                               class="btn-small btn-red btn-submit btn-go-to-step-2">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div id="app" class="col l12 s12">
                                        <h5>
                                            اطلاعات رزرو کننده
                                        </h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="app" class="col l6 s12">
                                        <input type="text"
                                               class="col l12 s11 dp2"
                                               id="name"
                                               name="name"
                                               placeholder="نامو نام خانوادگی">
                                    </div>
                                    <div class="col l6 s12">
                                        <input type="text"
                                               class="col l12 s11 dp2"
                                               id="mobile"
                                               name="mobile"
                                               placeholder="شماره همراه">
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="app" class="col l6 s12">
                                        <input type="text"
                                               class="col l12 s11 dp2"
                                               style="margin-top: 0 !important;"
                                               id="ssn"
                                               name="ssn"
                                               placeholder="کد ملی">
                                    </div>
                                    <div class="col l6 s12">
                                        <input type="text"
                                               style="margin-top: 0 !important;"
                                               class="col l12 s11 dp2"
                                               id="email"
                                               name="email"
                                               placeholder="ایمیل">
                                    </div>
                                </div>

                                <input id="end_date" name="end_date" type="hidden" class="dp2 col l11 s11"
                                       placeholder="end date"
                                       value="1399/02/05">

                                <input id="price" name="price" type="hidden" class="dp2 col l11 s11"
                                       placeholder="price"
                                       value="120000">

                                <input id="code" name="code" type="hidden" class="dp2 col l11 s11"
                                       placeholder="code"
                                       value="BME0001">

                                <input id="active" name="active" type="hidden" class="dp2 col l11 s11"
                                       placeholder="price"
                                       value="1">

                                <input id="situation" name="situation" type="hidden" class="dp2 col l11 s11"
                                       placeholder="price"
                                       value="1">

                                <input id="check" name="check" type="hidden" class="dp2 col l11 s11"
                                       placeholder="check"
                                       value="">
                                <input type="submit" style="width:100%" href="#" value="تایید اطلاعات و رزرو" class="btn-small btn-red btn-submit btn-go-to-step-2"
                                       id="btn-go-to-step-2">
                            </form>

                            <div class="special-service hide-on-med-and-down col l11" hidden>

                                <div>
                                <span class="center special-service-title">
                                    {{__('layout.reserve.important notice')}}
                                </span>
                                </div>

                                <p class="special-service-description">

                                    {{__('layout.reserve.for children over 6 years of age')}}

                                </p>


                            </div>
                            <div class="col l7 s5 padding-option" style="padding: 0 !important;" id="input-kids" hidden>
                                <select class="slct-kid">
                                    <option value="" disabled selected>
                                        {{__('layout.reserve.choose the child age')}}
                                    </option>
                                    <option value="1">یک ال 5</option>
                                    <option value="2">6 الی یازده</option>
                                    <option value="3">یازده الی شانزده</option>
                                    <option value="4">هفده الی آخر</option>
                                </select>
                            </div>

                            <div class="col l7 s5 padding-option" style="padding: 0 !important;" id="input-beds" hidden>
                                <select class="slct-kid">
                                    <option value="" disabled selected>
                                        {{__('layout.reserve.choose the number of beds')}}
                                    </option>
                                    <option value="1">یک تخت</option>
                                    <option value="2">دو تخت</option>
                                    <option value="3">سه تخت</option>
                                    <option value="4">چهار تخت</option>
                                    <option value="5">پنج تخت</option>
                                </select>
                            </div>


                            <div class="col l8 s12 center-on-small-only" hidden>
                                <h6 id="title-h6" class="title-of-form">
                                    {{__('layout.reserve.do you travel for work')}}
                                </h6>

                            </div>

                            <div class="col l10 center-on-small-only" hidden>
                                <p style="display: inline-block">
                                    <label>
                                        <input name="group1" type="radio" checked/>
                                        <span class="radio-span">بله</span>
                                    </label>
                                </p>
                                <p style="display: inline-block; margin-right: 10px">
                                    <label>
                                        <input name="group1" type="radio"/>
                                        <span class="radio-span">خیر</span>
                                    </label>
                                </p>
                                <textarea id="txt-area" class="txt-area col s12"
                                          placeholder="درخواستی از هتل دارید؟ اینجا بنویسید."></textarea>
                                <p style="display: inline-block">
                                    <label>
                                        <input name="group2" type="radio"/>
                                        <span class="radio-span">
                                        {{__('layout.reserve.i have read and accept the rules')}}
                                    </span>
                                    </label>
                                </p>
                            </div>
                        </div>


                        <div id="left-side-content" class="col l6 s12  content-left-side">

                            <div class="col s12 room-pic"></div>
                            <div class="col s12 room-pic-des">
                                <span>{{$room->title}}</span>
                            </div>

                            <div class="col s6 room-date">

                            <span class="span-date grey-text">
                                {{__('layout.reserve.entry date')}}
                            </span>
                                <span class="span-date black-text " id="spn-start-date"> -</span>

                            </div>

                            <div class="col s6  room-date rd2">

                            <span class="span-date grey-text">
                                {{__('layout.reserve.date of departure')}}
                            </span>
                                <span class="span-date black-text " id="spn-end-date"> -</span>

                            </div>

                            <div class="col s12  room-day-price" id="dv-dates">
                            </div>

                            <div class="col s12 room-description">

                                <span class="black-text">{{$room->description}}</span>

                            </div>

                            <input type="hidden" id="input-price" value="10000">
                            <a id="btn-grey" href="#" class="btn-small btn-grey ">
                                {{number_format(10000)}}
                                {{__('layout.reserve.total')}}
                            </a>
                            <div class="col s12 more-bedroom-services">

                                {{--<span class="black-text">سرویس خواب اضافه:</span>--}}
                                {{--<span class="black-text">900/000 ریال</span>--}}

                                {{--<div class="img-check  left">--}}
                                {{--<img src="{{asset('images/checked.png')}}" class="">--}}

                                {{--</div>--}}


                            </div>


                            <div class="col s12 more-bedroom-des">

                            <span>
                                {{__('layout.reserve.in case of cancellation')}}
                            </span>
                            </div>
                            <div class="col s12 left" id="btn-green">
                                <a class="btn-green" href="#">
                                    {{__('layout.reserve.total')}}
                                    {{ number_format(10000) }}
                                    {{__('layout.reserve.tooman')}}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="row">--}}
                    {{--                        <div class="col s12">--}}
                    {{--                            <input type="button" href="#" value="تایید اطلاعات و رزرو"--}}
                    {{--                                   class="btn-small btn-red btn-submit btn-go-to-step-2" id="btn-go-to-step-2">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </section>
            </div>
        </div>
    </div>
@endsection

@section("footer")

    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <script>
        var countdowntimer;
        $(document).ready(function () {
            $('.parallax').parallax();
            $('.modal').modal();
            $('select').formSelect();
        });
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, options);
        });

    </script>

    <script>
        // import moment from 'moment-jalaali';
        var app = new Vue({
            el: '#app',
            data: {
                date: moment().format('jYYYY/jMM/jDD'),
                today: moment().format('jYYYY/jMM/jDD'),
            },
            components: {
                DatePicker: VuePersianDatetimePicker
            }
        });
    </script>

    <script>
        $("#update-dates-prices").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('home.booking.update.price', ['type'=>'room'])}}",
                timeout: 30000,
                method: 'post',
                data: {},
                success: function (result) {
                    var prices = result.result.prices;

                    $("#spn-start-date").html(Object.keys(prices)[0]);
                    $("#spn-end-date").html(Object.keys(prices)[Object.keys(prices).length - 1]);
                    $("#end_date").val(Object.keys(prices)[Object.keys(prices).length - 1]);
                    var total = 0;
                    $.each(prices, function (key, value) {
                        console.log(key, value);
                        total += Number(value);
                        var d = `<span class="black-text">${key}</span><span class="txt-red-price">${value} </span><br>`
                        $("#dv-dates").append(d);
                    });

                    $("#btn-grey").html(total);

                },
                error: function (result) {
                    alert("error code :" + result.status);
                }
            });

        });

    </script>


@endsection
