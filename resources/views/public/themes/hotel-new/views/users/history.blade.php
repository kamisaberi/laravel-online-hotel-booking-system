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
        <div class="post-single" style=" ">
            <div id="example-basic">
                <h3>{{__('layout.reserve.tracking reserve')}}</h3>
                <section style="padding: 0 !important; width: 100%; margin: 0 !important;">
                    <div class="row" style="padding: 30px">
                        <div class="row">
                            <div class="col s12 m6 pay-msg">
                        <span>
                            نام مشتری:
                            {{$customer->properties['name']->value }}
                        </span>
                            </div>
                        </div>
                        <div class="col l1 s12 right-s"></div>
                        <div class="col l10 s12 right-s">

                            <table>
                                <thead>
                                    <tr>
                                        <th>تاریخ ورود</th>
                                        <th>تاریخ خروج</th>
                                        <th>هزینه</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reserves as $reserve )
                                        <tr>
                                            <td class="text-truncate">{{$reserve->properties['start-date']->value['ja']}}</td>
                                            <td class="text-truncate">{{$reserve->properties['end-date']->value['ja']}}</td>
                                            <td class="text-truncate">{{number_format($reserve->properties['price']->value)}}</td>
                                            <td class="text-truncate">
                                                <a href="{{route('home.voucher.print', ['code'=>$reserve->properties['code']->value])}}" target="_blank" title="واچر">
                                                    واچر
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="col l1 s12 right-s"></div>
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
