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

            <div id="right-side-content" class="col l6 s12  right-side-cn "
                 style="padding: 15px !important;">


                <h6 class="col s12 center-on-small-only">وارد شوید</h6>

                <form method="post" action="{{ route('login') }}">
                {{csrf_field()}}
                <!--todo space ghable place holder-->

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $errors->first('email') }}
                            </strong>
                        </span>
                    @endif
                    <input type="text" name="email" id="email" class="dp2 col l11 s12" placeholder="  آدرس ایمیل">


                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $errors->first('password') }}
                            </strong>
                        </span>
                    @endif
                    <input type="password" name="password" id="password" class="dp2 col l11 s12"
                           placeholder="  رمز عبور">

                    <div class="col s12 btn-div left-align">
                        <input type="submit" value="ورود به سایت" class="btn-small btn-red btn-log  ">
                    </div>

                </form>

                <div id="more-inf" class="more-inf center-on-small-only" style="margin-right: 0 !important;">
                    <a href="#">فراموش<span> رمز </span>عبور</a>
                    <img class="responsive-img" src="{{asset('images/left-arrow.png')}}">
                </div>


            </div>







            <div id="right-side-content" class="col l6 s12  right-side-cn " style="padding: 15px !important;">
                <h6 class="col s12 center-on-small-only">عضویت در سایت</h6>
                <form method="post" action="{{ route('register')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="user_type" value="2" id="user_type">




                    <!--todo space ghable place holder-->
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email')}}</strong>
                                    </span>
                    @endif

                    <input dir="ltr" type="text" id="email" name="email" class="dp2 col l11 s12"
                           placeholder=" آدرس ایمیل"
                           value="{{env('DEBUG_MODE') == 1? "k@ya.com"  : ""  }}">


                    @if ($errors->has('password'))
                        <p class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password')}}</strong>
                                    </p>
                    @endif

                    <input dir="ltr" type="password" id="password" name="password" class="dp2 col l11 s12"
                           placeholder="  رمز عبور"
                           value="{{env('DEBUG_MODE') == 1? "1234"  : ""  }}">





                    <span class="invalid-feedback" role="alert" id="spn-password-confirmation" hidden>
                                        <strong>password not matched</strong>
                                    </span>
                    <input dir="ltr" type="password" id="rg-password-confirm" name="rg-password_confirmation"
                           class="dp2 col l11 s12"
                           placeholder="  رمز عبور مجدد" value="{{env('DEBUG_MODE') == 1? "1234"  : ""  }}">


                    <input dir="ltr" type="text" name="mobile" id="mobile" class="dp2 col l11 s12"
                           placeholder="  شماره تماس"
                           value="{{env('DEBUG_MODE') == 1? "936541245"  : ""  }}">


                    <div class="col s12 btn-div left-align">
                        <input id="btn-register" type="submit" value="ثبت نام" class="btn-small btn-red btn-log  ">
                    </div>
                </form>

                <div id="more-inf" class="more-inf center-on-small-only" style="margin-right: 0 !important;">
                    <a href="{{route('home.document', ['document_type'=>'rules'])}}">مشاهده<span> قوانین </span>سایت</a>
                    <img class="responsive-img" src="{{asset('images/left-arrow.png')}}">
                </div>


            </div>


        </div>


    </div>

    <!--post single-->

</div>
