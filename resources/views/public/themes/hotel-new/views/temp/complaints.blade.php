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
                    -
                </h6>

                <br>
                <br>
                <br>
                <p style="margin: 0 !important; padding: 0 20px !important; " class="col s12 center">
                    {{$application['description']->value}}
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
