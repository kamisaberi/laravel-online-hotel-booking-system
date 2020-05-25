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
                        <a href="{{route('home.user.register',['user_type'=>'customer'])}}">
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
