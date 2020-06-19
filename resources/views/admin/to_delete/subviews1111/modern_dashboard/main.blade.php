<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
            <div class="row">

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-primary bg-darken-2">
                                    <i class="icon-camera font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-primary white media-body">
                                    <h5>{{__('layout.public.rooms')}}</h5>
                                    <h5 class="text-bold-400 mb-0">{{count($rooms)}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-danger bg-darken-2">
                                    <i class="icon-user font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-danger white media-body">
                                    <h5>{{__('layout.public.total users')}}</h5>
                                    <h5 class="text-bold-400 mb-0">{{count($users)}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-warning bg-darken-2">
                                    <i class="icon-basket-loaded font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-warning white media-body">
                                    <h5>{{__('layout.public.total customers')}}</h5>
                                    <h5 class="text-bold-400 mb-0">{{count($customers)}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-content">--}}
{{--                            <div class="media align-items-stretch">--}}
{{--                                <div class="p-2 text-center bg-success bg-darken-2">--}}
{{--                                    <i class="icon-wallet font-large-2 white"></i>--}}
{{--                                </div>--}}
{{--                                <div class="p-2 bg-gradient-x-success white media-body">--}}
{{--                                    <h5>{{__('layout.public.total income')}}</h5>--}}
{{--                                    <h5 class="text-bold-400 mb-0">{{number_format($total_income)}}</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <!--/ Stats -->

            <!-- activity charts -->
        {{--            <div class="row match-height">--}}
        {{--                <div class="col-xl-8 col-lg-12">--}}
        {{--                    <div class="card">--}}
        {{--                        <div class="card-header border-0-bottom">--}}
        {{--                            <h4 class="card-title">Activity Chart <span class="text-muted text-bold-400">Weekly</span></h4>--}}
        {{--                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>--}}
        {{--                            <div class="heading-elements">--}}
        {{--                                <ul class="list-inline mb-0">--}}
        {{--                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="card-content">--}}
        {{--                            <div class="card-body">--}}
        {{--                                <div id="weekly-activity-chart" class="height-250"></div>--}}
        {{--                                <ul class="list-inline text-center m-0">--}}
        {{--                                    <li>--}}
        {{--                                        <h6><i class="ft-circle danger"></i> Runnig</h6>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="ml-1">--}}
        {{--                                        <h6><i class="ft-circle success"></i> Walking</h6>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="ml-1">--}}
        {{--                                        <h6><i class="ft-circle warning"></i> Cycling</h6>--}}
        {{--                                    </li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-xl-4 col-lg-12">--}}
        {{--                    <div class="card">--}}
        {{--                        <div class="card-content">--}}
        {{--                            <div class="card-body">--}}
        {{--                                <div id="activity-division" class="height-250 echart-container"></div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        <!--/ activity charts -->

            <!--Recent Orders & Monthly Salse -->
            <div class="row match-height">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">آخرین رزرو ها جهت بررسی</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p>
                                    کل رزرو ها
                                    <span id="spn-all-reserves">
{{--                                    {{count($all_reserves)}}--}}
                                        </span>
                                    ,
                                    تکمیل شده :
                                    <span id="spn-verified-reserves">
{{--                                    {{count($verified_reserves)}}--}}
                                        </span>
                                    ,
                                    در انتظار بررسی :
                                    <span id="spn-waiting-reserves">
{{--                                    {{count($waiting_reserves)}}--}}
                                    </span>

                                    <span class="float-right">
                                        <a href="{{route('services.index', ['type'=>'reserve'])}}">
                                            مشاهده تمامی رزرو ها
{{--                                            <i class="ft-arrow-left"></i>--}}
                                        </a>
                                    </span>
                                </p>
                            </div>

                            {{--                            {{dd($reserves)}}--}}
                            @include('admin.items.widgets.table-view-in-admin', ['datas'=>$reserves])

                            {{--                            <div class="table-responsive">--}}
                            {{--                                <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">--}}
                            {{--                                    <thead>--}}
                            {{--                                        <tr>--}}
                            {{--                                            <th>{{__('layout.public.rooms')}}</th>--}}
                            {{--                                            <th>کد رزرو</th>--}}
                            {{--                                            <th>مشتری</th>--}}
                            {{--                                            <th>وضعیت</th>--}}
                            {{--                                            <th>مقدار</th>--}}
                            {{--                                        </tr>--}}
                            {{--                                    </thead>--}}
                            {{--                                    <tbody>--}}
                            {{--                                        @php($rev= unserialize(serialize($waiting_reserves)))--}}
                            {{--                                        @php(rsort($rev))--}}
                            {{--                                        @php($top_5= array_slice($rev, 0,5))--}}
                            {{--                                        @foreach($top_5 as $re)--}}
                            {{--                                            <tr>--}}
                            {{--                                                <td class="text-truncate">{{$re->room->properties['title']->title}}</td>--}}
                            {{--                                                <td class="text-truncate">--}}
                            {{--                                                    @if($re->properties['situation']->title == 7 ||  $re->properties['situation']->title == 9)--}}
                            {{--                                                        <a href="{{route('home.voucher.print', ['code'=>$re->properties['code']->title])}}" target="_blank">{{$re->properties['code']->title}}</a>--}}
                            {{--                                                    @else--}}
                            {{--                                                        {{$re->properties['code']->title}}--}}
                            {{--                                                    @endif--}}
                            {{--                                                </td>--}}
                            {{--                                                <td class="text-truncate">{{$re->properties['customer']->title}}</td>--}}

                            {{--                                                <td class="text-truncate"><span--}}
                            {{--                                                            class="badge badge-success">{{__('messages.service_situations.'. $re->properties['situation']->title)}}</span></td>--}}

                            {{--                                                <td class="text-truncate">{{number_format($re->properties['price']->title)}}</td>--}}
                            {{--                                            </tr>--}}

                            {{--                                        @endforeach--}}

                            {{--                                        --}}{{--                                        <tr>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">PO-10521</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><a href="index.html#">INV-001001</a></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">Elizabeth W.</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><span class="badge badge-success">Paid</span></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">$ 1200.00</td>--}}
                            {{--                                        --}}{{--                                        </tr>--}}
                            {{--                                        --}}{{--                                        <tr>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">PO-532521</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><a href="index.html#">INV-01112</a></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">Doris R.</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">$ 5685.00</td>--}}
                            {{--                                        --}}{{--                                        </tr>--}}
                            {{--                                        --}}{{--                                        <tr>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">PO-05521</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><a href="index.html#">INV-001012</a></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">Andrew D.</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><span class="badge badge-success">Paid</span></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">$ 152.00</td>--}}
                            {{--                                        --}}{{--                                        </tr>--}}
                            {{--                                        --}}{{--                                        <tr>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">PO-15521</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><a href="index.html#">INV-001401</a></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">Megan S.</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><span class="badge badge-success">Paid</span></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">$ 1450.00</td>--}}
                            {{--                                        --}}{{--                                        </tr>--}}
                            {{--                                        --}}{{--                                        <tr>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">PO-32521</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><a href="index.html#">INV-008101</a></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">Walter R.</td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>--}}
                            {{--                                        --}}{{--                                            <td class="text-truncate">$ 685.00</td>--}}
                            {{--                                        --}}{{--                                        </tr>--}}
                            {{--                                    </tbody>--}}
                            {{--                                </table>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                {{--                <div class="col-xl-4 col-lg-12">--}}
                {{--                    <div class="card">--}}
                {{--                        <div class="card-content">--}}
                {{--                            <div class="card-body sales-growth-chart">--}}
                {{--                                <div id="monthly-sales" class="height-250"></div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="card-footer">--}}
                {{--                            <div class="chart-title mb-1 text-center">--}}
                {{--                                <h6>Total monthly Sales.</h6>--}}
                {{--                            </div>--}}
                {{--                            <div class="chart-stats text-center">--}}
                {{--                                <a href="index.html#" class="btn btn-sm btn-primary mr-1">Statistics <i class="ft-bar-chart"></i></a> <span--}}
                {{--                                        class="text-muted">for the last year.</span>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <!--/Recent Orders & Monthly Salse -->


            <!--Product sale & buyers -->
            <div class="row match-height">
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> سفارش ها</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div id="products-sales" class="height-300"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">مشتریان اخیر</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content px-1">
                            <div id="recent-buyers" class="media-list height-300 position-relative">

                                @foreach($customers as $customer)
                                    <a href="{{route('users.index', ['type'=>'customer'])}}" class="media border-0">
                                        <div class="media-left pr-1">
                                        <span class="avatar avatar-md avatar-online">
                                            <img class="media-object rounded-circle" src="{{asset('admin-assets/images/portrait/small/avatar-s-7.png')}}"
                                                 alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                        </div>
                                        <div class="media-body w-100">
                                            <h6 class="list-group-item-heading">
                                                {{$customer->email}}
                                                <span class="font-medium-4 float-right pt-1">-</span>
                                            </h6>
                                            <p class="list-group-item-text mb-0">
                                                {{--                                                <span class="badge badge-primary">Electronics</span>--}}
                                                {{--                                                <span class="badge badge-warning ml-1">Decor</span>--}}
                                            </p>
                                        </div>
                                    </a>

                                @endforeach


                                {{--                                <a href="index.html#" class="media border-0">--}}
                                {{--                                    <div class="media-left pr-1">--}}
                                {{--                            <span class="avatar avatar-md avatar-away"><img class="media-object rounded-circle" src="{{asset('admin-assets/images/portrait/small/avatar-s-8.png')}}"--}}
                                {{--                                                                            alt="Generic placeholder image">--}}
                                {{--                            <i></i>--}}
                                {{--                            </span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="media-body w-100">--}}
                                {{--                                        <h6 class="list-group-item-heading">Lawrence Fowler <span class="font-medium-4 float-right pt-1">$2,021</span></h6>--}}
                                {{--                                        <p class="list-group-item-text mb-0"><span class="badge badge-danger">Appliances</span></p>--}}
                                {{--                                    </div>--}}
                                {{--                                </a>--}}


                                {{--                                <a href="index.html#" class="media border-0">--}}
                                {{--                                    <div class="media-left pr-1">--}}
                                {{--                            <span class="avatar avatar-md avatar-busy"><img class="media-object rounded-circle" src="{{asset('admin-assets/images/portrait/small/avatar-s-9.png')}}"--}}
                                {{--                                                                            alt="Generic placeholder image">--}}
                                {{--                            <i></i>--}}
                                {{--                            </span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="media-body w-100">--}}
                                {{--                                        <h6 class="list-group-item-heading">Linda Olson <span class="font-medium-4 float-right pt-1">$1,112</span></h6>--}}
                                {{--                                        <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span> <span--}}
                                {{--                                                    class="badge badge-success ml-1">Office</span>--}}
                                {{--                                        </p>--}}
                                {{--                                    </div>--}}
                                {{--                                </a>--}}

                                {{--                                <a href="index.html#" class="media border-0">--}}
                                {{--                                    <div class="media-left pr-1">--}}
                                {{--                            <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle"--}}
                                {{--                                                                              src="{{asset('admin-assets/images/portrait/small/avatar-s-10.png')}}"--}}
                                {{--                                                                              alt="Generic placeholder image">--}}
                                {{--                            <i></i>--}}
                                {{--                            </span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="media-body w-100">--}}
                                {{--                                        <h6 class="list-group-item-heading">Roy Clark <span class="font-medium-4 float-right pt-1">$2,815</span></h6>--}}
                                {{--                                        <p class="list-group-item-text mb-0"><span class="badge badge-warning">Decor</span> <span--}}
                                {{--                                                    class="badge badge-danger ml-1">Appliances</span></p>--}}
                                {{--                                    </div>--}}
                                {{--                                </a>--}}


                                {{--                                <a href="index.html#" class="media border-0">--}}
                                {{--                                    <div class="media-left pr-1">--}}
                                {{--                            <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle"--}}
                                {{--                                                                              src="{{asset('admin-assets/images/portrait/small/avatar-s-11.png')}}"--}}
                                {{--                                                                              alt="Generic placeholder image">--}}
                                {{--                            <i></i>--}}
                                {{--                            </span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="media-body w-100">--}}
                                {{--                                        <h6 class="list-group-item-heading">Kristopher Candy <span class="font-medium-4 float-right pt-1">$2,021</span></h6>--}}
                                {{--                                        <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span><span--}}
                                {{--                                                    class="badge badge-warning ml-1">Decor</span>--}}
                                {{--                                        </p>--}}
                                {{--                                    </div>--}}
                                {{--                                </a>--}}


                                {{--                                <a href="index.html#" class="media border-0">--}}
                                {{--                                    <div class="media-left pr-1">--}}
                                {{--                            <span class="avatar avatar-md avatar-away"><img class="media-object rounded-circle"--}}
                                {{--                                                                            src="{{asset('admin-assets/images/portrait/small/avatar-s-12.png')}}"--}}
                                {{--                                                                            alt="Generic placeholder image">--}}
                                {{--                            <i></i>--}}
                                {{--                            </span>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="media-body w-100">--}}
                                {{--                                        <h6 class="list-group-item-heading">Lawrence Fowler <span class="font-medium-4 float-right pt-1">$1,321</span></h6>--}}
                                {{--                                        <p class="list-group-item-text mb-0"><span class="badge badge-danger">Appliances</span></p>--}}
                                {{--                                    </div>--}}
                                {{--                                </a>--}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Product sale & buyers -->
            <!-- Social & Weather -->
        {{--            <div class="row match-height">--}}
        {{--                <div class="col-xl-4 col-lg-12">--}}
        {{--                    <div class="card bg-gradient-x-danger">--}}
        {{--                        <div class="card-content">--}}
        {{--                            <div class="card-body">--}}
        {{--                                <div class="animated-weather-icons text-center float-left">--}}
        {{--                                    <svg version="1.1" id="cloudHailAlt2" class="climacon climacon_cloudHailAlt climacon-blue-grey climacon-darken-2 height-100"--}}
        {{--                                         viewBox="15 15 70 70">--}}
        {{--                                        <g class="climacon_iconWrap climacon_iconWrap-cloudHailAlt">--}}
        {{--                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-hailAlt">--}}
        {{--                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">--}}
        {{--                                                    <circle cx="42" cy="65.498" r="2"></circle>--}}
        {{--                                                </g>--}}
        {{--                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">--}}
        {{--                                                    <circle cx="49.999" cy="65.498" r="2"></circle>--}}
        {{--                                                </g>--}}
        {{--                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">--}}
        {{--                                                    <circle cx="57.998" cy="65.498" r="2"></circle>--}}
        {{--                                                </g>--}}
        {{--                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">--}}
        {{--                                                    <circle cx="42" cy="65.498" r="2"></circle>--}}
        {{--                                                </g>--}}
        {{--                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">--}}
        {{--                                                    <circle cx="49.999" cy="65.498" r="2"></circle>--}}
        {{--                                                </g>--}}
        {{--                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">--}}
        {{--                                                    <circle cx="57.998" cy="65.498" r="2"></circle>--}}
        {{--                                                </g>--}}
        {{--                                            </g>--}}
        {{--                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">--}}
        {{--                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud"--}}
        {{--                                                      d="M63.999,64.941v-4.381c2.39-1.384,3.999-3.961,3.999-6.92c0-4.417-3.581-8-7.998-8c-1.602,0-3.084,0.48-4.334,1.291c-1.23-5.317-5.974-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.998c0,3.549,1.55,6.728,3.999,8.924v4.916c-4.776-2.768-7.998-7.922-7.998-13.84c0-8.835,7.162-15.997,15.997-15.997c6.004,0,11.229,3.311,13.966,8.203c0.663-0.113,1.336-0.205,2.033-0.205c6.626,0,11.998,5.372,11.998,12C71.998,58.863,68.656,63.293,63.999,64.941z"></path>--}}
        {{--                                            </g>--}}
        {{--                                        </g>--}}
        {{--                                    </svg>--}}
        {{--                                </div>--}}
        {{--                                <div class="weather-details text-center">--}}
        {{--                                    <span class="block white darken-1">Snow</span>--}}
        {{--                                    <span class="font-large-2 block white darken-4 ">-5&deg;</span>--}}
        {{--                                    <span class="font-medium-4 text-bold-500 white darken-1">London, UK</span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-footer bg-gradient-x-danger border-0">--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-4 text-center display-table-cell white">--}}
        {{--                                        <i class="me-wind font-large-1 lighten-3 align-middle"></i> <span class="align-middle">2MPH</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-4 text-center display-table-cell white">--}}
        {{--                                        <i class="me-sun2 font-large-1 lighten-3 align-middle"></i> <span class="align-middle">2%</span>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-4 text-center display-table-cell white">--}}
        {{--                                        <i class="me-thermometer font-large-1 lighten-3 align-middle"></i> <span class="align-middle">13.0&deg;</span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-xl-4 col-lg-12">--}}
        {{--                    <div class="card bg-gradient-x-info white">--}}
        {{--                        <div class="card-content">--}}
        {{--                            <div class="card-body text-center">--}}
        {{--                                <div class="mb-2">--}}
        {{--                                    <i class="fa fa-twitter font-large-2"></i>--}}
        {{--                                </div>--}}
        {{--                                <div class="tweet-slider">--}}
        {{--                                    <ul>--}}
        {{--                                        <li>Congratulations to Rob Jones in accounting for winning our <span class="yellow">#NFL</span> football pool!--}}
        {{--                                            <p class="text-italic pt-1">- John Doe</p>--}}
        {{--                                        </li>--}}
        {{--                                        <li>Contests are a great thing to partner on. Partnerships immediately <span class="yellow">#DOUBLE</span> the reach.--}}
        {{--                                            <p class="text-italic pt-1">- John Doe</p>--}}
        {{--                                        </li>--}}
        {{--                                        <li>Puns, humor, and quotes are great content on <span class="yellow">#Twitter</span>. Find some related to your business.--}}
        {{--                                            <p class="text-italic pt-1">- John Doe</p>--}}
        {{--                                        </li>--}}
        {{--                                        <li>Are there <span class="yellow">#common-sense</span> facts related to your business? Combine them with a great photo.--}}
        {{--                                            <p class="text-italic pt-1">- John Doe</p>--}}
        {{--                                        </li>--}}
        {{--                                    </ul>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-xl-4 col-lg-12">--}}
        {{--                    <div class="card bg-gradient-x-primary white">--}}
        {{--                        <div class="card-content">--}}
        {{--                            <div class="card-body text-center">--}}
        {{--                                <div class="mb-2">--}}
        {{--                                    <i class="fa fa-facebook font-large-2"></i>--}}
        {{--                                </div>--}}
        {{--                                <div class="fb-post-slider">--}}
        {{--                                    <ul>--}}
        {{--                                        <li>Congratulations to Rob Jones in accounting for winning our #NFL football pool!--}}
        {{--                                            <p class="text-italic pt-1">- John Doe</p>--}}
        {{--                                        </li>--}}
        {{--                                        <li>Contests are a great thing to partner on. Partnerships immediately #DOUBLE the reach.--}}
        {{--                                            <p class="text-italic pt-1">- John Doe</p>--}}
        {{--                                        </li>--}}
        {{--                                        <li>Puns, humor, and quotes are great content on #Twitter. Find some related to your business.--}}
        {{--                                            <p class="text-italic pt-1">- John Doe</p>--}}
        {{--                                        </li>--}}
        {{--                                        <li>Are there #common-sense facts related to your business? Combine them with a great photo.--}}
        {{--                                            <p class="text-italic pt-1">- John Doe</p>--}}
        {{--                                        </li>--}}
        {{--                                    </ul>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        <!--/ Social & Weather -->

        </div>
    </div>
</div>
