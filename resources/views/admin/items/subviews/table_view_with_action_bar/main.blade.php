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
                                        <form action="app-contacts.html#">
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
                    <div class="col-12">
                        <div class="card">
                            {{--                            <div class="card-head">--}}
                            {{--                                <div class="card-header">--}}
                            {{--                                    <h4 class="card-title">All Contacts</h4>--}}
                            {{--                                    <div class="heading-elements mt-0">--}}
                            {{--                                        <button class="btn btn-primary btn-sm " data-toggle="modal" data-target="#AddContactModal">--}}
                            {{--                                            <i class="d-md-none d-block ft-plus white"></i>--}}
                            {{--                                            <span class="d-md-block d-none">Add Contacts</span>--}}
                            {{--                                        </button>--}}
                            {{--                                        <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"--}}
                            {{--                                             aria-hidden="true">--}}
                            {{--                                            <div class="modal-dialog" role="document">--}}
                            {{--                                                <div class="modal-content">--}}
                            {{--                                                    <section class="contact-form">--}}
                            {{--                                                        <form id="form-add-contact" class="contact-input">--}}
                            {{--                                                            <div class="modal-header">--}}
                            {{--                                                                <h5 class="modal-title" id="exampleModalLabel1">Add New Contact</h5>--}}
                            {{--                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                            {{--                                                                    <span aria-hidden="true">&times;</span>--}}
                            {{--                                                                </button>--}}
                            {{--                                                            </div>--}}
                            {{--                                                            <div class="modal-body">--}}
                            {{--                                                                <fieldset class="form-group col-12">--}}
                            {{--                                                                    <input type="text" id="contact-name" class="contact-name form-control" placeholder="Name">--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                                <fieldset class="form-group col-12">--}}
                            {{--                                                                    <input type="text" id="contact-email" class="contact-email form-control" placeholder="Email">--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                                <fieldset class="form-group col-12">--}}
                            {{--                                                                    <input type="text" id="contact-phone" class="contact-phone form-control" placeholder="Phone Number">--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                                <fieldset class="form-group col-12">--}}
                            {{--                                                                    <input type="checkbox" id="favorite" class="contact-fav input-chk"> Favorite--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                                <fieldset class="form-group col-12">--}}
                            {{--                                                                    <input type="file" class="form-control-file" id="user-image">--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                            </div>--}}
                            {{--                                                            <div class="modal-footer">--}}
                            {{--                                                                <fieldset class="form-group position-relative has-icon-left mb-0">--}}
                            {{--                                                                    <button type="button" id="add-contact-item" class="btn btn-info add-contact-item" data-dismiss="modal"><i--}}
                            {{--                                                                                class="fa fa-paper-plane-o d-block d-lg-none"></i> <span--}}
                            {{--                                                                                class="d-none d-lg-block">Add New</span></button>--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                            </div>--}}
                            {{--                                                        </form>--}}
                            {{--                                                    </section>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="modal fade" id="EditContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
                            {{--                                             aria-hidden="true">--}}
                            {{--                                            <div class="modal-dialog" role="document">--}}
                            {{--                                                <div class="modal-content">--}}
                            {{--                                                    <section class="contact-form">--}}
                            {{--                                                        <form id="form-edit-contact" class="contact-input">--}}
                            {{--                                                            <div class="modal-header">--}}
                            {{--                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>--}}
                            {{--                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                            {{--                                                                    <span aria-hidden="true">&times;</span>--}}
                            {{--                                                                </button>--}}
                            {{--                                                            </div>--}}
                            {{--                                                            <div class="modal-body">--}}
                            {{--                                                                <fieldset class="form-group col-12">--}}
                            {{--                                                                    <input type="text" id="name" class="name form-control" placeholder="Name">--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                                <fieldset class="form-group col-12">--}}
                            {{--                                                                    <input type="text" id="email" class="email form-control" placeholder="Email">--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                                <fieldset class="form-group col-12">--}}
                            {{--                                                                    <input type="text" id="phone" class="phone form-control" placeholder="Phone Number">--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                                <span id="fav" class="d-none"></span>--}}
                            {{--                                                            </div>--}}
                            {{--                                                            <div class="modal-footer">--}}
                            {{--                                                                <fieldset class="form-group position-relative has-icon-left mb-0">--}}
                            {{--                                                                    <button type="button" id="edit-contact-item" class="btn btn-info edit-contact-item" data-dismiss="modal"><i--}}
                            {{--                                                                                class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Edit</span></button>--}}
                            {{--                                                                </fieldset>--}}
                            {{--                                                            </div>--}}
                            {{--                                                        </form>--}}
                            {{--                                                    </section>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}

                            {{--                                        <span class="dropdown">--}}
                            {{--                                            <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"--}}
                            {{--                                                    class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm">--}}
                            {{--                                                <i class="ft-download-cloud white"></i>--}}
                            {{--                                            </button>--}}
                            {{--                							<span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">--}}
                            {{--				                				<a href="#" class="dropdown-item"><i class="ft-upload"></i> Import</a>--}}
                            {{--                								<a href="#" class="dropdown-item"><i class="ft-download"></i> Export</a>--}}
                            {{--                								<a href="#" class="dropdown-item"><i class="ft-shuffle"></i> Find Duplicate</a>--}}
                            {{--                							</span>--}}
                            {{--                						</span>--}}
                            {{--                                        <button class="btn btn-default btn-sm">--}}
                            {{--                                            <i class="ft-settings white"></i>--}}
                            {{--                                        </button>--}}

                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Task List table -->
                                    {{--                                    <button type="button" class="btn btn-danger btn-sm delete-all mb-1">Delete All</button>--}}
                                    <div class="table-responsive">

                                        @if(isset($widgets[0]->widget))

                                            @include($widgets[0]->widget , ['datas'=>$datas])
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            </ul>
                        </div>

                        <div class="card-body ">
                            <p class="lead">فیلتر ها:</p>
                            <ul class="list-group">
                                @isset($filters)
                                    @foreach($filters as $filter1)
                                        @foreach($filter1['properties'] as $property)
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
                                    @endforeach
                                @endisset
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
