<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ووچر</title>

        <link rel="stylesheet" href="{{asset('style/voucher_style.css')}}">

    </head>
    <body>

        <div class="main">

            <img class="img-logo" style="width: 100px; height:100px" src="{{asset('images/main_logo_cu.png')}}">
            <h6 class="h6-title">
                فرم ذخیره محل اقامت در
                {{isset($hotel['name']->value) ?$hotel['name']->value : '' }}
            </h6>
            <h6 class="h6-title">Regulation of room reservation in</h6>

            <div class="line"></div>

            <div class="description-box">

                <span class="span-desc rtl-direction">این برگه جهت رزرو اتاق صادر گردیده است و هیچگونه اعتبار دیگری ندارد.</span>
                <span class="span-desc">This form is issued for room reservation and it has not any other value.</span>

            </div>

            <div class="input-box-address">


                <div class="top-of-box">

                    <span class="right-side title-font">نشانی</span>
                    <span class="left-side content-font ">{{isset($customer['address']->value) ?$customer['address']->value: '-' }}</span>

                </div>


                <div class="bottom-of-box">

                    <span class="left-side  title-font">Address</span>
                    <span class="right-side content-font ">{{isset($customer['address']->value) ?$customer['address']->value : '-' }}</span>

                </div>


            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">نام میهمان</span>
                        <span class="left-side content-font ">{{isset($customer['name']->value) ?$customer['name']->value : '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">guest name</span>
                        <span class="right-side content-font ">{{isset($customer['name']->value) ?$customer['name']->value : '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">شهر مبدا</span>
                        <span class="left-side content-font ">{{isset($customer['city']->value) ?$customer['city']->value : '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Origin city</span>
                        <span class="right-side content-font ">{{isset($customer['city']->value) ?$customer['city']->value : '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">تلفن</span>
                        <span class="left-side content-font ">{{isset($customer['mobile']->value) ?$customer['mobile']->value : '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Tel</span>
                        <span class="right-side content-font ">{{isset($customer['mobile']->value) ?$customer['mobile']->value : '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">تعداد نفرات</span>
                        <span class="left-side content-font ">4</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Number of pers</span>
                        <span class="right-side content-font ">4</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">ساعت ورود</span>
                        <span class="left-side content-font ">12</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Arrival timey</span>
                        <span class="right-side content-font ">12</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">نوع اتاق</span>
                        <span class="left-side content-font ">{{isset($room['title']->value) ?$room['title']->value: '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Room Type:</span>
                        <span class="right-side content-font ">{{isset($room['title']->value) ?$room['title']->value: '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">تعداد اتاق</span>
                        <span class="left-side content-font ">1</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">number of room</span>
                        <span class="right-side content-font ">1</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">تاریخ خروج</span>
                        <span class="left-side content-font ">{{isset($reserve['end-date']->value['ja']) ?$reserve['end-date']->value['ja']: '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Exit date</span>
                        <span class="right-side content-font ">{{isset($reserve['end-date']->value['gr']) ?$reserve['end-date']->value['gr']: '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">تاریخ ورود</span>
                        <span class="left-side content-font ">{{isset($reserve['start-date']->value['ja']) ?$reserve['start-date']->value['ja']: '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Arrival date</span>
                        <span class="right-side content-font ">{{isset($reserve['start-date']->value['gr']) ?$reserve['start-date']->value['gr']: '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="line margin-top"></div>

            <h6 class="span-desc rtl-direction">ذخیره فوق توسط خانم/آقای :
                {{isset($user['name']->title) ?$user['name']->title: '------' }}
                در تاریخ :
                {{isset($reserve['confirmation-date']->value['ja']) ?$reserve['confirmation-date']->value['ja']: '------' }}
                با شماره:
                {{isset($reserve['code']->value) ?$reserve['code']->value: '------' }}
                تایید گردید.
            </h6>
            <h6 class="span-desc">Above reservation is confirmed by Mr/Mrs :
                {{isset($user['name']->title) ?$user['name']->title: '------' }}
                Date :
                {{isset($reserve['confirmation-date']->value['gr']) ?$reserve['confirmation-date']->value['gr']: '------' }}
                NO :
                {{isset($reserve['code']->value) ?$reserve['code']->value: '------' }}
            </h6>

            <div class="line "></div>

            <div class="left-side-div">

                <div class="top-of-box-2">

                    <span class="right-side title-font">نام و امضای صادر کننده</span>
                    <span class="left-side content-font ">{{isset($user['name']->title) ?$user['name']->title: '------' }}</span>

                    <span class="left-side title-font">Name and sign of issuer</span>
                    <span class="right-side content-font ">{{isset($user['name']->title) ?$user['name']->title: '------' }}</span>

                </div>

                <div class="bottom-of-box-2">

                    <span class="right-side title-font">تاریخ</span>
                    <span class="left-side content-font ">
                        {{isset($reserve['confirmation-date']->value['ja']) ?$reserve['confirmation-date']->value['ja']: '------' }}
                    </span>

                </div>

                <div class="bottom-of-box-2">

                    <br>

                    <span class="left-side title-font">Date</span>
                    <span class="right-side content-font ">
                        {{isset($reserve['confirmation-date']->value['gr']) ?$reserve['confirmation-date']->value['gr']: '------' }}
                    </span>

                </div>

            </div>


            <div class="right-side-div">

                <div class="top-of-box-2">

                    <span class="right-side title-font">نام و امضای متقاضی</span>
                    <span class="left-side content-font ">{{isset($customer['name']->value) ?$customer['name']->value : '-' }}</span>

                    <span class="left-side title-font">Name and sign of applicant</span>
                    <span class="right-side content-font ">{{isset($customer['name']->value) ?$customer['name']->value : '-' }}</span>

                </div>

                <div class="bottom-of-box-2">

                    <span class="right-side title-font">تلفن</span>
                    <span class="left-side content-font ">{{isset($customer['mobile']->value) ?$customer['mobile']->value : '-' }}</span>


                </div>

                <div class="bottom-of-box-2">

                    <br>

                    <span class="left-side title-font">Tel</span>
                    <span class="right-side content-font ">{{isset($customer['mobile']->value) ?$customer['mobile']->value : '-' }}</span>

                </div>


            </div>

            <div class="line margin-top-2"></div>

            <div class="price-box">

                <span class="span-price">
                    نرخ اتاق :
                    {{ isset($room['price']->prices[0]) ?  number_format($room['price']->prices[0]) : '-'}}
                </span>
                <span class="span-price">
                    هزینه ها :
                    0
                </span>
                <span class="span-price">
                    جمع کل :
                    {{ number_format($reserve['price']->value)}}
                </span>
                <span class="span-price">
                    مبلغ دریافتی :
                    {{ number_format($reserve['price']->value)}}
                </span>
            </div>

            <div class="price-box">
                <span class="span-price">
                    Room rate :
                    {{ isset($room['price']->prices[0]) ?  number_format($room['price']->prices[0]) : '-'}}
                    {{--                    {{ number_format($room['price']->prices[0])}}--}}
                </span>
                <span class="span-price">
                    Costs :
                    0
                </span>
                <span class="span-price">
                    Total :
                    {{ number_format($reserve['price']->value)}}
                </span>
                <span class="span-price">
                    Amount Received :
                    {{ number_format($reserve['price']->value)}}
                </span>
            </div>
        </div> <!--main-->



        <div class="main">

            <img class="img-logo" style="width: 100px; height:100px" src="{{asset('images/main_logo_cu.png')}}">
            <h6 class="h6-title">
                استماره الحجز فی فندق صبوری
{{--                {{isset($hotel['name']->value) ?$hotel['name']->value : '' }}--}}
            </h6>
            <h6 class="h6-title">Regulation of room reservation in</h6>

            <div class="line"></div>

            <div class="description-box">

                <span class="span-desc rtl-direction">
                    هده الاستمار اصدرت لحجز الغرفه فی الفندق و لیس لها  صلاحیات اخری
                </span>
                <span class="span-desc">This form is issued for room reservation and it has not any other value.</span>

            </div>

            <div class="input-box-address">


                <div class="top-of-box">

                    <span class="right-side title-font">العنوان</span>
                    <span class="left-side content-font ">{{isset($customer['address']->value) ?$customer['address']->value: '-' }}</span>

                </div>


                <div class="bottom-of-box">

                    <span class="left-side  title-font">Address</span>
                    <span class="right-side content-font ">{{isset($customer['address']->value) ?$customer['address']->value : '-' }}</span>

                </div>


            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">الاسم الکامل /  اسم النزیل </span>
                        <span class="left-side content-font ">{{isset($customer['name']->value) ?$customer['name']->value : '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">guest name</span>
                        <span class="right-side content-font ">{{isset($customer['name']->value) ?$customer['name']->value : '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">مبدا الرحله </span>
                        <span class="left-side content-font ">{{isset($customer['city']->value) ?$customer['city']->value : '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Origin city</span>
                        <span class="right-side content-font ">{{isset($customer['city']->value) ?$customer['city']->value : '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">الهاتف</span>
                        <span class="left-side content-font ">{{isset($customer['mobile']->value) ?$customer['mobile']->value : '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Tel</span>
                        <span class="right-side content-font ">{{isset($customer['mobile']->value) ?$customer['mobile']->value : '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">عدد الاشخاص</span>
                        <span class="left-side content-font ">4</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Number of pers</span>
                        <span class="right-side content-font ">4</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font"> ساعه الدخول </span>
                        <span class="left-side content-font ">12</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Arrival timey</span>
                        <span class="right-side content-font ">12</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font"> نوع الغرفه </span>
                        <span class="left-side content-font ">{{isset($room['title']->value) ?$room['title']->value: '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Room Type:</span>
                        <span class="right-side content-font ">{{isset($room['title']->value) ?$room['title']->value: '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">عدد الغرف </span>
                        <span class="left-side content-font ">1</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">number of room</span>
                        <span class="right-side content-font ">1</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">تاریخ الخروج</span>
                        <span class="left-side content-font ">{{isset($reserve['end-date']->value['ja']) ?$reserve['end-date']->value['ja']: '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Exit date</span>
                        <span class="right-side content-font ">{{isset($reserve['end-date']->value['gr']) ?$reserve['end-date']->value['gr']: '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="input-box">

                <div class="input-box-div">

                    <div class="top-of-box">

                        <span class="right-side title-font">تاریخ الدخول</span>
                        <span class="left-side content-font ">{{isset($reserve['start-date']->value['ja']) ?$reserve['start-date']->value['ja']: '-' }}</span>

                    </div>


                    <div class="bottom-of-box">

                        <span class="left-side title-font">Arrival date</span>
                        <span class="right-side content-font ">{{isset($reserve['start-date']->value['gr']) ?$reserve['start-date']->value['gr']: '-' }}</span>

                    </div>


                </div>

            </div>

            <div class="line margin-top"></div>

            <h6 class="span-desc rtl-direction">هذه الاستماره تم تاکیدها  بواسطه   سید/سیده :
                {{isset($user['name']->title) ?$user['name']->title: '------' }}
                فی تاریخ:
                {{isset($reserve['confirmation-date']->value['ja']) ?$reserve['confirmation-date']->value['ja']: '------' }}
                رقم :
                {{isset($reserve['code']->value) ?$reserve['code']->value: '------' }}
            </h6>
            <h6 class="span-desc">Above reservation is confirmed by Mr/Mrs :
                {{isset($user['name']->title) ?$user['name']->title: '------' }}
                Date :
                {{isset($reserve['confirmation-date']->value['gr']) ?$reserve['confirmation-date']->value['gr']: '------' }}
                NO :
                {{isset($reserve['code']->value) ?$reserve['code']->value: '------' }}
            </h6>

            <div class="line "></div>

            <div class="left-side-div">

                <div class="top-of-box-2">

                    <span class="right-side title-font"> الاسم و توقیع مصدر الحجز</span>
                    <span class="left-side content-font ">{{isset($user['name']->title) ?$user['name']->title: '------' }}</span>

                    <span class="left-side title-font">Name and sign of issuer</span>
                    <span class="right-side content-font ">{{isset($user['name']->title) ?$user['name']->title: '------' }}</span>

                </div>

                <div class="bottom-of-box-2">

                    <span class="right-side title-font">تاریخ</span>
                    <span class="left-side content-font ">
                        {{isset($reserve['confirmation-date']->value['ja']) ?$reserve['confirmation-date']->value['ja']: '------' }}
                    </span>

                </div>

                <div class="bottom-of-box-2">

                    <br>

                    <span class="left-side title-font">Date</span>
                    <span class="right-side content-font ">
                        {{isset($reserve['confirmation-date']->value['gr']) ?$reserve['confirmation-date']->value['gr']: '------' }}
                    </span>

                </div>

            </div>


            <div class="right-side-div">

                <div class="top-of-box-2">

                    <span class="right-side title-font">الاسم و توقیع طالب الحجز </span>
                    <span class="left-side content-font ">{{isset($customer['name']->value) ?$customer['name']->value : '-' }}</span>

                    <span class="left-side title-font">Name and sign of applicant</span>
                    <span class="right-side content-font ">{{isset($customer['name']->value) ?$customer['name']->value : '-' }}</span>

                </div>

                <div class="bottom-of-box-2">

                    <span class="right-side title-font">الهاتف</span>
                    <span class="left-side content-font ">{{isset($customer['mobile']->value) ?$customer['mobile']->value : '-' }}</span>


                </div>

                <div class="bottom-of-box-2">

                    <br>

                    <span class="left-side title-font">Tel</span>
                    <span class="right-side content-font ">{{isset($customer['mobile']->value) ?$customer['mobile']->value : '-' }}</span>

                </div>


            </div>

            <div class="line margin-top-2"></div>

            <div class="price-box">

                <span class="span-price">
                     سعر الغرفه  :
                    {{ isset($room['price']->prices[0]) ?  number_format($room['price']->prices[0]) : '-'}}
                </span>
                <span class="span-price">
                    التکالیف :
                    0
                </span>
                <span class="span-price">
                    الاجمالی :
                    {{ number_format($reserve['price']->value)}}
                </span>
                <span class="span-price">
                    المبلغ المستلم :
                    {{ number_format($reserve['price']->value)}}
                </span>
            </div>

            <div class="price-box">
                <span class="span-price">
                    Room rate :
                    {{ isset($room['price']->prices[0]) ?  number_format($room['price']->prices[0]) : '-'}}
                    {{--                    {{ number_format($room['price']->prices[0])}}--}}
                </span>
                <span class="span-price">
                    Costs :
                    0
                </span>
                <span class="span-price">
                    Total :
                    {{ number_format($reserve['price']->value)}}
                </span>
                <span class="span-price">
                    Amount Received :
                    {{ number_format($reserve['price']->value)}}
                </span>
            </div>
        </div> <!--main-->


    </body>
</html>