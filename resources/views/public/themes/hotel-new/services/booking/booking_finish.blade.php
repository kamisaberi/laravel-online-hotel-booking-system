@extends('public.themes.hotel-new.layouts.public2')

@section("header")

    <script type="text/javascript" src="{{asset('scripts/jquery.countdownTimer.js')}}"></script>


@endsection

@section('container')

{{--    @include('public.themes.hotel-new.subviews.booking.waiting_for_room_verification_booking_form')--}}

    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">
        <div class="post-single" style=" ">
            <div id="example-basic">
                @if($command->title == "open reserve form")
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
                                <form action="{{route('home.services.launch', ['type'=>'booking' , 'step'=>2])}}" method="post">
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
                @elseif($command->title == "wait for room verification")
                    <h3>{{__('layout.reserve.review and pay')}}</h3>
                    <section style="padding: 0 !important;  width: 100%; display: block !important;">
                        <div class="row">
                            <div class="col l6 s12 rs-col">
                                <div class="center-on-small-only btn-bg">
                                    <span class="">{{__('layout.reserve.your reservation id')}}</span>
                                    <a href="#" class="btn-small  btn-cream bc-2"
                                       id="reservation-code">code</a>
                                </div>
                                <center>
                                    <div id="countdown-1" style="font-size: 72px; color: red"></div>
                                </center>
                                <center>
                                    <h6 id="h-counter-info">
                                        لطفا جهت تایید اتاق صبر نمایید
                                    </h6>
                                </center>
                            </div>
                            <div class="col l6 s12 ls-col ">
                                <div id="ss-box" class="ss-box  col l12 ">
                                    <div>
                                        <span class="center ss-title">{{__('layout.reserve.just take another step')}}</span>
                                    </div>
                                    <div id="total-price" class="total-price center-on-small-only">
                                        <img class="responsive-img" src="{{asset('images/green-check.png')}}">
                                        <span id="btn-grey-2">{{__('layout.reserve.total')}}:
                                    12000
                                    {{__('layout.reserve.tooman')}}</span>
                                    </div>
                                    <div id="div-empty" class="div-empty">
                                        <div class="div-empty-child"></div>
                                        <div class="div-empty-child"></div>
                                        <div class="div-empty-child"></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>
                        <div class="col s12 l12 center-on-small-only res-rules">
                            <h6>{{__('layout.reserve.reservation rules on holidays')}}</h6>
                        </div>
                        <div class="row row-rules">
                            <div class="col s12 row-rules-div">
                                <p>
                                    {{__('layout.reserve.no person or legal person')}}
                                </p>
                            </div>
                        </div>
                        <div class="row row-sup">
                            <div class="col s12 row-sup-div">
                                <div class="row">
                                    <div class=" col l1 s12 img-sup-bg center-on-small-only">
                                        <img class="responsive-img img-sup" src="{{asset('images/support.png')}}">
                                    </div>
                                    <div class=" col l11 s12">
                                        <h6 class="sup-title">{{__('layout.reserve.support for the 3-star hotel patio')}}</h6>
                                        <p style="display: inline-block">
                                            {{__('layout.reserve.contact us if you have any questions')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a href="#"
                                   id="btn-go-to-step-3"
                                   hidden
                                   class="btn-small btn-red btn-submit left">
                                    دریافت واچر
                                </a>
                            </div>
                        </div>
                    </section>
                @elseif($command->title == "open user form")
                    <h3>اطلاعات کاربری</h3>
                    <section style="padding: 0 !important;  width: 100%; display: block !important;">
                        <div id="modal21" class="modal " style="z-index: -1 !important;">
                            <div class="modal-content " style="z-index: -1 !important; height: 150px;">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" id="atm-code">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div style="margin: 0 !important; height: 100px" class="row center">
                                    <button id="btn-upload-check" class="center waves-effect waves-green btn-flat">
                                        ارسال
                                    </button>
                                    <a href="#!" class="center modal-close waves-effect waves-red btn-flat"
                                       id="cancel-reserve" onclick="$('#modal21').modal('close');">لغو</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col l12 s12 rs-col">
                                <div class="center-on-small-only btn-bg">
                                    <span class="">{{__('layout.reserve.your reservation id')}}</span>
                                    <a href="#" class="btn-small  btn-cream bc-2"
                                       id="reservation-code">
                                        BME0001
                                    </a>
                                </div>
                            </div>

                            <div class="col l12 s12 ls-col ">
                                <div id="ss-box" class="ss-box  col l12 " style="padding-bottom: 20px !important;">
                                    <div>
                                        <span class="center ss-title">اطلاعات کابری</span>
                                    </div>
                                    <div id="total-price" class="total-price center-on-small-only" style="padding-bottom: 20px !important;">

                                        <form action="{{route('home.services.launch', ['type'=>'booking' , 'step'=>5])}}" method="post">
                                            {{csrf_field()}}

                                            <input id="email" name="email" type="text" class="dp2 col l11 s11 "
                                                   placeholder="email"
                                                   value="kamisaberi@yahoo.com">

                                            <input id="ssn" name="ssn" type="text" class="dp2 col l11 s11 "
                                                   placeholder="ssn"
                                                   value="2705384108">

                                            <input id="name" name="name" type="text" class="dp2 col l11 s11 "
                                                   placeholder="name"
                                                   value="kami saberi">
                                            <input id="mobile" name="mobile" type="text" class="dp2 col l11 s11 "
                                                   placeholder="mobile"
                                                   value="09365982333">

                                            <input id="phone" name="phone" type="text" class="dp2 col l11 s11 "
                                                   placeholder="phone"
                                                   value="01342547909">

                                            <input type="submit" style="width:100%" href="#" value="تایید اطلاعات و رزرو"
                                                   class="btn-small btn-red btn-submit col l11 s11 ">
                                        </form>


                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col s12 l12 center-on-small-only title-in-post">
                                <h6>{{__('layout.reserve.payment method')}}</h6>
                            </div>
                        </div>
                        <div class="col s12 l12 center-on-small-only res-rules">
                            <h6>{{__('layout.reserve.reservation rules on holidays')}}</h6>
                        </div>


                        <div class="row row-rules">

                            <div class="col s12 row-rules-div">

                                <p>
                                    {{__('layout.reserve.no person or legal person')}}
                                </p>

                            </div>


                        </div>

                        <div class="row row-sup">
                            <div class="col s12 row-sup-div">
                                <div class="row">
                                    <div class=" col l1 s12 img-sup-bg center-on-small-only">
                                        <img class="responsive-img img-sup" src="{{asset('images/support.png')}}">
                                    </div>
                                    <div class=" col l11 s12">
                                        <h6 class="sup-title">{{__('layout.reserve.support for the 3-star hotel patio')}}</h6>
                                        <p style="display: inline-block">
                                            {{__('layout.reserve.contact us if you have any questions')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a href="#"
                                   id="btn-go-to-step-3"
                                   hidden
                                   class="btn-small btn-red btn-submit left">
                                    دریافت واچر
                                </a>
                            </div>
                        </div>
                    </section>
                @elseif($command->title == "open payout page")
                    <h3>{{__('layout.reserve.review and pay')}}</h3>
                    <section style="padding: 0 !important;  width: 100%; display: block !important;">
                        <div class="row">
                            <div class="col l6 s12 rs-col">
                                <div class="center-on-small-only btn-bg">
                                    <span class="">{{__('layout.reserve.your reservation id')}}</span>
                                    <a href="#" class="btn-small  btn-cream bc-2"
                                       id="reservation-code">code</a>
                                </div>
                            </div>
                            <div class="col s12 l12 center-on-small-only title-in-post">
                                <h6>{{__('layout.reserve.payment method')}}</h6>
                            </div>
                        </div>
                        <div class="row " style="min-height: 250px !important;">
                            <div id="pay-box-bg0" class="col l6 s12 height110 pay-col">
                                <div class="pay-box-bg">
                                    <div class="pay-box">
                                        <span>{{__('layout.reserve.internet payment')}}</span>
                                    </div>
                                    <div class="bank-div">
                                        <label hidden>
                                            <input name="group1" type="radio" checked/>
                                            <span>{{__('layout.reserve.through the mellat Bank')}}</span>
                                        </label>
                                        <div class="left img-bank-div  center-align" hidden>
                                            <img src="{{asset('images/Mellat-logo.png')}}">
                                        </div>
                                    </div>
                                    <div class="bank-div border-top">
                                        <label hidden>
                                            <input name="group1" type="radio" checked/>
                                            <span>{{__('layout.reserve.through the saman Bank')}}</span>
                                        </label>

                                        <div class="left img-bank-div  center-align" hidden>
                                            <img src="{{asset('images/Saman-logo.png')}}">
                                        </div>

                                    </div>
                                    <div class="bank-div ">
                                        <a href="{{route('home.services.resume', ['type'=>'online-payout', 'step'=>1])}}" id="pay-online"
                                           class="btn-small btn-red btn-submit btn-pay ">
                                            پرداخت آنلاین
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="pay-box-bg" class="col l6 s12 height110 pay-col2">
                                <div class="pay-box-bg ">
                                    <div class="pay-box">
                                        <span>کارت به کارت</span>
                                    </div>
                                    <div class="bank-div-p center-align ">
                                        <p>
                                            {{__('layout.reserve.you can set the amount by card to card')}}
                                            <br>
                                            {{__('layout.reserve.deposit and send the receipt do')}}
                                        </p>

                                        <br>
                                    </div>
                                    <div class="bank-div bottom-class" style="margin-bottom: 5px !important;">
                                        <input id="btn-open-modal-for-atm-code" type="button" value="ارسال رسید"
                                               class="btn-small btn-red btn-submit btn-pay btn-unavailable disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 l12 center-on-small-only res-rules">
                            <h6>{{__('layout.reserve.reservation rules on holidays')}}</h6>
                        </div>
                        <div class="row row-rules">
                            <div class="col s12 row-rules-div">
                                <p>
                                    {{__('layout.reserve.no person or legal person')}}
                                </p>
                            </div>
                        </div>
                        <div class="row row-sup">
                            <div class="col s12 row-sup-div">
                                <div class="row">
                                    <div class=" col l1 s12 img-sup-bg center-on-small-only">
                                        <img class="responsive-img img-sup" src="{{asset('images/support.png')}}">
                                    </div>
                                    <div class=" col l11 s12">
                                        <h6 class="sup-title">{{__('layout.reserve.support for the 3-star hotel patio')}}</h6>
                                        <p style="display: inline-block">
                                            {{__('layout.reserve.contact us if you have any questions')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a href="#"
                                   id="btn-go-to-step-3"
                                   hidden
                                   class="btn-small btn-red btn-submit left">
                                    دریافت واچر
                                </a>
                            </div>
                        </div>
                    </section>
                @elseif($command->title == "finish page")
                    <h1>finish</h1>
                    <p>booking completed</p>
                @endif
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


    @if($command->title == "open reserve form")

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
                    url: "{{route('home.services.launch', ['type'=>'update-booking-data'])}}",
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

    @elseif($command->title == "wait for room verification")

        <script>
            $(document).ready(function () {
                countdowntimer = $("#countdown-1").countdowntimer({
                    minutes: 15,
                    seconds: 1,
                    size: "lg",
                    timeUp: function () {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{ route('services.change',['type'=>'reserve'])}}",
                            method: 'post',
                            data: {
                                service_id: 0,
                                property: 'situation',
                                value: 4,
                            },
                            success: function (result) {

                                alert('متاسفانه روزو شما جهت ادامه و پردداخت تایید نگردید');
                                // TODO should change window location here after time out
//                                            window.location = '/';
                                window.location = '{{route('home.index2')}}';
                            },
                            error: function (result) {
                                alert(result.status);
                            }
                        });
                    }
                });

                var interval = setInterval(function () {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{route('home.services.launch', ['type'=>'check-room-available'])}}",
                        timeout: 30000,
                        method: 'post',
                        data: {
                            'property': 'situation',
                            'service_id': 0,
                        },
                        success: function (result) {
                            var value = result.message;
                            if (result.result == true) {
                                window.location = "{{route('home.services.resume', ['type'=>'booking', 'step'=> $command->operation['next']])}}";
                            } else {
                                alert("not permitted");
                            }

                            clearInterval(interval);
                        },
                        error: function (result) {
                            // alert(result.status);
                        }
                    });

                }, 5000);

            });

        </script>


    @elseif($command->title == "open user form")

    @elseif($command->title == "open payout page")

    @elseif($command->title == "finish page")

    @endif


@endsection
