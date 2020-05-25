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
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="level">{{ __('messages.input_titles')['level']}}</label>
                                                            <select class="form-control" id="level" name="level">
                                                                <option value="" disabled selected>{{ __('messages.input_titles')['level']}}</option>
                                                                @foreach(trans('messages.levels') as $k=>$v)
                                                                    <option value="{{$k}}">{{$v}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="input_type">{{ __('messages.input_titles')['input_type']}}</label>
                                                            <select class="form-control" id="input_type" name="input_type">
                                                                <option value="" disabled selected>{{ __('messages.input_titles')['input_type']}}</option>
                                                                @foreach(trans('messages.input_types') as $k=>$v)
                                                                    <option value="{{$k}}">{{$v}}</option>
                                                                @endforeach

                                                            </select>
                                                            <div class="input-field col s12 m12" id="default_value_col">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="col-md-12 col-sm-12">
                                                            <p style="text-align: right;">قوانین تاییدیه</p>
                                                            <label>
                                                                <input id="required" name="" type="checkbox" class="filled-in"/>
                                                                <span>الزامی</span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12">
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

    <script>

        $(document).ready(function () {

            $("#values").on('click', 'button.button', function () {
                $(this).parent().parent().remove();
            });

            $('#input_type').change(function () {

                if ($(this).val() === 'text') {

                    $('#default_value_col').html('<i class="material-icons prefix">keyboard</i><input id="default_value" name="default_value" type="text"><label for="default_value">مقدار پیش فرض</label>');

                } else if ($(this).val() === 'check') {

                    $('#default_value_col').html('<i class="material-icons prefix">keyboard</i><label><input id="default_value" name="default_value" type="checkbox" class="filled-in" checked="checked" /><span>مقدار پیش فرض</span></label>');
                } else if ($(this).val() === 'select') {

                    $('#default_value_col').html('<a href="#" id="add_value"><i class="material-icons">add_box</i> </a><table><thead><tr><th>مقدار</th><th>پیش فرض</th><th>حذف</th></tr></thead><tbody></tbody></table>');

                }

            });

            var default_col = $('#default_value_col');
            default_col.on('click', '#add_value', function (e) {

                e.preventDefault();
                swal("مقدار را وارد نمایید:", {
                    content: "input",
                }).then((value) => {
                    if (value === false) return false;
                    if (value === "") {
                        swal("You need to write something!", "", "error");
                        return false;
                    }
                    if (value != null) {

                        $('#default_value_col table tbody').append(`<tr><td>${value}</td><td><a href="#" class="value_make_default"><i class="material-icons"> panorama_fish_eye</i></a></td><td><a href="#" class="value_remove"><i class="material-icons"> delete</i><input type="hidden"  name="values[]" value="${value}"> </a></td></tr>`);
                    }
                    // swal(`You typed: ${value}`);
                });

            });


            default_col.on('click', '.value_make_default', function (e) {
                e.preventDefault();
                $('#default_value_col table tbody tr').each(function () {
                    $('.value_make_default > i', this).html('panorama_fish_eye');
                });
                $('i', this).html('check');
            });

            default_col.on('click', '.value_remove', function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();

            });


            $('.locales').on('click', 'a', function () {

                var clicked = $('span', this);
                if (clicked.hasClass('flag-icon-grayed') === true) {
                    clicked.removeClass('flag-icon-grayed');
                    $(this).parent().parent().find('input[type=text]').val($('input[type=hidden]', this).val());

                    $(".locales a span").each(function () {
                        if (!$(this).is(clicked)) {
                            $(this).addClass('flag-icon-grayed');
                        }
                    });
                }
                M.updateTextFields();

            });

            $('input[type=text]').change(function () {
                var clicked = $(this);
                $(this).parent().find(".locales a span").each(function () {
                    if (!$(this).hasClass('flag-icon-grayed')) {
                        $(this).parent().find('input[type=hidden]').val(clicked.val());
                    }
                });
            });


        });


    </script>


@endsection