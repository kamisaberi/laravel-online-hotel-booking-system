<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        @include('admin.layouts.widgets.breadcrumbs', ['page_title'=>$page_title , 'breadcrumbs'=> $breadcrumbs])
        <div class="content-body">

            <!--fitness stats-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">
                                        <div class="media">
                                            <div class="media-left pr-1">
                                                <img class="media-object img-xl" src="{{asset('admin-assets/images/portrait/small/avatar-s-5.png')}}"
                                                     alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="text-bold-500 pt-1 mb-0">{{$data->properties['name']->value}}</h6>
                                                <p>{{$data->properties['last-name']->value}}</p>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">--}}
{{--                                        <p>Distance <span class="text-muted">(Last Week)</span></p>--}}
{{--                                        <div class="progress progress-sm mt-1 mb-0">--}}
{{--                                            <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="25" aria-valuemin="0"--}}
{{--                                                 aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <h6 class="text-bold-500 mt-1 mb-0">80 KM</h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix py-2 text-center">--}}
{{--                                        <div id="fitness-stats"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-3 col-lg-6 col-md-12 text-center clearfix">--}}
{{--                                        <h6 class="pt-1"><span class="icon-clock"></span> 56:55 Hrs</h6>--}}
{{--                                        <p>Anverage Running Time</p>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fitness stats-->
            <!--stats-->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="primary">-</h3>
                                        <span>بازدید</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-user-follow primary font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0" hidden>
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="danger">{{number_format(count($reserves)) }}</h3>
                                        <span>تعداد رزروها</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-social-dropbox danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0" hidden>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">


                                        @php($ttl= 0)
                                        @foreach($reserves as $reserve )
                                            @php($ttl+=$reserve->properties['price']->value)
                                        @endforeach
                                        <h3 class="success">
                                            {{number_format($ttl)}}
                                            تومان
                                        </h3>
                                        <span>هزینه پرداختی</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-layers success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0" hidden>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="warning">-</h3>
                                        <span>معرفی شدگان</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-globe warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0" hidden>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/stats-->

            <!-- friends & weather charts -->
            <div class="row match-height">
                <div class="col-xl-6 col-lg-6 col-md-12" hidden>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">رزرو ها</h4>
                                <p class="card-text">تنها رزرو های تایید شده نمایش داده میشود</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="badge badge-pill bg-primary float-right">4</span> Protein Milk
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-pill bg-info float-right">2</span> oz Water
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-pill bg-danger float-right">8</span> Vegetable Juice
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-pill bg-warning float-right">1</span> Sugar Free Jello-O
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-pill bg-success float-right">3</span> Protein Meal
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-12">
                    <div class="card">
                        <div class="card-header border-0-bottom">
                            <h4 class="card-title">رزرو ها</h4>
                            <p class="card-text">تنها رزرو های تایید شده نمایش داده میشود</p>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div id="daily-activity" class="table-responsive height-350">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>تاریخ ورود</th>
                                            <th>تاریخ خروج</th>
                                            <th>هزینه</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reserves as $reserve)
                                            <tr>
                                                <td class="text-truncate">{{$reserve->properties['start-date']->value['ja']}}</td>
                                                <td class="text-truncate">{{$reserve->properties['end-date']->value['ja']}}</td>
                                                <td class="text-truncate">{{number_format($reserve->properties['price']->value)}}</td>
                                                <td class="text-truncate">
                                                    <a href="{{route('home.voucher.print', ['code'=>$reserve->properties['code']->value])}}" target="_blank" title="واچر">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>تاریخ ورود</th>
                                            <th>تاریخ خروج</th>
                                            <th>هزینه</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- friends & weather charts -->

        </div>
    </div>
</div>
<!-- END: Content-->
