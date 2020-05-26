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
                                    <a href="{{route('home.booking.to.bank', ['code'=>'BME1111'])}}" id="pay-online"
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
        });

    </script>



@endsection
