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

    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">

        <div class="post-single" style="min-height: 1000px">

            <div class="row" style="padding-top: 50px ">

                <div class="col s12 cream-box ">


                    <h6 style="line-height: 40px; margin: 0 30px 0 0 !important;">
                        مراحل ثبت و تایید رزرو: 

                    </h6>

                </div>
            </div>

            <div class="row row-rules">

                <div class="col s12 row-rules-div">

                    <p>
                        پس از ثبت اطلاعات میهمان پیامکی جهت تایید رزرو ارسال می گردد که پس از دریافت این پیام میهمان موظف است حداکثر تا دو ساعت هزینه اقامت را پرداخت نماید در غیر اینصورت هتل سیر هیچ مسئولیتی در قبال حفظ رزرو نخواهد داشت مگر اینکه تایید مجدد از همکاران ما دریافت شود.
                    </p>

                </div>


            </div>

            <div class="row" style="padding-top: 50px ">

                <div class="col s12 cream-box ">


                    <h6 style="line-height: 40px; margin: 0 30px 0 0 !important;">
                        اطلاعات و مشخصات هتلها: 


                    </h6>

                </div>
            </div>

            <div class="row row-rules">

                <div class="col s12 row-rules-div">

                    <p>
                        مسئوليت کلية اطلاعات و مشخصاتي که در مورد هتلها در سايت مشاهده مي شود اعم از نرخ برد، وجود صبحانه براي اتاقها، استخر و سونا، نرخ اقامت کودک، ترانسفر از فرودگاه و کليه امکانات و تجهيزاتي که نام برده شده است بعهده هتل مي باشد، زيرا اين اطلاعات عيناً از هتلها اخذ گرديده و بر روي سایت قرار گرفته اند و هتل سیر مسئولیتی در قبال صحت و سقم این اطلاعات ندارد.
                    </p>

                </div>


            </div>


            <div class="row" style="padding-top: 50px ">
                <div class="col s12 cream-box ">
                    <h6 style="line-height: 40px; margin: 0 30px 0 0 !important;">
                        قوانين اصلاح و یا لغو رزرو:
                    </h6>

                </div>
            </div>
            <div class="row row-rules">
                <div class="col s12 row-rules-div">
                    <p>
                        میهمان به هر دليل ممکن است از سفر خود منصرف گردد و یا تاریخ اقامت خود و نوع اتاق را تغییر دهد، در این صورت می تواند از بخش پیگیری رزرو یا تماس تلفنی با همکاران در خواست خود را اعلام نمایند در این صورت مطابق با قوانین کنسلی هتل مربوطه رفتار می گردد و رزرواسیون هتل سیر تابع قوانین هتل می باشد متاسفانه با توجه به اينکه تا اين لحظه بسياري از هتلهاي ايران تحت قانون يکساني عمل نمي نمايند و هرکدام قانون مربوط به خود را داشته و بازهم متاسفانه قانون ايشان نيز هر از چند گاه تغيير ميبابد، پس از دريافت درخواست لغو رزرو از طرف میهمان، قانون هتل استعلام شده و بر طبق اين قانون، مبلغ جريمه کسر گردیده و مابقي به میهمان بازمي گردد.
                    </p>
                </div>
            </div>

            <div class="row" style="padding-top: 50px ">
                <div class="col s12 cream-box ">
                    <h6 style="line-height: 40px; margin: 0 30px 0 0 !important;">
                        ورود به شهر مقصد و اقامت در هتل:
                    </h6>

                </div>
            </div>
            <div class="row row-rules">
                <div class="col s12 row-rules-div">
                    <p>
                        اين مرکز هيچگونه مسئوليتي در قبال کلية مواردي که در زمان ورود میهمان به شهر مورد نظر وجود دارد، اعم از استقبال در فرودگاه، کيفيت اتاق، کيفيت غذا و خدمات هتل و غيره را ندارد، ليکن در نظرسنجي هايي که از میهمانان عزیز هتل پس از سفر ايشان بعمل خواهد آمد، موارد از اخذ گرديده و در موقعيت اطلاعات هتل در سايت هتل سیر تاثير خواهد داشت.
                    </p>
                </div>
            </div>


            <div class="row" style="padding-top: 50px ">
                <div class="col s12 cream-box ">
                    <h6 style="line-height: 40px; margin: 0 30px 0 0 !important;">
                        موارد خاص:
                    </h6>

                </div>
            </div>
            <div class="row row-rules">
                <div class="col s12 row-rules-div">
                    <p>
                        در شرایط خاص از قبیل سیل، آتش سوزی، زلزله، ، بسته شدن جاده ها، حضور مقامات بلند پایه لشگری و کشوری و... هتل سیر سعی می نماید هتلی مطابق با نظر میهمان جایگزین نماید و چنانچه میهمان نپذیرد و هتل مورد نظرصورتحساب شارژ ننماید کل هزینه ها به میهمان عودت داده می شود.
                    </p>
                </div>
            </div>

            <div class="row" style="padding-top: 50px ">
                <div class="col s12 cream-box ">
                    <h6 style="line-height: 40px; margin: 0 30px 0 0 !important;">
                    </h6>
                </div>
            </div>
            <div class="row row-rules">
                <div class="col s12 row-rules-div">
                    <p>
                        توجه: کسانی که به هر نحو در عملکرد سامانه اختلال ایجاد کنند، مانند ثبت رزروهای غیرواقعی، تماس های تلفنی و ایجاد مزاحمت و ... مطابق با قانون تجارت الکترونیک ایران و قوانین جرائم اینترنتی قوة محترم قضاييه مجرم بوده و حق پیگیری و شکایت از طریق پلیس فتا برای رزرواسیون هتل سیر محفوظ است.                </p>
                </div>
            </div>


            <div class="row row-sup">

                <div class="col s12 row-sup-div">

                    <div class="row">

                        <div class=" col l1 s12 img-sup-bg center-on-small-only">

                            <img  class="responsive-img img-sup" src="{{asset('images/support.png')}}">

                        </div>



                        <div class=" col l11 s12">

                            <h6 class="sup-title">پشتیبانی هتل سه ستاره صبوری</h6>
                            <p style="display: inline-block">در صورت بروز هر گونه سوال یا وجود مشکل در روند پرداخت یا عملکرد سایت با پشتیبانی ما ارتباط برقرار نمایید تا مشکل موجود رفع شود و شما همچون روال رزرو به پرداخت خود ادامه دهید و مشکلی نباشد.</p>

                        </div>



                    </div>
                </div>


            </div>


        </div>


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
