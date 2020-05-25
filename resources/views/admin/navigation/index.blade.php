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
    <link href="{{asset('admin-assets/vendors/jquery.nestable2/1/jquery.nestable.css')}}" type="text/css" rel="stylesheet">

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
                                                            @foreach($navs as $nav)
                                                                <option value="{{$nav->id}}">{{$nav->title}}</option>
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
                            {{--                            <div class="card-body">--}}
                            {{--                                <p class="lead">اطلاعات:</p>--}}
                            {{--                                <ul class="list-group">--}}
                            {{--                                    <li class="list-group-item">--}}
                            {{--                                    <span class="badge badge-primary badge-pill float-right">--}}
                            {{--                                        {{count($datas)}}--}}
                            {{--                                    </span>--}}
                            {{--                                        <a href="#">--}}
                            {{--                                            تعداد آیتم ها--}}
                            {{--                                        </a>--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            <div class="card-body ">
                                <p class="lead">ثبت منو</p>

                                <div class="row">
                                    <form class="col col-sm-12"
                                          action="{{route("navigation.store")}}"
                                          method="post">
                                        {{@csrf_field()}}
                                        <div class="row">
                                            <div class="form-group col col-sm-12">
                                                <label for="type">TYPE:</label>
                                                <select class="form-control" id="type" name="type">
                                                    <option value="" disabled selected>انتخاب نوع</option>
                                                    {{--<option value="routes">routes</option>--}}
                                                    {{--                                                    <option value="pages" disabled>pages</option>--}}
                                                    <option value="url">url</option>
                                                    <option value="news">news</option>
                                                    <option value="rooms">rooms</option>
                                                    <option value="pages">pages</option>
                                                </select>

                                            </div>


                                            <div id="routes-container" class="form-group col col-sm-12" hidden>
                                                <label for="route">ROUTE:</label>
                                                <select class="form-control" id="route" name="route">
                                                    <option value="" disabled selected>Select Route</option>
                                                </select>
                                            </div>

                                            <div id="pages-container" class="form-group col col-sm-12" hidden>
                                                <label for="pages">برگه ها:</label>
                                                <select class="form-control" id="pages" name="pages">
                                                    <option value="" disabled selected>انتخاب برگه</option>
                                                    @foreach($pages as $page)
                                                        <option value="{{$page->id}}">{{$page->properties['title']->value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div id="news-container" class="form-group col col-sm-12">

                                                <label for="news">اخبار:</label>
                                                <select class="form-control" id="news" name="news">
                                                    <option value="" disabled selected>انتخاب خبر</option>
                                                    <option value="all">تمامی اخبار</option>
                                                    <option value="filter">ایجاد فیلتر</option>
                                                    <optgroup title="انتخاب خبر" label="انتخاب خبر">
                                                        @foreach($news as $new)
                                                            <option value="{{$new->id}}">{{$new->properties['title']->value}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                <br>
                                                {{--                                                <div id="news-create-filters" class="form-group" hidden>--}}
                                                {{--                                                    --}}
                                                {{--                                                </div>--}}
                                                <div id="news-filters" class="form-group" hidden>
                                                    <label for="news-filters">فیلتر ها:</label>
                                                    <br>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#mdl-filters-creator" data-backdrop="true"
                                                       onclick="selected_properties= news_properties;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <br>
                                                    <input class="form-control" id="txt-news-filters" name="txt-news-filters" type="text">
                                                </div>

                                            </div>


                                            <div id="rooms-container" class="form-group col col-sm-12" hidden>
                                                <label for="rooms">اتاق ها:</label>
                                                <select class="form-control" id="rooms" name="rooms">
                                                    <option value="" disabled selected>انتخاب اتاق</option>
                                                    @foreach($rooms as $room)
                                                        <option value="{{$room->id}}">{{$room->properties['title']->value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div id="url-container" class="form-group col col-sm-12" hidden>
                                                <label for="url">لینک:</label>
                                                <input class="form-control" id="url" name="url" type="url">
                                            </div>


                                            <div class="col col-md-12">
                                                <h4 class="form-section"></h4>
                                            </div>


                                            <div class="form-group col col-sm-12">
                                                <label for="title">{{ __('messages.input_titles')['title']}} (فارسی)</label>
                                                <input class="form-control" id="title" name="title"
                                                       type="text">
                                            </div>

                                            <div class="form-group col col-sm-12">
                                                <label for="title-en">{{ __('messages.input_titles')['title']}} (انگلیسی)</label>
                                                <input class="form-control" id="title-en" name="title-en"
                                                       type="text">
                                            </div>

                                            <div class="form-group col col-sm-12">
                                                <label for="title-ar">{{ __('messages.input_titles')['title']}} (عربی)</label>
                                                <input class="form-control" id="title-ar" name="title-ar"
                                                       type="text">
                                            </div>

                                            <div class="col col-md-12">
                                                <h4 class="form-section"></h4>
                                            </div>

                                            <div class="form-group col col-sm-12">
                                                <button class="btn cyan waves-effect waves-light right form-control"
                                                        type="button"
                                                        id="submit" disabled
                                                        name="submit">
                                                    {{ __('messages.input_titles')['submit']}}
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>


                            </div>

                            <!--/ Groups-->

                            <!--More-->
                            <div class="card-body ">
                                <p class="lead">عملیات:</p>
                                <ul class="list-group">
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

    @include('admin.components.mdl-filters-creator')
    @include('admin.components.mdl-category-selector')

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

    <script src="{{asset('admin-assets/vendors/jquery.nestable2/1/jquery.nestable2.js')}}"></script>
@endsection

@section("footer")

    <script src="{{asset('admin-assets/js/scripts/pages/app-contacts.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/forms/switch.min.js')}}"></script>

    <script src="{{asset('admin-assets/js/mine/nestable.selector.js')}}"></script>


    <script src="{{asset('admin-assets/js/mine/filters-creator.js')}}"></script>




    <script>
        var selected_properties = '';
        var news_properties = @JSON($news_properties);
        var base_locale = '{{App::getLocale()}}';
        @php($filter_operators= config('filter.operators'))
        var filter_operators = @JSON($filter_operators);
        @php($input_type_filter_operators=config('filter.input_type_operators'))
        var input_type_filter_operators =@JSON($input_type_filter_operators);
        @php($filter_operators_locale=__('messages.filter_operators'))
        var filter_operators_locale=@JSON($filter_operators_locale);
    </script>

    @foreach($news_properties as $property)
        @if($property->input_type == 'nestable')

            <script>
                NESTABLE_ACTION.init({'nestable': "#nestable3", 'url_update': "{{$property->url}}"});
            </script>

            <script>
                var lastId = 0;
                $(document).ready(function () {
                    var obj = '{{$property->values}}';
                    var obj = obj.replace(/&quot;/g, '\"');
                    var output = '';

                    function buildItem(item) {

                        lastId = Math.max(item.id, lastId);

                        $ttles = item.title.split(',');
                        $title_to_print = '';
                        $.each($ttles, function (indx, val) {
                            $ttl = val.split(':');
                            if ($ttl[0] == base_locale) {
                                $title_to_print = $ttl[1];
                            }
                        });

                        var html = "<li class='dd-item dd3-item' data-id='" + item.id + "' data-title='" + item.title + "'>";
                        html += "<div class='dd-handle dd3-handle'></div>";
                        html += `<div class="dd3-content" name="1"><div class="row"><div class="col col-md-1"><a href="#" class="delete-item"><i class="fa fa-remove"></i></a></div><div class="col col-md-1"><a href="#" data-toggle="modal" data-target="#mdl-edit-category" data-backdrop="true" class="edit-item"><i class="fa fa-edit"></i></a></div><div class="col col-md-1"><a href="#" data-toggle="modal" data-target="#mdl-add-category" data-backdrop="true"class="add-item"><i class="fa fa-plus"></i></a></div><div class="col col-md-9 item" style="text-align: left">${$title_to_print}</div></div></div>`;

                        if (item.children) {

                            html += "<ol class='dd-list outer'>";
                            $.each(item.children, function (index, sub) {
                                html += buildItem(sub);
                            });
                            html += "</ol>";

                        }

                        html += "</li>";

                        return html;
                    }

                    $.each(JSON.parse(obj), function (index, item) {
                        output += buildItem(item);
                    });

                    $('#nestable3 > .dd-list.dd3-list').html(output);
                    $('#nestable3').nestable();
                });
            </script>
        @endif
    @endforeach






    <script>

        $(document).ready(function () {
            function loadNavs(id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('navigation.get') }}",
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
                if ($(this).val() != "") {
                    $("#submit").prop('disabled', false);
                } else {
                    $("#submit").prop('disabled', true);
                }
            });

            $("#type").change(function () {
                var type = $(this).val();

                if (type === 'url') {
                    $("#url-container").prop('hidden', false);
                    $("#pages-container").prop('hidden', true);
                    $("#routes-container").prop('hidden', true);
                    $("#news-container").prop('hidden', true);
                    $("#rooms-container").prop('hidden', true);
                } else if (type === 'pages') {
                    $("#url-container").prop('hidden', true);
                    $("#pages-container").prop('hidden', false);
                    $("#routes-container").prop('hidden', true);
                    $("#news-container").prop('hidden', true);
                    $("#rooms-container").prop('hidden', true);
                } else if (type === 'news') {
                    $("#url-container").prop('hidden', true);
                    $("#pages-container").prop('hidden', true);
                    $("#routes-container").prop('hidden', true);
                    $("#news-container").prop('hidden', false);
                    $("#rooms-container").prop('hidden', true);
                } else if (type === 'rooms') {
                    $("#url-container").prop('hidden', true);
                    $("#pages-container").prop('hidden', true);
                    $("#routes-container").prop('hidden', true);
                    $("#news-container").prop('hidden', true);
                    $("#rooms-container").prop('hidden', false);
                }

                $("#submit").prop('disabled', false);

            });

            $("#news").change(function (e) {

                if ($(this).val() === 'filter') {

                    $('#news-create-filters').prop('hidden', false);
                    $('#news-filters').prop('hidden', false);

                } else {

                    $('#news-create-filters').prop('hidden', true);
                    $('#news-filters').prop('hidden', true);

                }

            });

            $("#items").on('change', '[id^=enabled-]', function () {

                var item = $(this);
//                alert($(this).attr('id'));
                var s = $(this).attr('id');
                var ss = s.split('-');
                var did = ss[ss.length - 1];
//                alert(did);
//                return;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('navigation.change') }}",
                    method: 'post',
                    data: {
                        id: did,
                        key: 'enabled',
                        value: item.prop('checked') == true ? 1 : 0
                    },
                    success: function (result) {

                        if (result.error == 1) {
                            item.prop('checked', !item.prop('checked'));
                            alert('ابتدا یکی از گزینه ها باید غیر فعل شود تا این گزینه فعال شود');
                        } else {

                            alert(result.message);
                        }

                    },
                    error: function (result) {
                        item.prop('checked', !item.prop('checked'));
                        alert(result.status);
                    }
                });
            });


            $("#items").on('click', '[id^=delete-]', function () {

                if (confirm("Are you sure?")) {

                    var s = $(this).attr('id');
                    var ss = s.split('-');
                    var did = ss[ss.length - 1];
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('/admin/navigation/destroy') }}",
                        method: 'post',
                        data: {
                            id: did
                        },
                        success: function (result) {
//                        alert(result.message);
                            loadNavs($('#navs').val());
                        }
                        ,
                        error: function (result) {
                            alert(result.status);
                        }
                    });


                }
                return false;

            });


            $("#submit").click(function (e) {
                e.preventDefault();

                // alert($("#news").val());
                // return;

                if ($('#navs').val() == "" || $('#navs').val() == null) {
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

                if ($("#type").val() == "url" && $("#url").val().trim() == "") {
                    alert("لینک را پر نمایید");
                    return;
                }

                if ($("#type").val() == "news" && ($("#news").val() == "" || $("#news").val() == null)) {
                    alert("خبر را انتخاب نمایید");
                    return;
                }

                if ($("#type").val() == "rooms" && ($("#rooms").val() == "" || $("#rooms").val() == null)) {
                    alert("اتاق را انتخاب نمایید");
                    return;
                }

                if ($("#type").val() == "pages" && ($("#pages").val() == "" || $("#pages").val() == null)) {
                    alert("برگه را انتخاب نمایید");
                    return;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                // alert($("#txt-news-filters").val());

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
                        news: $("#news").val(),
                        filters: $("#txt-news-filters").val(),
                        room: $("#rooms").val(),
                        navigation: $('#navs').val()
                    },
                    success: function (result) {
                        loadNavs($('#navs').val());
                       // alert(result.message);
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


    </script>





@endsection