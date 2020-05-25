@extends("admin.layouts.admin")
@section('vendor-css')

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors-rtl.min.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
    @endif


    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/extensions/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/toggle/switchery.min.css')}}">
@endsection


@section("header")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/colors/palette-gradient.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/pages/app-contacts.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/plugins/forms/switch.min.css')}}">
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style-rtl.css">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/colors/palette-gradient.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/app-contacts.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/plugins/forms/switch.min.css')}}">
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    @endif




@endsection
@section("main")

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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="container">
                                            <div class="divider"></div>
                                            <div class="divider"></div>
                                            <div id="horizontal-card" class="section">
                                                <div class="row">
                                                    <div class="form-group col col-sm-12 con-md-12">
                                                        <label for="navs">نقش ها</label>
                                                        <select class="form-control" id="navs" name="navs">
                                                            <option value="" disabled selected>Select Main Navigation</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->name}}">{{$role->name}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="row">


                                                    <div class="col col-sm-12 m9">
                                                        <div class="row">
                                                            <div class="card-panel" id="items">


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                    </div>
                                    <div class="media-body media-middle">
                                        <h5 class="media-heading">
                                            {{--                                            {{$page_title}}--}}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="lead">اطلاعات:</p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                    <span class="badge badge-primary badge-pill float-right">
{{--                                        {{count($datas)}}--}}
                                    </span>
                                        <a href="#">
                                            تعداد آیتم ها
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--/ Groups-->

                            <!--More-->
                            <div class="card-body ">
                                <p class="lead">عملیات:</p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="#" id="permission-clear-cache">
                                            بروز رسانی سطح دسترسی ها
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body ">
                                <p class="lead">فیلتر ها:</p>
                                <ul class="list-group">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





































@endsection
@section('vendor-js')

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin-assets/vendors/js/tables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/extensions/jquery.raty.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{asset('admin-assets/vendors/js/forms/toggle/switchery.min.js')}}"></script>

@endsection

@section("footer")

    <script src="{{asset('admin-assets/js/scripts/pages/app-contacts.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/forms/switch.min.js')}}"></script>

    <script>

        $(document).ready(function () {

//            $('select').formSelect();

            function loadNavs(id) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('permissions.ajax.get') }}",
                    method: 'post',
                    data: {
                        id: id
                    },
                    success: function (result) {
                        $('#items').html(result.message);
                    },
                    error: function (result) {
                        alert("error");
                    }
                });

            }


            $('#navs').change(function () {

                loadNavs($(this).val());
            });

            $("#type").change(function () {


                var type = $(this).val();
                if (type == 'url') {
                    $("#url-container").prop('hidden', false);
                    $("#page-container").prop('hidden', true);
                    return;

                } else if (type == 'page') {
                    $("#url-container").prop('hidden', true);
                    $("#page-container").prop('hidden', false);
                }

//                alert("sdad");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('navigation.routes.get') }}",
                    method: 'post',
                    data: {
                        type: $(this).val()
                    },
                    success: function (result) {

//                        alert(result.message.length);

                        var oo = result.message;

                        for (i = 0; i < oo.length; i++) {
                            var o = new Option(oo[i], oo[i]);
                            $(o).html(oo[i]);
                            $('#route').append(o);
                        }


//                        $('#route').html(result.message);
//                        alert(result.message);

                    },
                    error: function (result) {
                        alert("error");

                    }
                });

            });


            $("#items").on('change', '[id^=perm-]', function () {


                var s = $(this).attr('id');
                var ss = s.split('-');
                var did;
                if (ss.length == 2) {

                    did = ss[ss.length - 1];

                } else {
                    ss.shift();
                    did = ss.join('-');
                }

//                alert(did + "has " + $(this).prop('checked'));
//                return;


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('permissions.change') }}",
                    method: 'post',
                    data: {
                        id: did,
                        role: $("#navs").val(),
                        value: $(this).prop('checked') == true ? 1 : 0
                    },
                    success: function (result) {
//                        alert(result.message);
                    }
                    ,
                    error: function (result) {
                        $(this).prop('checked', !$(this).prop('checked'));
                        alert(result.status);
                    }
                });


            });


            $("#submit").click(function (e) {
                e.preventDefault();

                if ($('#navs').val() == "") {
                    alert("ابتدا یکی از منو ها را از بالا انتخاب نمایید");
                    return;
                }

                if ($("#type").val() == "") {
                    alert("اطلاعات را پر گنید");
                    return;
                }

                if ($("#title").val().trim() == "" || $("#title-en").val().trim() == "" || $("#title-ar").val().trim() == "") {
                    alert("عنوان های همه زبان ها را پر نمایید");
                    return;
                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/admin/navigation/store') }}",
                    method: 'post',
                    data: {
                        type: $("#type").val(),
                        title: $("#title").val(),
                        title_en: $("#title-en").val(),
                        title_ar: $("#title-ar").val(),
                        url: $("#url").val(),
                        page: $("#pages").val(),
                        navigation: $('#navs').val()
                    },
                    success: function (result) {
                        loadNavs($('#navs').val());
//                        alert(result.message);
                    }
                    ,
                    error: function (result) {
                        alert(result.status);
                    }
                });


            });

//            $("[id^=enabled-]").change(function () {
//
//                alert($(this).attr('id'));

            {{--var s = $(this).attr('id');--}}
            {{--var ss = s.split('-');--}}

            {{--var did = ss[ss.length - 1];--}}


            {{--$.ajaxSetup({--}}
            {{--headers: {--}}
            {{--'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
            {{--}--}}
            {{--});--}}

            {{--//                alert($(this).prop('checked') == true ? 1 : 0);--}}
            {{--$.ajax({--}}
            {{--url: "{{ url('/admin/data/ajax/change_property') }}",--}}
            {{--method: 'post',--}}
            {{--data: {--}}
            {{--id: did,--}}
            {{--key: 'available',--}}
            {{--value: $(this).prop('checked') == true ? 1 : 0--}}
            {{--},--}}
            {{--success: function (result) {--}}
            {{--alert(result.message);--}}

            {{--//                        $('#container-' + did).hide('normal', function () {--}}
            {{--//                            $('#container-' + did).remove();--}}
            {{--//                        });--}}
            {{--}--}}
            {{--,--}}
            {{--error: function (result) {--}}
            {{--alert(result.status);--}}

            {{--}--}}
            {{--});--}}
            //            });


        });


        $("#permission-clear-cache").click(function (e) {
            e.preventDefault();





        });

    </script>





@endsection