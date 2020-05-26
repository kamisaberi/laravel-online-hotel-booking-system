@extends('public.themes.hotel-new.layouts.public2')

@section("header")

    <script type="text/javascript" src="{{asset('scripts/jquery.countdownTimer.js')}}"></script>


@endsection

@section('container')

    {{--    @include('public.themes.hotel-new.subviews.booking.waiting_for_room_verification_booking_form')--}}

    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">
        <div class="post-single" style=" ">
            <div id="example-basic">
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
                    url: "{{route('home.booking.check.room', ['code'=>'BME1111'])}}",
                    timeout: 30000,
                    method: 'post',
                    data: {
                        'property': 'situation',
                        'service_id': 0,
                    },
                    success: function (result) {
                        console.log(result);
                        var value = result.message;
                        if (result.result == true) {
                            window.location = "{{route('home.booking.payout', ['code'=>'BME1111'])}}";
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




@endsection
