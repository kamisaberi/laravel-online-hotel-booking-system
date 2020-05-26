@extends('public.themes.hotel-new.layouts.public2')

@section("header")

    <script type="text/javascript" src="{{asset('scripts/jquery.countdownTimer.js')}}"></script>


@endsection

@section('container')

{{--    @include('public.themes.hotel-new.subviews.booking.waiting_for_room_verification_booking_form')--}}

    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">
        <div class="post-single" style=" ">
            <div id="example-basic">
                <h3>{{__('layout.reserve.get hotel voucher')}}</h3>
                <section style="padding: 0 !important; width: 100%; margin: 0 !important;">
                    <div class="row" style="padding: 30px">
                        <div class="col s12 pay-msg">
                            <span>{{__('layout.reserve.your payment has been successfully completed')}}</span>
                        </div>
                        <div class="col l3 s12 right-s"></div>
                        <div class="col l6 s12 right-s">
                            <div class="row">
                                <div id="img-bg-gb" class="col l4 s12 img-bg-gb center-on-small-only">
                                    <img src="{{asset('images/qabz.png')}}">
                                </div>
                                <div class="col l8 s12 desc-bg center-on-small-only">
                                    <h6>{{__('layout.reserve.your room reservation voucher')}}</h6>
                                    <p>
                                        {{__('layout.reserve.you need a witch to stay in your room')}}
                                    </p>
                                    <a href="{{route('home.voucher.print' , ['code'=> Request::get('code')])}}"
                                       id="btn-print-voucher"
                                       class="btn-small btn-red btn-submit btn-print" target="_blank">
                                        {{__('layout.reserve.print hotel voucher')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col l3 s12 right-s"></div>
                    </div>
                    <div class="col s12 l12 res-rules">
                        <h6>{{__('layout.reserve.how to track')}}</h6>
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
                                    <h6 class="sup-title">
                                        {{__('layout.reserve.support for the 3-star hotel patio')}}
                                    </h6>
                                    <p style="display: inline-block">
                                        {{__('layout.reserve.in case of any questions or problems')}}
                                    </p>
                                </div>
                            </div>
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

@endsection
