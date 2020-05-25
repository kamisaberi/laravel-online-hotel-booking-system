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

    @if(count($widgets) > 0 and $widgets[0]->type == 'main')
        @include($widgets[0]->name, ['datas'=>$datas])
    @endif






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
