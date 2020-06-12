@extends('public.themes.hotel-new.layouts.public2')

@section("header")

    <link rel="stylesheet" href="{{asset('style/style_contact.css')}}">
    <link rel="stylesheet" href="{{asset('style/style_login.css')}}">


    <script>
        $(document).ready(function () {


            $("#btn-register").click(function (event) {

                $("#spn-password-confirmation").prop('hidden', true);
                var password_confirm = $("#password-confirm").val();
                var password = $("#password").val();

                if (password != password_confirm) {

//                    var text = "<span class='invalid-feedback' role='alert'><strong>password not matched</strong></span>";
//                    $("#password-confirm").before(text);
                    $("#spn-password-confirmation").prop('hidden', false);
                    event.preventDefault();
                }

            });


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
//position : [2, 2],
                autoclose: true,
                toolbox: true,
                altField: "#alternateField",
                altFormat: "u",
                altFieldFormatter: function (unix) {
                    var pdate = new persianDate(unix);
                    pdate.formatPersian
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
            dp = $(".datePicker").data("datepicker");
        });

    </script>

@endsection

@section('container')

    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">

        <div class="post-single">

            <div class="row">

                <div class="col s12 red-msg" hidden>
                    <span>کاربران عزیز هتل صبوری، تا اطلاع ثانوی بخش پنل کاربری سایت در حال بروز رسانی می باشد.</span>
                </div>

                <div class="col s12 red-msg" hidden>
                    <span>در وارد کردن مشخصات دقت کنید، نام کاربری وارد شده در سیستم موجود نمی باشد.</span>
                </div>

                <div class="col s12 red-msg" hidden>
                    <span>سایت در حال بروز رسانی میباشد.</span>
                </div>


                <div class="row">
                    <div class="col l3 s12">

                    </div>
                    <div id="right-side-content" class="col l6 s12  right-side-cn "
                         style="padding: 15px !important;">

                        <h6 class="col s12 center-on-small-only">{{__('layout.user.please login')}}</h6>

                        <form method="post" action="{{ route('auth.login', ['type'=>'customer']) }}">
                        {{csrf_field()}}
                        <!--todo space ghable place holder-->

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $errors->first('mobile') }}
                            </strong>
                        </span>
                            @endif
                            <input type="text" name="mobile" id="mobile" class="dp2 col l11 s12"
                                   placeholder="{{__('layout.user.email place holder')}}">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $errors->first('password') }}
                            </strong>
                        </span>
                            @endif
                            <input type="password" name="password" id="password" class="dp2 col l11 s12"
                                   placeholder="{{__('layout.user.password place holder')}}">

                            <div class="col s12 btn-div left-align">
                                <input type="submit" value="{{__('layout.user.login')}}"
                                       class="btn-small btn-red btn-log  ">
                            </div>

                        </form>


                    </div>
                    <div class="col l3 s12">

                    </div>

                </div>
                <div class="row">
                    <div class="col l3 s12">
                    </div>
                    <div class="col l6 s12">
                        <div id="more-inf" class="more-inf center-on-small-only" style="margin-right: 0 !important;">
                            <a href="#">{{__('layout.user.forgot your password')}}</a>
                            <img class="responsive-img" src="{{asset('images/left-arrow.png')}}">
                        </div>

                        <div id="more-inf" class="more-inf center-on-small-only" style="margin-right: 0 !important;">
                            <a href="{{route('home.customer.register')}}">
                                {{__('layout.user.register')}}
                            </a>
                            <img class="responsive-img" src="{{asset('images/left-arrow.png')}}">
                        </div>
                    </div>
                    <div class="col l3 s12">
                    </div>
                </div>
            </div>
        </div>
        <!--post single-->

    </div>

@endsection

@section("footer")

    <script>

        var current_reserve_id = 0;

        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function () {
            $('.parallax').parallax();
            $('.modal').modal();
            $("#modal2").modal({
                dismissible: false
            });
            $('select').formSelect();

        });


        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function () {


        });


        // Initialize wizard
        stepsWizard = $("#example-basic").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onInit: function (event, current) {
                $('.actions > ul > li').attr('style', 'display:none');
            },
            labels: {
                finish: 'ff',
                next: 'nn',
                previous: 'pp'
            },
            autoFocus: true,
        });


        $("#countdown").countdown360({
            radius: 40,
            seconds: 100,
            strokeWidth: 8,
            fontColor: '#FFFFFF',
            label: false,
            fillStyle: "#f4eee5",
            strokeStyle: "#9d0808",
            fontColor: "#664040",

            autoStart: false,
            onComplete: function () {
                console.log('done')
            }
        }).start()


        $("#pay-online").click(function () {
            $("#btn-go-to-step-3").prop('disabled', '');
        })

    </script>


@endsection
