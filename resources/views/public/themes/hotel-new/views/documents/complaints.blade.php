@extends('public.themes.hotel-new.layouts.public')

@section("header")

    <link rel="stylesheet" href="{{asset('style/lightslider.css')}}">
    <link rel="stylesheet" href="{{asset('style/style_contact.css')}}">
    <link rel="stylesheet" href="{{asset('style/style_about_us.css')}}">


    @if(in_array(app()->getLocale() , config('base.rtl_locales')) == true)
        <link rel="stylesheet" href="{{asset('style/style_single-rtl.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('style/style_single-ltr.css')}}">
    @endif

    <link rel="stylesheet" href="{{asset('style/style_information-rtl.css')}}">
    <link rel="stylesheet" href="{{asset('style/style_information_step2-rtl.css')}}">


    <link rel="stylesheet" href="{{asset('style/style_contact.css')}}">



    <link rel="stylesheet" href="{{asset('style/lc_lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('style/dark.css')}}">
    <link rel="stylesheet" href="{{asset('style/light.css')}}">
    <link rel="stylesheet" href="{{asset('style/minimal.css')}}">



    <link rel="stylesheet" href="{{asset('style/style_image_gallery.css')}}">



    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet'/>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>


    <script src="{{asset('scripts/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('scripts/lightslider.js')}}"></script>
    <script src="{{asset('scripts/pwt-date.js')}}"></script>
    <script src="{{asset('scripts/pwt-datepicker.js')}}"></script>
    <script src="{{asset('scripts/lc_lightbox.lite.js')}}"></script>
    <script src="{{asset('scripts/alloy_finger.min.js')}}"></script>


@endsection

@section('container')

    <h6 class="center contact_us_h6">
        {{__('layout.pages.register your complaints')}}
    </h6>
    <span class="center contact_us_span"
          style="display: block">
        {{__('layout.pages.if you have any problem please let us know')}}
</span>


    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">

        <div class="post-single">


            <div class="row">

                <div id="right-side-content" class="col l6 s12  content-right-side center"
                     style="padding: 15px !important;">
                    <img class="logo_cu responsive-img" src="{{asset('images/main_logo_cu.png')}}">
                    <h6>
                        {{__('layout.pages.manager')}}
                        فریبرز صبوری ویشکایی
                    </h6>

                    <br>
                    <br>
                    <br>
                    <p style="margin: 0 !important; padding: 0 20px !important; " class="col s12 center">
                        {{$website->description}}
                    </p>


                    <div id="btn-mail" class="col l5 s12 btn-mail-address center">

                        <img class="mail-icon" src="{{asset('images/main-address.png')}}">
                        <span>{{$hotel['email']->value}}</span>

                    </div>

                    <div id="btn-number" class="col l5 offset-l1 s12 btn-mail-address center">

                        <img class="mail-icon" src="{{asset('images/telephone.png')}}">
                        @foreach($hotel['phone']->value as $t)
                            <span dir="ltr">{{$t}}</span>
                        @endforeach

                    </div>

                    <div class="col s12 spn-address">
                        <span> {{$hotel['address']->value}}</span>
                    </div>

                </div>


                <div id="left-side-content2" class="col l6 s12  content-left-side center">

                    <form id="frm-send-message">


                        <input type="text" id="input-name" name="input-name" class="input-cu dp4 col s12 left"
                               placeholder="نام و نام خانوادگی">

                        <span id="spn-name-alert" class="invalid-feedback" role="alert" hidden>
                        <strong>
                            {{__('layout.pages.enter your name')}}
</strong>
                    </span>
                        <br>


                        <input type="email" id="input-email" name="input-email" class="input-cu col s12 left"
                               placeholder="آدرس ایمیل">

                        <span id="spn-email-alert" class="invalid-feedback" role="alert" hidden>
                        <strong>
                                                {{__('layout.pages.enter your email')}}
                        </strong>
                    </span>
                        <br>


                        <input type="text" id="input-mobile" name="input-mobile" class="input-cu col s12 left"
                               onkeypress="return isNumberKey(event)"
                               oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               maxlength="13"
                               minlength="10"
                               placeholder="شماره تماس">
                        <span id="spn-mobile-alert" class="invalid-feedback" role="alert" hidden>
                        <strong>
                                                {{__('layout.pages.enter your mobile number')}}

                        </strong>
                    </span>
                        <br>


                        <textarea id="txt-area" name="txt-area" class="txt-area col s12 left"
                                  placeholder=" متن شکایت خود را بنویسید."></textarea>


                        <span id="spn-content-alert" class="invalid-feedback" role="alert" hidden>
                        <strong>
                                                {{__('layout.pages.write your message')}}
                        </strong>
                    </span>
                        <br>

                        <input id="btn-send-complaint-contact" type="button" class="btn-small btn-sendd left"
                               value="{{__('layout.pages.send')}}">
                    </form>


                    <!--content-left-side-->


                </div>


            </div>


        </div>

        <!--post single-->

    </div>



@endsection

@section("footer")

    <script src="{{asset('scripts/lightslider.js')}}"></script>

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

        $(document).ready(function (e) {
            // live handler
            lc_lightbox('.elem', {
                wrap_class: 'lcl_fade_oc',
                gallery: true,
                thumb_attr: 'data-lcl-thumb',

                skin: 'dark',
                radius: 0,
                padding: 0,
                border_w: 0,
//            fullscreen    : true,
            });

        });


        $("#btn-send-message-contact").click(function () {

//            alert("test 111");
//            return;

            var error = false;

            var input_email = $('#input-email');
            var input_name = $('#input-name');
            var input_mobile = $('#input-mobile');
            var txt_area = $('#txt-area');

            var spn_name_alert = $("#spn-name-alert");
            var spn_email_alert = $("#spn-email-alert");
            var spn_mobile_alert = $("#spn-mobile-alert");
            var spn_content_alert = $("#spn-content-alert");


            if (input_name.val().trim() == "") {
                spn_name_alert.prop('hidden', false);
                error = true;
            } else {
                spn_name_alert.prop('hidden', true);
            }

            if (input_email.val().trim() == "") {
                spn_email_alert.prop('hidden', false);
                error = true;
            } else {
                spn_email_alert.prop('hidden', true);
            }


            if (input_mobile.val().trim() == "") {
                spn_mobile_alert.prop('hidden', false);
                error = true;
            } else {
                spn_mobile_alert.prop('hidden', true);
            }


            if (txt_area.val().trim() == "") {
                spn_content_alert.prop('hidden', false);
                error = true;
            } else {
                spn_content_alert.prop('hidden', true);
            }

//            alert(error);

            if (error == true)
                return;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });


            var email = input_email.val();
            var name = input_name.val();
            var mobile = input_mobile.val();
            var content = txt_area.val();

//            alert(email + " " + name + " " + mobile + " " + location + " " + message);
//            return;

            $.ajax({
                url: "{{url("/documents/ajax/save")}}",
                timeout: 30000,
                method: 'post',
                data: {
                    'email': email,
                    'name': name,
                    'mobile': mobile,
                    'content': content,
                    'type': 'message'
                },
                success: function (result) {
                    input_email.val("");
                    input_name.val("");
                    input_mobile.val("");
                    txt_area.val("");

                    alert("پیغام با موفقیت ارسال شد");

                },
                error: function (result) {
                   alert("error code :" + result.status);
                }
            });
        });






        $("#btn-send-complaint-contact").click(function () {

//            alert("test 111");
//            return;

            var error = false;

            var input_email = $('#input-email');
            var input_name = $('#input-name');
            var input_mobile = $('#input-mobile');
            var txt_area = $('#txt-area');

            var spn_name_alert = $("#spn-name-alert");
            var spn_email_alert = $("#spn-email-alert");
            var spn_mobile_alert = $("#spn-mobile-alert");
            var spn_content_alert = $("#spn-content-alert");


            if (input_name.val().trim() == "") {
                spn_name_alert.prop('hidden', false);
                error = true;
            } else {
                spn_name_alert.prop('hidden', true);
            }

            if (input_email.val().trim() == "") {
                spn_email_alert.prop('hidden', false);
                error = true;
            } else {
                spn_email_alert.prop('hidden', true);
            }


            if (input_mobile.val().trim() == "") {
                spn_mobile_alert.prop('hidden', false);
                error = true;
            } else {
                spn_mobile_alert.prop('hidden', true);
            }


            if (txt_area.val().trim() == "") {
                spn_content_alert.prop('hidden', false);
                error = true;
            } else {
                spn_content_alert.prop('hidden', true);
            }

//            alert(error);

            if (error == true)
                return;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });


            var email = input_email.val();
            var name = input_name.val();
            var mobile = input_mobile.val();
            var content = txt_area.val();

//            alert(email + " " + name + " " + mobile + " " + location + " " + message);
//            return;

            $.ajax({
                url: "{{url("/documents/ajax/save")}}",
                timeout: 30000,
                method: 'post',
                data: {
                    'email': email,
                    'name': name,
                    'mobile': mobile,
                    'content': content,
                    'type': 'complaint'
                },
                success: function (result) {
                    input_email.val("");
                    input_name.val("");
                    input_mobile.val("");
                    txt_area.val("");

                    alert("پیغام با موفقیت ارسال شد");

                },
                error: function (result) {
                    alert("error code :" + result.status);
                }
            });
        });


    </script>

@endsection
