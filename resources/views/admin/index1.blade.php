@extends("admin.layouts.admin")

@section('vendor-css')

@endsection


@section("header")



@endsection

@section("main")

    <div id="main">
        <div class="row">
            <div class="col s12">


                <div class="container">
                    <!--card stats start-->

                    <div id="modal-room-confirmation" class="modal">
                        <div class="modal-content">
                            <h4>فرم روزرو جهت تایید اتاق</h4>
                            <input type="hidden" id="hdn-service-id" value="">
                            <input type="hidden" id="hdn-type" value="">
                        </div>
                        <div class="row" style="margin: 10px; padding: 10px">
                            <div class="col m12">
                                <table id="tbl-reserve-info">
                                </table>
                            </div>
                            <div id="dv-check-image" class="col m12" hidden>
                                <img src="{{asset('images/room-pic.jpg')}}" height="300">
                            </div>

                        </div>
                        <div class="modal-fixed-footer">
                            <button id="btn-modal-confirm-room-service" class="btn btn-red">تایید درخواست</button>
                            <button id="btn-modal-reject-room-service" class="btn btn-red">رد درخواست</button>
                        </div>
                    </div>


                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                                {{--@include("widgets.card_short_data_with_line_chart",['bgcolor'=>'cyan' , 'color'=>'white','title'=>'مشتریان جدید' , 'data'=>'566'])--}}
                                <div class="card">
                                    <div class="card-content cyan white-text">
                                        <p class="card-stats-title">
                                            <i class="material-icons">person_outline</i>کل کاربران</p>
                                        <h4 class="card-stats-number"
                                            style="direction: rtl; font-family: irsans">{{$user_count}}</h4>
                                        <p class="card-stats-compare">
                                            &nbsp
                                        </p>
                                    </div>
                                    <div class="card-action cyan darken-1">
                                        <div id="clients-bar" class="center-align" style="visibility: hidden;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">

                                @php($t=0)
                                @foreach($verified_reserves as $verified_reserve)
                                    @php($t+=$verified_reserve->properties['price']->title)
                                @endforeach

                                <div class="card">
                                    <div class="card-content red accent-2 white-text">
                                        <p class="card-stats-title">
                                            <i class="material-icons">attach_money</i>کل فروش</p>
                                        <h4 class="card-stats-number">{{number_format($t)}} تومان </h4>
                                        <p class="card-stats-compare">
                                            &nbsp
                                        </p>
                                    </div>
                                    <div class="card-action red darken-1">
                                        <div id="sales-compositebar" class="center-align"
                                             style="visibility: hidden;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">


                                @php($t=0)
                                @foreach($verified_reserves as $verified_reserve)
                                    @if($verified_reserve->properties['gr_confirmation_date']->title == $today)
                                        @php($t+=$verified_reserve->properties['price']->title)
                                    @endif
                                @endforeach
                                <div class="card">
                                    <div class="card-content teal accent-4 white-text">
                                        <p class="card-stats-title">
                                            <i class="material-icons">trending_up</i> سود امروز</p>
                                        <h4 class="card-stats-number">{{number_format($t)}} تومان </h4>
                                        <p class="card-stats-compare">
                                            &nbsp
                                        </p>
                                    </div>
                                    <div class="card-action teal darken-1">
                                        <div id="profit-tristate" class="center-align"
                                             style="visibility: hidden;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content deep-orange accent-2 white-text">
                                        <p class="card-stats-title">
                                            <i class="material-icons">content_copy</i> کل مشتریان</p>
                                        <h4 class="card-stats-number">{{$customer_count}}</h4>
                                        <p class="card-stats-compare">
                                            &nbsp
                                        </p>
                                    </div>
                                    <div class="card-action  deep-orange darken-1">
                                        <div id="invoice-line" class="center-align" style="visibility: hidden;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--card stats end-->
                    <!--chart dashboard start-->
                {{--<div id="chart-dashboard" hidden>--}}
                {{--<div class="row">--}}
                {{--<div class="col s12 m8 l8">--}}
                {{--<div class="card">--}}
                {{--<div class="card-move-up waves-effect waves-block waves-light">--}}
                {{--<div class="move-up cyan darken-1">--}}
                {{--<div>--}}
                {{--<span class="chart-title white-text">درآمد</span>--}}
                {{--<div class="chart-revenue cyan darken-2 white-text">--}}
                {{--<p class="chart-revenue-total">$4,500.85</p>--}}
                {{--<p class="chart-revenue-per">--}}
                {{--<i class="material-icons">arrow_drop_up</i> 21.80 %</p>--}}
                {{--</div>--}}
                {{--<div class="switch chart-revenue-switch right">--}}
                {{--<label class="cyan-text text-lighten-5">--}}
                {{--Month--}}
                {{--<input type="checkbox">--}}
                {{--<span class="lever"></span> Year--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="trending-line-chart-wrapper">--}}
                {{--<canvas id="trending-line-chart" height="70"></canvas>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                {{--<a class="btn-floating btn-move-up waves-effect waves-light red accent-2 z-depth-4 left">--}}
                {{--<i class="material-icons activator">filter_list</i>--}}
                {{--</a>--}}
                {{--<div class="col s12 m3 l3">--}}
                {{--<div id="doughnut-chart-wrapper">--}}
                {{--<canvas id="doughnut-chart" height="200"></canvas>--}}
                {{--<div class="doughnut-chart-status">4500--}}
                {{--<p class="ultra-small center-align">فروخته</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col s12 m2 l2">--}}
                {{--<ul class="doughnut-chart-legend">--}}
                {{--<li class="mobile ultra-small">--}}
                {{--<span class="legend-color"></span>آسیا--}}
                {{--</li>--}}
                {{--<li class="kitchen ultra-small">--}}
                {{--<span class="legend-color"></span>اروپا--}}
                {{--</li>--}}
                {{--<li class="home ultra-small">--}}
                {{--<span class="legend-color"></span>ایران--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col s12 m5 l6">--}}
                {{--<div class="trending-bar-chart-wrapper">--}}
                {{--<canvas id="trending-bar-chart" height="90"></canvas>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-reveal">--}}
                {{--<span class="card-title grey-text text-darken-4">Revenue by Month--}}
                {{--<i class="material-icons right">close</i>--}}
                {{--</span>--}}
                {{--<table class="responsive-table">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th data-field="id">ID</th>--}}
                {{--<th data-field="month">Month</th>--}}
                {{--<th data-field="item-sold">Item Sold</th>--}}
                {{--<th data-field="item-price">Item Price</th>--}}
                {{--<th data-field="total-profit">Total Profit</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                {{--<td>1</td>--}}
                {{--<td>January</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>2</td>--}}
                {{--<td>February</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>3</td>--}}
                {{--<td>March</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>4</td>--}}
                {{--<td>April</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>5</td>--}}
                {{--<td>May</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>6</td>--}}
                {{--<td>June</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>7</td>--}}
                {{--<td>July</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>8</td>--}}
                {{--<td>August</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>9</td>--}}
                {{--<td>Septmber</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>10</td>--}}
                {{--<td>Octomber</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>11</td>--}}
                {{--<td>November</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>12</td>--}}
                {{--<td>December</td>--}}
                {{--<td>122</td>--}}
                {{--<td>100</td>--}}
                {{--<td>$122,00.00</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--</table>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}


                {{--<div class="col s12 m4 l4">--}}
                {{--<div class="card">--}}
                {{--<div class="card-move-up teal accent-4 waves-effect waves-block waves-light">--}}
                {{--<div class="move-up">--}}
                {{--<p class="margin white-text">استان ها</p>--}}
                {{--<canvas id="trending-radar-chart" height="114"></canvas>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-content  teal">--}}
                {{--<a class="btn-floating btn-move-up waves-effect waves-light red accent-2 z-depth-4 left">--}}
                {{--<i class="material-icons activator">done</i>--}}
                {{--</a>--}}
                {{--<div class="line-chart-wrapper">--}}
                {{--<p class="margin white-text">درآمد بر اساس استانها</p>--}}
                {{--<canvas id="line-chart" height="114"></canvas>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-reveal">--}}
                {{--<span class="card-title grey-text text-darken-4">Revenue by country--}}
                {{--<i class="material-icons right">close</i>--}}
                {{--</span>--}}
                {{--<table class="responsive-table">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th data-field="country-name">Country Name</th>--}}
                {{--<th data-field="item-sold">Item Sold</th>--}}
                {{--<th data-field="total-profit">Total Profit</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                {{--<td>USA</td>--}}
                {{--<td>65</td>--}}
                {{--<td>$452.55</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>UK</td>--}}
                {{--<td>76</td>--}}
                {{--<td>$452.55</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>Canada</td>--}}
                {{--<td>65</td>--}}
                {{--<td>$452.55</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>Brazil</td>--}}
                {{--<td>76</td>--}}
                {{--<td>$452.55</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>India</td>--}}
                {{--<td>65</td>--}}
                {{--<td>$452.55</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>France</td>--}}
                {{--<td>76</td>--}}
                {{--<td>$452.55</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>Austrelia</td>--}}
                {{--<td>65</td>--}}
                {{--<td>$452.55</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>Russia</td>--}}
                {{--<td>76</td>--}}
                {{--<td>$452.55</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--</table>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <!--chart dashboard end-->
                    <!--work collections start-->
                    <div id="work-collections">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <ul id="waiting-reserves-list" class="collection z-depth-1">
                                    <li class="collection-item avatar">
                                        <i class="material-icons red accent-2 circle">bug_report</i>
                                        <h6 class="collection-header m-0">سفارش های منتظر تایید</h6>
                                        <p id="p-waiting-reserve-count">{{count($waiting_reserves)}} عدد</p>
                                    </li>
                                    @foreach($waiting_reserves as $waiting_reserve)
                                        @if($waiting_reserve->properties['situation']->title == 1)
                                            <li class="collection-item waiting-reserves-lists">
                                                <div class="row">
                                                    <div class="col s7">
                                                        <p class="collections-title">
                                                            <strong>کد رهگیری : </strong><span
                                                                    dir="ltr">{{$waiting_reserve->properties['code']->title}}</span>
                                                        </p>
                                                        <p class="collections-content">{{$waiting_reserve->room->properties['title']->title}}</p>
                                                    </div>
                                                    <div class="col s2">

                                                    </div>
                                                    <div class="col s3">
                                                        <button data-id="{{$waiting_reserve->id}}"
                                                                class="btn btn-red btn-bg button">
                                                            تایید اتاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        @elseif($waiting_reserve->properties['situation']->title == 5)
                                            <li class="collection-item waiting-reserves-lists yellow">
                                                <div class="row">
                                                    <div class="col s7">
                                                        <p class="collections-title">
                                                            <strong>کد رهگیری : </strong><span
                                                                    dir="ltr">{{$waiting_reserve->properties['code']->title}}</span>
                                                        </p>
                                                        <p class="collections-content">{{$waiting_reserve->room->properties['title']->title}}</p>
                                                    </div>
                                                    <div class="col s2">

                                                    </div>
                                                    <div class="col s3">
                                                        <button data-id="{{$waiting_reserve->id}}"
                                                                class="btn btn-red btn-bg button">
                                                            تایید رسید
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col s12 m12 l6">
                                <ul id="projects-collection" class="collection z-depth-1">
                                    <li class="collection-item avatar">
                                        <i class="material-icons cyan circle">card_travel</i>
                                        <h6 class="collection-header m-0">آخرین وضعیت اتاق ها</h6>
                                        <p>{{count($rooms)}}</p>
                                    </li>

                                    @foreach($rooms as $room)

                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col s6">
                                                    <p class="collections-title">{{$room->properties['title']->title}}</p>
                                                    @if(isset($room->properties['floor']->title))
                                                        <p class="collections-content">
                                                            طبقه
                                                            {{$room->properties['floor']->title}}
                                                        </p>
                                                    @else
                                                        <p class="collections-content">
                                                            -
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col s3">
                                                    @if(isset($room->properties['available']) and $room->properties['available']->title == '1')

                                                        <span class="task-cat blue">در دسترس است</span>
                                                        {{--                                            @if($room->situation == 'free')--}}
                                                        {{--                                                <span class="task-cat blue-grey">خالی است</span>--}}
                                                        {{--                                            @elseif($room->situation == 'reserved')--}}
                                                        {{--                                                <span class="task-cat blue">رزرو شده</span>--}}
                                                        {{--                                            @endif--}}

                                                    @else
                                                        <span class="task-cat grey">غیر فعال</span>
                                                    @endif
                                                </div>
                                                <div class="col s3">
                                                </div>
                                            </div>
                                        </li>


                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--work collections end-->
                    <!--card widgets start-->
                    <div id="card-widgets" hidden>
                        <div class="row">
                            <div class="col s12 m4 l4">
                                <ul id="task-card" class="collection with-header">
                                    <li class="collection-header teal accent-4">
                                        <h4 class="task-card-title">وظایف من</h4>
                                        <p class="task-card-date">14 خرداد 1398</p>
                                    </li>
                                    <li class="collection-item dismissable">
                                        <input type="checkbox" id="task1"/>
                                        <label for="task1">ثبت اتاق 104 در سیستم
                                            <a href="#" class="secondary-content">
                                                <span class="ultra-small">امروز</span>
                                            </a>
                                        </label>
                                        <span class="task-cat cyan">ثبت اتاق</span>
                                    </li>
                                    <li class="collection-item dismissable">
                                        <input type="checkbox" id="task1"/>
                                        <label for="task1">ثبت اتاق 104 در سیستم
                                            <a href="#" class="secondary-content">
                                                <span class="ultra-small">امروز</span>
                                            </a>
                                        </label>
                                        <span class="task-cat cyan">ثبت اتاق</span>
                                    </li>
                                    <li class="collection-item dismissable">
                                        <input type="checkbox" id="task1"/>
                                        <label for="task1">ثبت اتاق 104 در سیستم
                                            <a href="#" class="secondary-content">
                                                <span class="ultra-small">امروز</span>
                                            </a>
                                        </label>
                                        <span class="task-cat cyan">ثبت اتاق</span>
                                    </li>
                                    <li class="collection-item dismissable">
                                        <input type="checkbox" id="task4" checked="checked" disabled="disabled"/>
                                        <label for="task4">I did it !</label>
                                        <span class="task-cat deep-orange accent-2">Mobile App</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s12 m4 l4">
                                <ul id="task-card" class="collection with-header">
                                    <li class="collection-header teal accent-4">
                                        <h4 class="task-card-title">کاربران</h4>
                                        <p class="task-card-date">
                                            {{count($users)}}
                                        </p>
                                    </li>
                                    @foreach($users as $user1)
                                        <li class="collection-item dismissable">
                                            <input type="checkbox" id="task1"/>
                                            <label for="task1">ثبت اتاق 104 در سیستم
                                                <a href="#" class="secondary-content">
                                                    <span class="ultra-small">امروز</span>
                                                </a>
                                            </label>
                                            <span class="task-cat cyan">ثبت اتاق</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col s12 m4 l4">
                                <div id="profile-card" class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="{{asset('images/gallary/3.png')}}"
                                             alt="user bg">
                                    </div>
                                    <div class="card-content">
                                        <img src="{{asset('images/avatar/avatar-10.jpg')}}" alt=""
                                             class="circle responsive-img activator card-profile-image cyan lighten-1 padding-1">
                                        <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 left">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <span class="card-title activator grey-text text-darken-4">کامران صابری فرد</span>
                                        <p>
                                            <i class="material-icons">perm_identity</i> مدیر هتل</p>
                                        <p>
                                            <i class="material-icons">perm_phone_msg</i> +98 936 598 2333</p>
                                        <p>
                                            <i class="material-icons">email</i> kamisaberi@yahoo.com</p>
                                    </div>
                                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Roger Waters
                        <i class="material-icons right">close</i>
                      </span>
                                        <p>Here is some more information about this card.</p>
                                        <p>
                                            <i class="material-icons">perm_identity</i> Project Manager</p>
                                        <p>
                                            <i class="material-icons">perm_phone_msg</i> +1 (612) 222 8989</p>
                                        <p>
                                            <i class="material-icons">email</i> yourmail@domain.com</p>
                                        <p>
                                            <i class="material-icons">cake</i> 18th June 1990
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                            <i class="material-icons">airplanemode_active</i> BAR - AUS
                                        </p>
                                        <p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--card widgets end-->
                    <!-- //////////////////////////////////////////////////////////////////////////// -->
                </div>
            </div>
        </div>
    </div>


@endsection

@section('vendor-js')
@endsection


@section("footer")

    <script>

        $(document).ready(function () {
            $('.modal').modal();
        });

        $(document).ready(function () {

            $("#waiting-reserves-list").on("click", ".button", function () {
                var service_id = $(this).attr("data-id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('services.get', ['type'=>'reserve']) }}",
                    method: 'post',
                    data: {
                        service_id: service_id
                    },
                    success: function (result) {
                        var service = result.message;
                        var tbl_reserve_info = $("#tbl-reserve-info");
                        var s = "<tr><th>کد رهگیری</th><th>تاریخ ورود</th><th>تاریخ خروج</th></tr>";
                        s += "<tr><td>" + service.properties['code'].title + "</td>";
                        s += "<td>" + service.properties['ja-start-date'].title + "<br>" + service.properties['gr-start-date'].title + "</td>";
                        s += "<td>" + service.properties['ja-end-date'].title + "<br>" + service.properties['gr-end-date'].title + "</td></tr>";
                        tbl_reserve_info.html("");
                        tbl_reserve_info.html(s);
                        $("#hdn-service-id").val(service.id);

                        if (service.properties['situation'].title == 1) {
                            $("#hdn-type").val("room");
                            $("#dv-check-image").prop('hidden', true);
                        } else if (service.properties['situation'].title == 5) {
                            $("#hdn-type").val("check");
                            $("#dv-check-image").prop('hidden', false);
                            $("#dv-check-image  img").attr('src', service.check_path);
//                            alert(service.check_path);
                        }

                        $("#modal-room-confirmation").modal("open");

                    },
                    error: function (result) {
                        alert(result.status);
                    }

                });
            });

            $("#btn-modal-confirm-room-service").click(function () {


                var value;
                if ($("#hdn-type").val() == "room") {
                    value = 3;
                } else if ($("#hdn-type").val() == "check") {
                    value = 7;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('services.change',['type'=>'reserve']) }}",
                    method: 'post',
                    data: {
                        service_id: $("#hdn-service-id").val(),
                        property: 'situation',
                        value: value,
                    },
                    success: function (result) {
                        $("#modal-room-confirmation").modal("close");

                    },
                    error: function (result) {
                        alert(result.status);
                    }
                });


            });


            $("#btn-modal-reject-room-service").click(function () {


                var value;
                if ($("#hdn-type").val() == "room") {
                    value = 2;
                } else if ($("#hdn-type").val() == "check") {
                    value = 6;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('services.change',['type'=>'reserve'])}}",
                    method: 'post',
                    data: {
                        service_id: $("#hdn-service-id").val(),
                        property: 'situation',
                        value: 6,
                    },
                    success: function (result) {
                        $("#modal-room-confirmation").modal("close");

                    },
                    error: function (result) {
                        alert(result.status);
                    }
                });


            });

            var refreshData = function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('services.refresh', ['type'=>'reserve']) }}",
                    method: 'post',
                    data: {
                        type: 'reserve'
                    },
                    success: function (result) {
                        var oo = result.message.waiting_reserves;

                        $(".waiting-reserves-lists", "#waiting-reserves-list").remove();
                        var resreves = result.message.waiting_reserves;
                        $("#p-waiting-reserve-count").html(resreves.length + " عدد");
                        for (i = 0; i < resreves.length; i++) {

//                            $waiting_reserve - > room - > properties['title'] - > title
                            var ss = "";
                            if (resreves[i].properties['situation'].title == 1) {
                                ss = "<li class='collection-item waiting-reserves-lists'><div class='row'><div class='col s7'><p class='collections-title'>";
                                ss += "<strong> کد رهگیری : </strong><span dir='ltr'> " + resreves[i].properties['code'].title + "</span></p><p class='collections-content'>";
                                ss += resreves[i].room.properties['title'].title;
                                ss += "</p></div>";
                                ss += "<div class='col s2'></div><div class='col s3'><button data-id='" + resreves[i].id + "' class='btn btn-red btn-bg button'>"
                                ss += "تایید اتاق";
                                ss += "</button></div></div></li>";
                            } else if (resreves[i].properties['situation'].title == 5) {
                                ss = "<li class='collection-item waiting-reserves-lists yellow'><div class='row'><div class='col s7'><p class='collections-title'>";
                                ss += "<strong> کد رهگیری : </strong><span dir='ltr'> " + resreves[i].properties['code'].title + "</span></p><p class='collections-content'>";
                                ss += resreves[i].room.properties['title'].title;
                                ss += "</p></div>";
                                ss += "<div class='col s2'></div><div class='col s3'><button data-id='" + resreves[i].id + "' class='btn btn-red btn-bg button'>"
                                ss += "تایید رسید";
                                ss += "</button></div></div></li>";
                            }
                            $("#waiting-reserves-list").append(ss);
                        }
                    },
                    error: function (result) {
                        // alert("error");
                    }
                });
            };
            setInterval(refreshData, 5000);
        });


    </script>







@endsection
