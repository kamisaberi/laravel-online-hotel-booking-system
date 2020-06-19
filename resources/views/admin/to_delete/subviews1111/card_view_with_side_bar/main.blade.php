<div class="app-content content">
    <div class="content-wrapper">

        @include('admin.layouts.widgets.breadcrumbs', ['page_title'=>$page_title , 'breadcrumbs'=> $breadcrumbs])
        <div class="content-detached content-right">
            <div class="content-body">
                <div class="content-overlay"></div>
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="bug-list-search">
                                    <div class="bug-list-search-content">
                                        <div class="sidebar-toggle d-block d-lg-none"><i class="ft-menu font-large-1"></i></div>
                                        <form action="#">
                                            <div class="position-relative">
                                                <input type="search" id="search-contacts" class="form-control" placeholder="Search contacts...">
                                                <div class="form-control-position">
                                                    <i class="fa fa-search text-size-base text-muted la-rotate-270"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="row all-contacts">
                    @foreach($datas as $data)
                        @if(isset($widgets[0]->widget))
                            @include($widgets[0]->widget,['data'=>$data])
                        @endif
                    @endforeach
                </section>
            </div>
        </div>
        <div class="sidebar-detached sidebar-left">
            <div class="sidebar">
                <div class="bug-list-sidebar-content">
                    <!-- Predefined Views -->
                    <div class="card">
                        <div class="card-head">
                            <div class="media p-1">
                                <div class="media-left pr-1">
                                    {{--                                    <span class="avatar avatar-sm avatar-online rounded-circle">--}}
                                    {{--                                        <img src="{{asset('admin-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar">--}}
                                    {{--                                        <i></i>--}}
                                    {{--                                    </span>--}}
                                </div>
                                <div class="media-body media-middle">
                                    <h5 class="media-heading">{{$page_title}}</h5>
                                </div>
                            </div>
                        </div>

                        <!-- contacts view -->
                    {{--                        <div class="card-body border-top-blue-grey border-top-lighten-5">--}}
                    {{--                            <div class="list-group">--}}
                    {{--                                <a href="#" class="list-group-item active">All Contacts</a>--}}
                    {{--                                <a href="#" class="list-group-item list-group-item-action">Recently contacted</a>--}}
                    {{--                                <a href="#" class="list-group-item list-group-item-action">Favorite contacts</a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    <!-- Groups-->
                        <div class="card-body">
                            <p class="lead">اطلاعات:</p>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="badge badge-primary badge-pill float-right">
                                        {{count($datas)}}
                                    </span>
                                    <a href="#">
                                        تعداد آیتم ها
                                    </a>
                                </li>
                                {{--                                <li class="list-group-item">--}}
                                {{--                                    <span class="badge badge-info badge-pill float-right">--}}
                                {{--                                        22--}}
                                {{--                                    </span>--}}
                                {{--                                    <a href="#">--}}
                                {{--                                        Team--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                                {{--                                <li class="list-group-item">--}}
                                {{--                                    <span class="badge badge-warning badge-pill float-right">--}}
                                {{--                                        10--}}
                                {{--                                    </span>--}}
                                {{--                                    <a href="#">--}}
                                {{--                                        Clients--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                                {{--                                <li class="list-group-item">--}}
                                {{--                                    <span class="badge badge-success badge-pill float-right">--}}
                                {{--                                        5--}}
                                {{--                                    </span>--}}
                                {{--                                    <a href="#">--}}
                                {{--                                        Friends--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                            </ul>
                        </div>
                        <!--/ Groups-->

                        <!--More-->
                        <div class="card-body ">
                            <p class="lead">عملیات:</p>
                            <ul class="list-group">
                                @can($permissions['create'])
                                    @if(isset($urls['create']))
                                        <li><a href="{{$urls['create']}}" class="list-group-item">جدید</a></li>
                                    @endif
                                @endcan
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Import</a></li>--}}
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Export</a></li>--}}
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Print</a></li>--}}
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Restore contacts</a></li>--}}
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Find duplicate</a></li>--}}
                            </ul>
                        </div>

                        <div class="card-body ">
                            <p class="lead">فیلتر ها:</p>
                            <ul class="list-group">
                                @isset($properties)
                                    @foreach($properties as $property)
                                        @foreach($property->filters as $filter)
                                            @if($filter['type'] == 'a')
                                                <li>
                                                    <a href="{{$filter['url']}}" class="list-group-item">
                                                        {{isset($filter['title'][App::getLocale()]) ? $filter['title'][App::getLocale()] : '' }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endisset

                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Import</a></li>--}}
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Export</a></li>--}}
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Print</a></li>--}}
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Restore contacts</a></li>--}}
                                {{--                                <li><a href="app-contacts.html#" class="list-group-item">Find duplicate</a></li>--}}
                            </ul>
                        </div>
                        <!--/More-->

                    </div>
                    <!--/ Predefined Views -->

                </div>
            </div>
        </div>
    </div>
</div>
