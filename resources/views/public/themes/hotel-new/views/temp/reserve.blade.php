<div class="container" style="margin-top: 35px; margin-bottom: 35px;">

    <div class="post-single" style=" ">

        <div id="example-basic">

            @if(Request::get('step') == 1)

                <h3>{{__('layout.reserve.fill information')}}</h3>
                <section style="padding: 0 !important;  width: 100%">

                    <div class="row">

                        <!--right side of post header-->
                        <div class="col l6 s12 center-on-small-only">
                            <h6 id="title-h6">{{__('layout.reserve.reservatore information')}}</h6>

                        </div>


                        <div id="modal3" class="modal " style="z-index: -1 !important;">
                            <div class="modal-content " style="z-index: -1 !important; height: 150px;">
                                <center>
                                    <div id="countdown"></div>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <div style="margin: 0 !important; height: 100px" class="row center">

                                    <h6 class="center h6-modal">آیا میخواهید این ماجرا را کنسل کنید ؟</h6>
                                    <span class="span-mosal">در صورت تمام شدن زمان شما به مرحله بعدی می روید</span>

                                    <a href="#!" class="center modal-close waves-effect waves-green btn-flat">خیر، ادامه
                                        می
                                        دهم</a>
                                    <a href="#!" class="center modal-close waves-effect waves-red btn-flat"
                                       id="cancel-reserve1">لغو کردن</a>
                                </div>
                            </div>
                        </div>


                        <div id="modal2" class="modal " style="z-index: -1 !important;">
                            <div class="modal-content " style="z-index: -1 !important; height: 150px;">
                                <center>
                                    <div id="countdown"></div>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <div style="margin: 0 !important; height: 100px" class="row center">

                                    <h6 class="center h6-modal">آیا میخواهید این ماجرا را کنسل کنید ؟</h6>
                                    <span class="span-mosal">در صورت تمام شدن زمان شما به مرحله بعدی می روید</span>

                                    <a href="#!" class="center modal-close waves-effect waves-green btn-flat">خیر، ادامه
                                        می
                                        دهم</a>
                                    <a href="#!" class="center modal-close waves-effect waves-red btn-flat"
                                       id="cancel-reserve">لغو کردن</a>
                                </div>
                            </div>
                        </div>


                        <!--left side of post header-->
                        <div class="col l6 s12 center-on-small-only" style="padding-left: 0 !important;">
                            <a href="#modal1" class="btn-small btn-cream margin-top modal-trigger" id="btn-res2">
                                {{__('layout.reserve.reserve it')}}
                            </a>

                        {{--<span id="span-res" class="span-res left">شناسه رزرو شما</span>--}}


                        <!-- Modal Structure -->
                            <div id="modal1" class="modal " style="z-index: -1 !important;height: 600px !important; width: 75% !important;">
                                <div class="modal-content" style="z-index: -1 !important;">
                                    <div class="row">

                                        <form>
                                            <div class="col l4 s12 height100">

                                                <p>{{__('layout.room.enter date')}}</p>

                                                <div id="app">
                                                    <input type="text"
                                                           class="dp1"
                                                           v-model="date"
                                                           id="alternateField"
                                                           name="start"
                                                           placeholder="تاریخ را انتخاب نمایید">
                                                    @if($inactives == "")
                                                        <date-picker
                                                                :min="today"
                                                                v-model="date"
                                                                format="jYYYY/jMM/jDD"
                                                                element="alternateField">
                                                        </date-picker>
                                                    @else
                                                        <date-picker
                                                                :min="today"
                                                                :disable="{{$inactives}}"
                                                                v-model="date"
                                                                format="jYYYY/jMM/jDD"
                                                                element="alternateField">
                                                        </date-picker>
                                                    @endif
                                                </div>


                                                {{--                                                <input style="z-index: 5 !important;" type="text" class="datePicker dp1"--}}
                                                {{--                                                       value="09-22-2019"/>--}}
                                                {{--                                                <input style="z-index: 5 !important; display: block;" type="hidden"--}}
                                                {{--                                                       id="alternateField" name="start"/>--}}


                                            </div>
                                            <div class="col l4 s12 height100">

                                                <p>{{__('layout.room.duration')}}</p>
                                                <!--<input type="text">-->
                                                <div class="padding-option">
                                                    <select class="slct-night " name="count" id="count">
                                                        <option value="" disabled selected>{{__('layout.room.choose duration')}}</option>
                                                        <option value="1">{{__('layout.room.1 night')}}</option>
                                                        <option value="2">{{__('layout.room.2 nights')}}</option>
                                                        <option value="3">{{__('layout.room.3 nights')}}</option>
                                                        <option value="4">{{__('layout.room.4 nights')}}</option>
                                                        <option value="5">{{__('layout.room.5 nights')}}</option>
                                                        <option value="6">{{__('layout.room.6 nights')}}</option>
                                                        <option value="7">{{__('layout.room.7 nights')}}</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col l4 s12 height100">

                                                <p>{{__('layout.room.last step')}}</p>
                                                <input id="btn-update-service-form" type="button" value="درج مشخصات"
                                                       class="btn-small center btn-red btn-submit">

                                            </div>
                                        </form>

                                    </div>

                                </div>

                                <div class="modal-footer container" hidden>

                                    <div style="margin: 0 !important;" class="row modal-footer2">

                                        <div class="col l3 s12 padding-col">
                                            <div class="date-picked-first">
                                                <div>
                                                    <span class="center date-picked-title">دوشنبه 27 فروردین 98</span>
                                                </div>

                                                <p class="date-picked-description center center-align">
                                                    7/127/256 ریال
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col l3 s12 padding-col">
                                            <div class="date-picked-first">
                                                <div>
                                                    <span class="center date-picked-title">دوشنبه 27 فروردین 98</span>
                                                </div>

                                                <p class="date-picked-description center center-align">
                                                    7/127/256 ریال
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col l3 s12 padding-col">
                                            <div class="date-picked-first">
                                                <div>
                                                    <span class="center date-picked-title">دوشنبه 27 فروردین 98</span>
                                                </div>

                                                <p class="date-picked-description center center-align">
                                                    7/127/256 ریال
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col l3 s12 padding-col">
                                            <div class="date-picked-first">
                                                <div>
                                                    <span class="center date-picked-title">دوشنبه 27 فروردین 98</span>
                                                </div>

                                                <p class="date-picked-description center center-align">
                                                    7/127/256 ریال
                                                </p>
                                            </div>
                                        </div>


                                    </div>

                                    <!--<a href="#!" class="modal-close waves-effect waves-red btn-flat">بستن</a>-->
                                </div>

                            </div>

                            <!--modal-close class can close the modal-->
                            <!-- Modal Structure -->

                        </div>
                    </div>

                    <div class="row">

                        <div id="right-side-content" class="col l6 s12  content-right-side ">

                            <div class="special-service hide-on-med-and-down col l11">

                                <div>
                                <span class="center special-service-title">
                                    {{__('layout.reserve.important notes')}}
                                </span>
                                </div>

                                <p class="special-service-description">

                                    {{__('layout.reserve.check mobile phone')}}
                                </p>
                            </div>


                            @if($user != null and isset($user['name'])==true and isset($user['name']->title)==true )
                                <input id="input-name" type="text" class="dp2 col l5 s11 "
                                       placeholder="نام و نام خانوادگی"
                                       value="{{$user['name']->title}}">
                            @else
                                <input id="input-name" type="text" class="dp2 col l5 s11 "
                                       placeholder="نام و نام خانوادگی"
                                       value="{{env('DEBUG_MODE') == 1? "k"  : ""  }}">
                            @endif

                            @if($user != null and isset($user['email'])==true  and isset($user['email']->title)==true )
                                <input id="input-email" type="email" class="dp2 dp3 col l5 s11"
                                       placeholder="آدرس ایمیلتان را وارد کنید(اختیاری)" value="{{$user['email']->title}}">
                            @else
                                <input id="input-email" type="email" class="dp2 dp3 col l5 s11"
                                       placeholder="آدرس ایمیلتان را وارد کنید(اختیاری)"
                                       value="{{env('DEBUG_MODE') == 1? "k@ya.com"  : ""  }}">
                            @endif
                            @if($user != null and isset($user['mobile'])==true and isset($user['mobile']->title)==true)
                                <input id="input-mobile" type="text" class="dp2 col l5 s11" placeholder="شماره موبایل"
                                       onkeypress="return isNumberKey(event)"
                                       oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       maxlength="13"
                                       minlength="10"
                                       value="{{$user['mobile']->title}}">
                            @else
                                <input id="input-mobile" type="text" class="dp2 col l5 s11" placeholder="شماره موبایل"
                                       onkeypress="return isNumberKey(event)"
                                       oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       maxlength="13"
                                       minlength="10"
                                       value="{{env('DEBUG_MODE') == 1? "09365982333"  : ""  }}">
                            @endif

                            @if($user != null and isset($user['phone'])==true and isset($user['phone']->title)==true)
                                <input id="input-phone" type="text" class="dp2 dp3 col l5 s11" placeholder="تلفن ثابت"
                                       onkeypress="return isNumberKey(event)"
                                       oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       maxlength="13"
                                       minlength="10"

                                       value="{{$user['phone']->title}}">
                            @else
                                <input id="input-phone" type="text" class="dp2 dp3 col l5 s11" placeholder="تلفن ثابت"
                                       onkeypress="return isNumberKey(event)"
                                       oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       maxlength="13"
                                       minlength="10"

                                       value="{{env('DEBUG_MODE') == 1? "01342547909"  : ""  }}">
                            @endif

                            <div class="col l6 s12 center-on-small-only" hidden>
                                <h6 id="title-h6" class="title-of-form">
                                    {{__('layout.reserve.additional details')}}
                                </h6>

                            </div>
                            <input type="button" style="width:100%" href="#" value="تایید اطلاعات و رزرو"
                                   class="btn-small btn-red btn-submit btn-go-to-step-2" id="btn-go-to-step-2">


                            <div class="special-service hide-on-med-and-down col l11" hidden>

                                <div>
                                <span class="center special-service-title">
                                    {{__('layout.reserve.important notice')}}
                                </span>
                                </div>

                                <p class="special-service-description">

                                    {{__('layout.reserve.for children over 6 years of age')}}

                                </p>


                            </div>
                            <div class="col l7 s5 padding-option" style="padding: 0 !important;" id="input-kids" hidden>

                                <select class="slct-kid">
                                    <option value="" disabled selected>
                                        {{__('layout.reserve.choose the child age')}}
                                    </option>
                                    <option value="1">یک ال 5</option>
                                    <option value="2">6 الی یازده</option>
                                    <option value="3">یازده الی شانزده</option>
                                    <option value="4">هفده الی آخر</option>


                                </select>


                            </div>

                            <div class="col l7 s5 padding-option" style="padding: 0 !important;" id="input-beds" hidden>

                                <select class="slct-kid">
                                    <option value="" disabled selected>
                                        {{__('layout.reserve.choose the number of beds')}}
                                    </option>
                                    <option value="1">یک تخت</option>
                                    <option value="2">دو تخت</option>
                                    <option value="3">سه تخت</option>
                                    <option value="4">چهار تخت</option>
                                    <option value="5">پنج تخت</option>


                                </select>


                            </div>


                            <div class="col l8 s12 center-on-small-only" hidden>
                                <h6 id="title-h6" class="title-of-form">
                                    {{__('layout.reserve.do you travel for work')}}
                                </h6>

                            </div>

                            <div class="col l10 center-on-small-only" hidden>


                                <p style="display: inline-block">
                                    <label>
                                        <input name="group1" type="radio" checked/>
                                        <span class="radio-span">بله</span>
                                    </label>
                                </p>

                                <p style="display: inline-block; margin-right: 10px">
                                    <label>
                                        <input name="group1" type="radio"/>
                                        <span class="radio-span">خیر</span>
                                    </label>
                                </p>

                                <textarea id="txt-area" class="txt-area col s12"
                                          placeholder="درخواستی از هتل دارید؟ اینجا بنویسید."></textarea>

                                <p style="display: inline-block">
                                    <label>
                                        <input name="group2" type="radio"/>
                                        <span class="radio-span">
                                        {{__('layout.reserve.i have read and accept the rules')}}
                                    </span>
                                    </label>
                                </p>

                                {{--                                <div id="more-inf" class="more-inf center-on-small-only"--}}
                                {{--                                     style="margin-right: 0 !important;">--}}
                                {{--                                    <a href="#">--}}
                                {{--                                        {{__('layout.reserve.more information')}}--}}
                                {{--                                    </a>--}}
                                {{--                                    <img class="responsive-img" src="{{asset('images/left-arrow.png')}}">--}}
                                {{--                                </div>--}}


                            </div>


                        </div>


                        <div id="left-side-content" class="col l6 s12  content-left-side">

                            <div class="col s12 room-pic"></div>
                            <div class="col s12 room-pic-des">
                                <span>{{$room->properties['title']->value}}</span>
                            </div>

                            <div class="col s6 room-date">

                            <span class="span-date grey-text">
                                {{__('layout.reserve.entry date')}}
                            </span>
                                <span class="span-date black-text " id="spn-start-date">{{$dates[0]}}</span>


                            </div>

                            <div class="col s6  room-date rd2">

                            <span class="span-date grey-text">
                                {{__('layout.reserve.date of departure')}}
                            </span>
                                <span class="span-date black-text " id="spn-end-date">{{$dates[count($dates)-1]}}</span>

                            </div>

                            <div class="col s12  room-day-price" id="dv-dates">

                                @php($p=0)
                                @foreach($dates_prices as $k=>$d)
                                    <span class="black-text">{{$k}}</span>
                                    <span class="txt-red-price">
                                        @if(count($d) == 2)
                                            @if($d[0] < $d[1] )
                                                <s>{{number_format($d[1])}}</s>&nbsp;&nbsp;
                                                {{number_format($d[0])}}
                                            @else
                                                {{number_format($d[0])}}
                                            @endif
                                        @elseif(count($d)  == 1)
                                            {{number_format($d[0])}}
                                        @endif

                                        {{__('layout.reserve.tooman')}}
                                </span>
                                    <br>
                                    @php($p+=$d[0])
                                @endforeach
                                {{--<span class="black-text">سه شنبه، 28 فروردین 1398</span>--}}
                                {{--<span class="left">7/568/245 ریال</span>--}}
                            </div>

                            <div class="col s12 room-description">

                                <span class="black-text">{{$room->properties['description']->value}}</span>

                            </div>

                            <input type="hidden" id="input-price" value="{{$p}}">
                            <a id="btn-grey" href="#" class="btn-small btn-grey ">
                                {{number_format($p)}}
                                {{__('layout.reserve.total')}}
                            </a>
                            <a href="#modal1" class="btn-small left btn-dash modal-trigger">ویرایش تقویم</a>

                            <div class="col s12 more-bedroom-services">

                                {{--<span class="black-text">سرویس خواب اضافه:</span>--}}
                                {{--<span class="black-text">900/000 ریال</span>--}}

                                {{--<div class="img-check  left">--}}
                                {{--<img src="{{asset('images/checked.png')}}" class="">--}}

                                {{--</div>--}}


                            </div>


                            <div class="col s12 more-bedroom-des">

                            <span>
                                {{__('layout.reserve.in case of cancellation')}}
                            </span>
                            </div>


                            <div class="col s12 left" id="btn-green">


                                <a class="btn-green" href="#">
                                    {{__('layout.reserve.total')}}
                                    {{ number_format($p) }}
                                    {{__('layout.reserve.tooman')}}
                                </a>

                            </div>


                        </div>
                    </div>

                    {{--                    <div class="row">--}}
                    {{--                        <div class="col s12">--}}
                    {{--                            <input type="button" href="#" value="تایید اطلاعات و رزرو"--}}
                    {{--                                   class="btn-small btn-red btn-submit btn-go-to-step-2" id="btn-go-to-step-2">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </section>

            @elseif(Request::get('step') == 2)

                <h3>{{__('layout.reserve.review and pay')}}</h3>
                <section style="padding: 0 !important;  width: 100%; display: block !important;">


                    <div id="modal21" class="modal " style="z-index: -1 !important;">
                        <div class="modal-content " style="z-index: -1 !important; height: 150px;">

                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" id="atm-code">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div style="margin: 0 !important; height: 100px" class="row center">
                                {{--<h6 class="center h6-modal">آیا میخواهید این ماجرا را کنسل کنید ؟</h6>--}}
                                {{--<span class="span-mosal">در صورت تمام شدن زمان شما به مرحله بعدی می روید</span>--}}

                                <button id="btn-upload-check" class="center waves-effect waves-green btn-flat">
                                    ارسال
                                </button>
                                <a href="#!" class="center modal-close waves-effect waves-red btn-flat"
                                   id="cancel-reserve" onclick="$('#modal21').modal('close');">لغو</a>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col l6 s12 rs-col">
                            <div class="center-on-small-only btn-bg">
                                <span class="">{{__('layout.reserve.your reservation id')}}</span>
                                <a href="#" class="btn-small  btn-cream bc-2"
                                   id="reservation-code">{{Request::get('code')}}</a>
                            </div>

                            <center>
                                <div id="countdown-1" style="font-size: 72px; color: red"></div>
                                <div id="countdown-2" style="font-size: 72px; color: green" hidden></div>
                                <div id="countdown-3" style="font-size: 72px; color: blue" hidden></div>
                            </center>
                            <center>
                                <h6 id="h-counter-info">
                                    لطفا جهت تایید اتاق صبر نمایید
                                </h6>
                            </center>

                        </div>

                        <div class="col l6 s12 ls-col ">


                            <div id="ss-box" class="ss-box  col l12 ">


                                <div>
                                    <span class="center ss-title">{{__('layout.reserve.just take another step')}}</span>
                                </div>


                                <div id="total-price" class="total-price center-on-small-only">

                                    <img class="responsive-img" src="{{asset('images/green-check.png')}}">
                                    <span id="btn-grey-2">{{__('layout.reserve.total')}}:
                                    {{number_format($reserve->properties['price']->value)}}
                                        {{__('layout.reserve.tooman')}}</span>

                                </div>

                                <div id="div-empty" class="div-empty">

                                    <div class="div-empty-child"></div>
                                    <div class="div-empty-child"></div>
                                    <div class="div-empty-child"></div>


                                </div>


                                {{--                                <div class="sup-box hide-on-med-and-down">--}}

                                {{--                                    <span>{{__('layout.reserve.hotel support')}}</span>--}}
                                {{--                                    <a class="btn-green_2" href="#">{{__('layout.reserve.contact us')}}</a>--}}
                                {{--                                </div>--}}

                            </div>


                        </div>

                        <br>
                        <br>
                        <br>


                        <div class="col s12 l12 center-on-small-only title-in-post">

                            <h6>{{__('layout.reserve.payment method')}}</h6>

                        </div>


                    </div>

                    <div class="row " style="min-height: 250px !important;">

                        <div id="pay-box-bg0" class="col l6 s12 height110 pay-col">

                            <div class="pay-box-bg">
                                <div class="pay-box">

                                    <span>{{__('layout.reserve.internet payment')}}</span>

                                </div>

                                <div class="bank-div">


                                    <label hidden>
                                        <input name="group1" type="radio" checked/>
                                        <span>{{__('layout.reserve.through the mellat Bank')}}</span>
                                    </label>

                                    <div class="left img-bank-div  center-align" hidden>
                                        <img src="{{asset('images/Mellat-logo.png')}}">
                                    </div>


                                </div>

                                <div class="bank-div border-top">


                                    <label hidden>
                                        <input name="group1" type="radio" checked/>
                                        <span>{{__('layout.reserve.through the saman Bank')}}</span>
                                    </label>

                                    <div class="left img-bank-div  center-align" hidden>
                                        <img src="{{asset('images/Saman-logo.png')}}">
                                    </div>

                                </div>

                                <div class="bank-div ">
                                    <a href="{{route('home.payout', ['code'=>Request::get('code')])}}" id="pay-online"
                                       class="btn-small btn-red btn-submit btn-pay btn-unavailable disabled">
                                        پرداخت آنلاین
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div id="pay-box-bg" class="col l6 s12 height110 pay-col2">

                            <div class="pay-box-bg ">
                                <div class="pay-box">

                                    <span>کارت به کارت</span>

                                </div>

                                <div class="bank-div-p center-align ">
                                    <p>
                                        {{__('layout.reserve.you can set the amount by card to card')}}
                                        <br>
                                        {{__('layout.reserve.deposit and send the receipt do')}}
                                    </p>

                                    <br>
                                </div>
                                <div class="bank-div bottom-class" style="margin-bottom: 5px !important;">

                                    <input id="btn-open-modal-for-atm-code" type="button" value="ارسال رسید"
                                           class="btn-small btn-red btn-submit btn-pay btn-unavailable disabled">

                                </div>

                            </div>
                        </div>

                        <div id="pay-box-bg2" class="col l4 s12 height110 pay-col3" hidden>
                            <div class="pay-box-bg">
                                <div class="pay-box">
                                    <span>{{__('layout.reserve.payment through credit')}}</span>
                                </div>

                                <div class="bank-div-p center-align">
                                    <p>
                                        {{__('layout.reserve.you can use the assigned amount')}}
                                    </p>
                                </div>

                                <div class="bank-div bottom-class">
                                    <input type="button" href="#" value="غیر فعال"
                                           class="btn-small btn-unavailable btn-submit btn-pay ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col s12 l12 center-on-small-only res-rules">
                        <h6>{{__('layout.reserve.reservation rules on holidays')}}</h6>
                    </div>


                    <div class="row row-rules">

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

                                    <h6 class="sup-title">{{__('layout.reserve.support for the 3-star hotel patio')}}</h6>


                                    <p style="display: inline-block">

                                        {{__('layout.reserve.contact us if you have any questions')}}
                                    </p>

                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <a href="{{route('home.service', ['service_type' => 'reserve', 'step' => 3, 'code' => Request::get('code')])}} "
                               id="btn-go-to-step-3"
                               hidden
                               class="btn-small btn-red btn-submit left">
                                دریافت واچر
                            </a>
                        </div>
                    </div>

                    {{--                    <div class="row">--}}
                    {{--                        <div class="col s12">--}}
                    {{--                            <button type="button" disabled--}}
                    {{--                                    class="btn-small btn-red btn-submit left " id="btn-go-to-step-3">دریافت واچر--}}
                    {{--                            </button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}


                </section>

            @elseif(Request::get('step') == 3)

                <h3>{{__('layout.reserve.get hotel voucher')}}</h3>
                <section style="padding: 0 !important; width: 100%; margin: 0 !important;">


                    <div class="row" style="padding: 30px">

                        <div class="col s12 pay-msg">

                            <span>{{__('layout.reserve.your payment has been successfully completed')}}</span>

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
                                    <a href="{{route('home.voucher.print' , ['code'=> Request::get('code')])}}"
                                       id="btn-print-voucher"
                                       class="btn-small btn-red btn-submit btn-print" target="_blank">
                                        {{__('layout.reserve.print hotel voucher')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col l3 s12 right-s"></div>
                        {{--                        <div id="left-s" class="col l6 s12 left-s" hidden>--}}
                        {{--                            <div class="row" >--}}
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


                    <div class="col s12 l12 res-rules">


                        <h6>{{__('layout.reserve.how to track')}}</h6>

                    </div>


                    <div class="row row-rules">

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


                </section>

            @endif

        </div>


    </div>


</div>
