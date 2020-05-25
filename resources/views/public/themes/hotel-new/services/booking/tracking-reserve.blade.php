@extends('public.themes.hotel-new.layouts.public2')

@section("header")


@endsection

@section('container')

    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">
        <div class="post-single" style=" ">
            <div id="example-basic">

                @if($command->title == "open tracking search page")

                    <div class="row">
                        <div class="row">
                            <div class="col l3 s12">
                            </div>
                            <div id="right-side-content" class="col l6 s12  right-side-cn " style="padding: 15px !important;">
                                <h6 class="col s12 center-on-small-only">{{__('layout.user.please login')}}</h6>
                                <form method="post" action="{{ route('home.services.launch', ['type'=>'tracking-reserve', 'step'=> 2]) }}">
                                    {{csrf_field()}}
                                    <input type="text" name="code" id="code" class="dp2 col l11 s12"
                                           placeholder="code">
                                    <div class="col s12 btn-div left-align">
                                        <input type="submit" value="{{__('layout.user.login')}}"
                                               class="btn-small btn-red btn-log  ">
                                    </div>
                                </form>
                            </div>
                            <div class="col l3 s12">
                            </div>
                        </div>
                    </div>
                @elseif($command->title == "open tracking page")
                    <h3>{{__('layout.reserve.tracking reserve')}}</h3>
                    <section style="padding: 0 !important; width: 100%; margin: 0 !important;">

                        @if($found == false )

                            <div class="row" style="padding: 30px">
                                <div class="row">
                                    <div class="col s12 m12 pay-msg center-align" >
                                <span class="red-text">
                                    کد رهگیری مورد نظر یافت نشد
                                </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 m12 pay-msg">
                                <span>
                                    برای پیگیری با
                                    <a href="{{route('home.document', ['type'=>'contact-us'])}}">
                                     پشتیبانی
                                       </a>
                                    هتل تماس حاصل فرمایید
                                </span>
                                    </div>
                                </div>


                            </div>

                        @else

                            <div class="row" style="padding: 30px">


                                <div class="row">
                                    <div class="col s12 m6 pay-msg">
                        <span>
                            نام مشتری:
                            {{$customer['name']->value }}
                        </span>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col s12 m6 pay-msg">
                        <span>
                            کد رهگیری :
                            {{Request::get('code')}}
                        </span>
                                    </div>

                                    <div class="col s12 m6 pay-msg">
                        <span>
                        وضعیت :
                            @if($reserve['situation']->value == 7 || $reserve['situation']->value == 9)
                                تایید شده
                            @else
                                تایید نشده است
                            @endif
                        </span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col s12 m6 pay-msg">
                        <span>
                        تاریخ ورود :
                            {{$reserve['start-date']->value['ja']}}
                        </span>
                                    </div>

                                    <div class="col s12 m6 pay-msg">
                        <span>
                        تاریخ خروج :
                            {{$reserve['end-date']->value['ja']}}
                        </span>
                                    </div>
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
                                            @if($reserve['situation']->value == 7 || $reserve['situation']->value== 9)
                                                <a href="{{route('home.voucher.print' , ['code'=> Request::get('code')])}}"
                                                   id="btn-print-voucher"
                                                   class="btn-small btn-red btn-submit btn-print" target="_blank">
                                                    {{__('layout.reserve.print hotel voucher')}}
                                                </a>
                                            @else
                                                <a href="#"
                                                   id="btn-print-voucher"
                                                   class="btn-small btn-red btn-submit btn-print" target="_blank">
                                                    روزرو تایید نشده است
                                                </a>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                                <div class="col l3 s12 right-s"></div>

                                {{--                        <div id="left-s" class="col l6 s12 left-s">--}}


                                {{--                            <div class="row">--}}

                                {{--                                <div id="img-bg-gb" class="col l4 s12 img-bg-gb center-on-small-only">--}}

                                {{--                                    <img src="{{asset('images/print.png')}}">--}}

                                {{--                                </div>--}}

                                {{--                                <div class="col l8 s12 desc-bg center-on-small-only">--}}

                                {{--                                    <h6>{{__('layout.reserve.payment invoice')}}</h6>--}}
                                {{--                                    <p>--}}
                                {{--                                        {{__('layout.reserve.the payment gateway payment invoice')}}--}}
                                {{--                                    </p>--}}
                                {{--                                    <input type="button" href="#" value="پرینت فاکتور پرداخت"--}}
                                {{--                                           class="btn-small btn-red btn-submit btn-print btn-unavailable">--}}

                                {{--                                </div>--}}

                                {{--                            </div>--}}


                                {{--                        </div>--}}


                            </div>


                            <div class="col s12 l12 res-rules" hidden>


                                <h6>{{__('layout.reserve.how to track')}}</h6>

                            </div>


                            <div class="row row-rules" hidden>

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


                        @endif
                    </section>
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
