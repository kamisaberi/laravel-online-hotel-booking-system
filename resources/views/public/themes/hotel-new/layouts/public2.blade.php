<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <title>website title</title>


        <meta name="description"
              content="website meta-description">

        <meta name="keywords"
              content="website meta-keywords">

        <link rel="canonical" href="{{url('/')}}"/>

        <meta name="robots" content="index,follow">
        <meta name="_token" content="{{csrf_token()}}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{asset('style/materialize.min.css')}}">

        @if(in_array(app()->getLocale() , config('base.rtl_locales')) == true)
            <link rel="stylesheet" href="{{asset('style/jquery.steps-rtl.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('style/jquery.steps-ltr.css')}}">
        @endif

        @if(in_array(app()->getLocale() , config('base.rtl_locales')) == true)
            <link rel="stylesheet" href="{{asset('style/rtl.css')}}">
        @endif


        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('style/jquery.slide.css')}}">
        <link rel="stylesheet" href="{{asset('style/lightslider.css')}}">
        <link href="{{asset('style/jquerysctipttop.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('style/pwt-datepicker.css')}}">


        @if(in_array(app()->getLocale() , config('base.rtl_locales')) == true)
            <link rel="stylesheet" href="{{asset('style/style-rtl.css')}}">
            <link rel="stylesheet" href="{{asset('style/style_single-rtl.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('style/style-ltr.css')}}">
            <link rel="stylesheet" href="{{asset('style/style_single-ltr.css')}}">
        @endif

        @if(in_array(app()->getLocale() , config('base.rtl_locales')) == true)
            <link rel="stylesheet" href="{{asset('style/style_information-rtl.css')}}">
            <link rel="stylesheet" href="{{asset('style/style_information_step2-rtl.css')}}">
            <link rel="stylesheet" href="{{asset('style/style_information_step3-rtl.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('style/style_information-ltr.css')}}">
            <link rel="stylesheet" href="{{asset('style/style_information_step2-ltr.css')}}">
            <link rel="stylesheet" href="{{asset('style/style_information_step3-ltr.css')}}">
        @endif


        <link rel="stylesheet" href="{{asset('style/modal.css')}}">


        <script type="text/javascript" src="{{asset('vendors/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('scripts/lightslider.js')}}"></script>
        <script src="{{asset('scripts/jquery.simple.timer.js')}}"></script>
        <script src="{{asset('scripts/pwt-date.js')}}"></script>
        <script src="{{asset('scripts/pwt-datepicker.js')}}"></script>
        <script src="{{asset('scripts/jquery.steps.js')}}"></script>
        <script src="{{asset('scripts/jquery.countdown360.min.js')}}"></script>

        {{--        <script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
        <script src="{{asset('vendors/vue/dist/vue.js')}}"></script>
        {{--        <script src="https://cdn.jsdelivr.net/npm/moment"></script>--}}
        <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('vendors/moment-jalaali/build/moment-jalaali.js')}}"></script>
        <script src="{{asset('vendors/vue-persian-datetime-picker-master/dist/vue-persian-datetime-picker-browser.js')}}"></script>

        @yield('header')


    </head>

    <body class="rtl">


        <nav class="headerm" role="navigation">
            <div class="nav-wrapper container">


                <a id="logo-container" href="{{route('home.index2')}}" class="brand-logo center logo-bg"><img
                            class="responsive-img img-logo"
                            src="{{asset('images/main_logo.png')}}"></a>


                <div class="mini-phone-left-side hide-on-med-and-down">
                        <span dir="ltr">hotel mobile</span>
                    <img class="icon10 responsive-img" src="{{asset('images/telephone.png')}}">

                </div>

                <div class="row flags hide-on-med-and-down">

                    <a href="{{ url('locale/en') }}"><img class=" responsive-img img-flag"
                                                          src="{{asset('images/united-kingdom.png')}}"></a>
                    <a href="{{ url('locale/ar') }}"><img class=" responsive-img img-flag"
                                                          src="{{asset('images/saudi-arabia.png')}}"></a>
                    <a href="{{ url('locale/fa') }}"><img class=" responsive-img img-flag"
                                                          src="{{asset('images/iran.png')}}"></a>


                    <span style="margin-left: 100px;margin-right: 100px;" class="hide-on-med-and-down">
                            <a href="website telegram-link">
                            <img class=" responsive-img img-flag" src="{{asset('images/telegram-512.png')}}">
                        </a>
                            <a href="website instagram-link">
                            <img class=" responsive-img img-flag" src="{{asset('images/instagram-512.png')}}">
                        </a>
                    </span>

                </div>

                <a href="#" data-target="mobile-demo" class="sidenav-trigger hide-on-large-only right"><i
                            class="material-icons">menu</i></a>
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
            @foreach($mobile_navigations as $navigation)
                @if($navigation->link_type == "route")

                    @if(isset($navigation->properties->key) and  isset($navigation->properties->value) )
                        <li>
                            <a href="{{route($navigation->properties->route, [$navigation->properties->key=>$navigation->properties->value])}}">
                                {{$navigation->properties->title}}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{route($navigation->properties->route)}}">
                                {{$navigation->properties->title}}
                            </a>
                        </li>
                    @endif
                @elseif($navigation->link_type == "url")
                    <li>
                        <a href="{{$navigation->properties->url}}">
                            {{$navigation->properties->title}}
                        </a>
                    </li>
                @endif

            @endforeach
        </ul>

        <!--mini menu-->

        <div class="mini-menu ">


            <div class="container">
                <div class="row hide-on-med-and-down">


                    <span class="important-inf">{{__('layout.public.important notification')}}</span>
                    <span class="important-txt">{{__('layout.public.hotel online reservation system version')}}
                        <span style="color: red;">{{env('APP_VERSION')}}</span>
                        {{__('layout.public.has been launched')}}
                    </span>

                    <div class="mini-menu-left-side ">
                        @if(Auth::check() ==false)
                            <a href="{{route('home.customer.login')}}">
                                <span>{{__('layout.public.login or register')}}</span>
                            </a>
                            <img class="icon10 responsive-img"
                                 src="{{asset('images/login-square-arrow-button-outline.png')}}">
                        @else
                            <a href="#">
                                <span>{{__('layout.public.reserves history')}}</span>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{route('auth.logout')}}">
                                <span>
                                    {{__('layout.public.logout')}}
                                </span>
                                <img class="icon10 responsive-img"
                                     src="{{asset('images/login-square-arrow-button-outline.png')}}">
                            </a>
                        @endif

                        <a hidden href="#">
                            <span class="track-booking-span">{{__('layout.public.check reservation')}}</span>
                        </a>
                        <img hidden class="icon10 responsive-img" src="{{asset('images/verified.png')}}">

                    </div>

                </div>
            </div>


        </div>

        <!--main menu-->

        <div class="main-menu hide-on-med-and-down">


            <div class="container">


                <div class="row">

                    @php($a=1)
                    @foreach($navigations as $navigation)


                        @if($navigation->link_type == "route")


                            @if(isset($navigation->properties->key) and  isset($navigation->properties->value) )


                                <div class="main-menu-parent col l3 s12 menu-hover">

                                    @if($a ==1 )
                                        <img class="center" src="{{asset('images/door-hanger.png')}}">
                                    @elseif($a ==2)
                                        <img class="center" src="{{asset('images/newspaper.png')}}">
                                    @elseif($a ==3)
                                        <img class="center" src="{{asset('images/image.png')}}">
                                    @elseif($a ==4)
                                        <img class="center" src="{{asset('images/telephone2.png')}}">
                                    @endif


                                    <div class="main-menu-child">
                                        <a href="{{route($navigation->properties->route, [$navigation->properties->key=>$navigation->properties->value])}}">
                                            {{$navigation->properties->title}}

                                        </a>
                                        <br>
                                        <span>
                                        {{$navigation->properties->title}}
</span>
                                    </div>
                                </div>


                            @else


                                <div class="main-menu-parent col l3 s12 menu-hover">

                                    @if($a ==1 )
                                        <img class="center" src="{{asset('images/door-hanger.png')}}">
                                    @elseif($a ==2)
                                        <img class="center" src="{{asset('images/newspaper.png')}}">
                                    @elseif($a ==3)
                                        <img class="center" src="{{asset('images/image.png')}}">
                                    @elseif($a ==4)
                                        <img class="center" src="{{asset('images/telephone2.png')}}">
                                    @endif

                                    <div class="main-menu-child">
                                        <a href="{{route($navigation->properties->route)}}">
                                            {{$navigation->properties->title}}
                                        </a>
                                        <br>
                                        <span>
                                        {{$navigation->properties->title}}
</span>
                                    </div>
                                </div>


                            @endif

                        @elseif($navigation->link_type == "url")
                            <li>
                                <a href="{{$navigation ->properties->url}}">
                                    {{$navigation->properties->title}}
                                </a>
                            </li>
                        @endif


                        @php($a++)

                    @endforeach



                </div>


            </div>

        </div>


    @yield('container')
    <!--post single-->
        <!--</div>-->
        <div class="mini-footer">
            <div class="container center-on-small-only">
                <span>{{__('layout.public.all right reserved to hotel sabouri')}}</span>
            </div>
        </div>

    {{--<div style="position: fixed; right:0; bottom: 0;">--}}
    {{--<!--Start of Tawk.to Script-->--}}
    {{--<script type="text/javascript">--}}
    {{--var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();--}}
    {{--(function () {--}}
    {{--var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];--}}
    {{--s1.async = true;--}}
    {{--s1.src = 'https://embed.tawk.to/5cea6742a667a0210d597b7b/default';--}}
    {{--s1.charset = 'UTF-8';--}}
    {{--s1.setAttribute('crossorigin', '*');--}}
    {{--s0.parentNode.insertBefore(s1, s0);--}}
    {{--})();--}}
    {{--</script>--}}
    {{--<!--End of Tawk.to Script-->--}}
    {{--</div>--}}



    <!--scripts-->
        <script src="{{asset('scripts/materialize.min.js')}}"></script>
        <script src="{{asset('scripts/jquery.slide.min.js')}}"></script>
        <script src="{{asset('scripts/init.js')}}"></script>


        <script language=Javascript>
            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        </script>


        @yield('footer')

    </body>


</html>