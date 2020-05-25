@extends("admin.layouts.admin")
@section('vendor-css')
    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors-rtl.min.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/flag-icon/css/flag-icon.min.css')}}">

    <link href="{{asset('admin-assets/vendors/css/flag-icon/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/vendors/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
@endsection


@section("header")


    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/colors/palette-gradient.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style-rtl.css">
        <!-- END: Custom CSS-->
    @else
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/colors/palette-gradient.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
        <!-- END: Custom CSS-->

    @endif



@endsection
@section("main")

    <div class="app-content content">
        <div class="content-wrapper">
            @include('admin.layouts.widgets.breadcrumbs', ['page_title'=>$page_title , 'breadcrumbs'=> $breadcrumbs])
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">{{$page_title}}</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class=" col m12  alert alert-danger print-error-msg red-text" style="display:none">
                                                <ul></ul>
                                            </div>
                                        </div>

                                        <form id="form" action="{{$urls['store']}}" method="post">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Information</h4>
                                                {{@csrf_field()}}

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.input_titles')['title']}}</label>
                                                            <input class="form-control" id="title" name="title" type="text">
                                                            <div class="locales" style="margin-right: 3rem;">
                                                                <a href="#">
                                                                    <input type="hidden" id="title-fa" name="title-fa" value="1">
                                                                    <span class="flag-icon flag-icon-ir"></span>
                                                                </a>
                                                                <a href="#">
                                                                    <input type="hidden" id="title-en" name="title-en" value="2">
                                                                    <span class="flag-icon flag-icon-gb flag-icon-grayed"></span>
                                                                </a>
                                                                <a href="#">
                                                                    <input type="hidden" id="title-ar" name="title-ar" value="3">
                                                                    <span class="flag-icon flag-icon-sa flag-icon-grayed"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="can_have_item">تعداد آیتم ها</label>
                                                            <input id="can_have_item" name="can_have_item" min="0" class="form-control"
                                                                   type="number">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="reset" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-check-square-o"></i> {{__('messages.operations.submit')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </div>
    </div>







@endsection
@section('vendor-js')
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>

@endsection

@section("footer")

    <script src="{{asset('admin-assets/js/mine/items.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/mine/form-action.js')}}"></script>



@endsection