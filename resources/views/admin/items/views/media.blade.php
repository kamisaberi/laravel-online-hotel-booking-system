@extends("admin.layouts.admin")
@section('vendor-css')

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors-rtl.min.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
    @endif


    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/extensions/sweetalert.css')}}">

    @yield('sub-vendor-css')

@endsection
@section("header")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/colors/palette-gradient.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/pages/gallery.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style-rtl.css">
        <!-- END: Custom CSS-->
    @else
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/colors/palette-gradient.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/gallery.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
        <!-- END: Custom CSS-->

    @endif


    @yield('sub-header')


@endsection
@section("main")

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            @include('admin.layouts.widgets.breadcrumbs', ['page_title'=>$page_title , 'breadcrumbs'=> $breadcrumbs])
            <div class="content-body">
                <section id="hover-effects" class="card">
                    <div class="card-content collapse show">
                        <div class="card-body my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                            <div class="grid-hover row">
                                @foreach($datas as $data)
                                    @if(isset($widgets))
                                        @include($widgets, ['data'=>$data])
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->


@endsection
@section('vendor-js')


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin-assets/vendors/js/extensions/sweetalert.min.js')}}"></script>
    <!-- END: Page Vendor JS-->


    @yield('sub-vendor-js')



    {{--        <script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
    <script src="{{asset('vendors/vue/dist/vue.js')}}"></script>
    {{--        <script src="https://cdn.jsdelivr.net/npm/moment"></script>--}}
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('vendors/moment-jalaali/build/moment-jalaali.js')}}"></script>
    <script src="{{asset('vendors/vue-persian-datetime-picker-master/dist/vue-persian-datetime-picker-browser.js')}}"></script>


@endsection

@section("footer")


    @yield('sub-footer')

    <script>


        $('#mdl-reserve-actions').on('show.bs.modal', function (e) {


            var action_titles = {2: 'عدم تایید اتاق', 3: 'تایید اتاق', 6: 'عدم تایید فیش بانکی', 7: 'تایید فیش بانکی'};

            // alert("sdaasdasd");
            var url = $('input[name=mdl-download-info-url]', this).val();
            var actions = $('input[name=mdl-actions]', this).val();
            var modalbody = $('.modal-body', this);
            var modalfooter = $('.modal-footer', this);
            // alert(url);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                method: 'get',
                data: {},
                success: function (result) {

                    console.log(result);

                    var groups = result.message.groups;

                    modalbody.html("");
                    modalfooter.html("");

                    $.each(groups, function (index, group) {

                        modalbody.append("<div class='row'>");
                        $.each(group, function (index, value) {

                            modalbody.append("<div class='col col-md-12'>");
                            modalbody.append((value.locales['fa'] === undefined ? value.title : value.locales['fa']) + ":");
                            if (value.input_type === 'date') {
                                // modalbody.append(moment.unix(value.assigned / 1000).format('jYYYY/jMM/jDD'));
                                modalbody.append(value.assigned['ja']);
                            } else if (value.input_type === 'data:room') {
                                modalbody.append(value.assigned.title.value);
                            } else if (value.input_type === 'documents:check') {
                                modalbody.append(`<img width="400" src="${value.assigned}">`);
                            }
                            modalbody.append("</div>");
                        });

                        modalbody.append("</div>");
                    });

                    // alert(actions);
                    var actns = actions.split(',');
                    // var actns = JSON.parse(actions);
                    var style = "";
                    var action_values = [];
                    $.each(actns, function (index, value) {

                        var ss = value.split(':');
                        if (ss[0] === 'name') {

                            var result = ss[1].match(/\[(.*)\]/);
                            action_values = result[1].split("|");

                        } else if (ss[0] === 'action_style') {

                            style = ss[1];
                        }
                    });

                    if (style === "buttons") {
                        $.each(action_values, function (index, value) {
                            modalfooter.append(`<button type="button" data-content="${value}" class="btn btn-primary">${action_titles[value]}</button>`);
                        });
                    }

                },
                error: function (result) {
                    alert(result.status);
                }
            });


        });

        $('#mdl-reserve-actions .modal-footer').on('click', 'button', function (e) {


            var url = $('#mdl-reserve-actions input[name=mdl-update-url]').val();
            var value = $(this).attr('data-content');

            // alert(url + "   -----   " + value);
            // return;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                method: 'post',
                data: {
                    part_update: true,
                    situation: value,
                },
                success: function (result) {
                    swal("انجام شد");
                    $("#mdl-reserve-actions").modal('hide');

                },
                error: function (result) {
                    swal(result.status);
                }
            });


        });

    </script>

    @isset($modals)

        @foreach($modals as $modal)

            <script>

                $('#mdl-{{$modal->title}} form').submit(function (e) {

                    // return;

                    e.preventDefault();
                    // alert("sasdsad");
                    // return;


                    var submit = $('button[type="submit"]', this);
                    submit.html('در حال ارسال');
                    submit.prop('disabled', true);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: $(this).attr('action'),
                        method: $(this).attr('method'),
                        data: $(this).serialize(),
                        success: function (result) {
                            if ($.isEmptyObject(result.error)) {

                                submit.html('پایان');
                                submit.prop('disabled', false);
                                alert("ثبت شد");
                                //                        alert(result.success);
                                {{--window.location = "{{$urls['index']}}";--}}

                            } else {
                                //                        alert(result.error);

                                submit.html('ذخیره');
                                submit.prop('disabled', false);


                                $(".print-error-msg").find("ul").html('');
                                $(".print-error-msg").css('display', 'block');
                                $.each(result.error, function (key, value) {
                                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                                });
                            }


                        },
                        error: function (result) {
                            alert(result.status);

                        }
                    });

                });


            </script>



            @foreach($modal->properties as $group)
                @foreach($group as $property)

                    @if($property->input_type == 'dates')
                        <script>

                            var tbody_{{str_replace('-','_',$property->title)}}  = $('#mdl-{{$property->title}}').find('tbody');
                            $('#mdl-{{$modal->title}}').on('show.bs.modal', function (e) {
                                $('#mdl-{{$modal->title}}').find('tbody').html('');
                                var vl = $('input[type=hidden]', this).val();
                                if (vl.trim() == '' || vl.trim() == '0' || vl.trim() == '-')
                                    return;

                                var arr = vl.trim().split('|');

                                var assigned = arr[0].trim().split('==')[1];
                                var action = arr[1].trim().split('==')[1];
                                var display_history_at_modal = arr[2].trim().split('==')[1];

                                if (display_history_at_modal == 1) {
                                    if (assigned.trim() != '' && assigned.trim() != '0' && assigned.trim() != '-') {

                                        var arr2 = assigned.split(',');
                                        for (i = 0; i < arr2.length; i++) {

                                            var ii = `<input type="hidden" name="{{$property->title}}[]" value="${arr2[i]}">`;
                                            $('#mdl-{{$modal->title}}').find('tbody').append(`<tr>${ii}<td>${arr2[i]}</td><td><a href="#" class="danger"><i class="ft-delete"></i></a></td></tr>`);
                                        }
                                    }

                                }


                                var form = $('form', this);
                                if (form.attr('action').trim() == '') {
                                    form.attr('action', action);
                                }

                            });


                            var start_date_{{str_replace('-','_',$property->title)}} = new Vue({
                                el: '#start-date-{{$property->title}}',
                                data: {
                                    date: moment().format('jYYYY/jMM/jDD'),
                                    today: moment().format('jYYYY/jMM/jDD'),
                                },
                                components: {
                                    DatePicker: VuePersianDatetimePicker
                                },
                                methods: {
                                    onChange(picker) {
                                        end_date_{{str_replace('-','_',$property->title)}}.date = picker;
                                        end_date_{{str_replace('-','_',$property->title)}}.min = moment(picker).format('jYYYY/jMM/jDD');
                                        end_date_{{str_replace('-','_',$property->title)}}.disabled = false;
                                        end_date_{{str_replace('-','_',$property->title)}}.update();
                                    }
                                }
                            });


                            var end_date_{{str_replace('-','_',$property->title)}} = new Vue({
                                el: '#end-date-{{$property->title}}',
                                data: {
                                    date: moment().format('jYYYY/jMM/jDD'),
                                    today: moment().format('jYYYY/jMM/jDD'),
                                    disabled: true,
                                },
                                components: {
                                    DatePicker: VuePersianDatetimePicker
                                },
                                methods: {
                                    onChange1(picker) {
                                        // alert(picker.value);
                                    }
                                }
                            });


                            $("#btn-add-range-{{$property->title}}").click(function () {

                                var st = start_date_{{str_replace('-','_',$property->title)}}.date;
                                var en = end_date_{{str_replace('-','_',$property->title)}}.date;
                                // alert(st + ":" + en);
                                var s = '';
                                if (st.trim() == en.trim()) {
                                    s = st;
                                } else {
                                    s = st + ":" + en;
                                }

                                var i = `<input type="hidden" name="{{$property->title}}[]" value="${s}">`;
                                $('#mdl-{{$modal->title}} tbody').append(`<tr>${i}<td>${s}</td><td><a href="#" class="danger"><i class="ft-delete"></i></a></td></tr>`);

                            });

                            $("#btn-add-weekday-{{$property->title}}").click(function () {
                                var to_add = $(this).parent().parent().find('select[name=weekdays]').val();
                                if (to_add == null)
                                    return;

                                var i = `<input type="hidden" name="{{$property->title}}[]" value="${to_add}">`;
                                $('#mdl-{{$modal->title}} tbody').append(`<tr>${i}<td>${to_add}</td><td><a href="#" class="danger"><i class="ft-delete"></i></a></td></tr>`);
                            });


                            $('#mdl-{{$modal->title}}').on('click', 'a i.ft-delete', function () {

                                $(this).parent().parent().parent().remove();

                            });

                        </script>

                    @endif
                @endforeach
            @endforeach
        @endforeach



    @endisset



    @can($permissions['destroy'])
        @isset($urls['destroy'])

            <script>

                $("[id^=del-]").click(function (e) {
                    e.preventDefault();

                    var th = $(this);
//                alert($(this).attr('id'));
//                return;

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
                            url: "{{ $urls['destroy'] }}",
                            method: 'post',
                            data: {
                                id: did
                            },
                            success: function (result) {
//                        alert(result.message);

                                $('#card-' + did).remove();
                                th.parent().parent().remove();
                                // $('#container-' + did).hide('normal', function () {
                                //     $('#container-' + did).remove();
                                // });
                            },
                            error: function (result) {
                                alert("error");

                            }
                        });
                    }
                });

            </script>
        @endisset
    @endcan

    {{--    <script>--}}
    {{--        $("form").submit(function (e) {--}}
    {{--            var form = this;--}}
    {{--            e.preventDefault();--}}

    {{--            var submit = $('button[type="submit"]', this);--}}
    {{--            submit.html('در حال ارسال');--}}
    {{--            submit.prop('disabled', true);--}}

    {{--            $.ajaxSetup({--}}
    {{--                headers: {--}}
    {{--                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
    {{--                }--}}
    {{--            });--}}
    {{--            $.ajax({--}}
    {{--                url: $(this).attr('action'),--}}
    {{--                method: $(this).attr('method'),--}}
    {{--                data: $(this).serialize(),--}}
    {{--                success: function (result) {--}}
    {{--                    if ($.isEmptyObject(result.error)) {--}}

    {{--                        submit.html('پایان');--}}
    {{--                        submit.prop('disabled', false);--}}
    {{--//                        alert(result.success);--}}
    {{--                        window.location = "{{$urls['index']}}";--}}

    {{--                    } else {--}}
    {{--//                        alert(result.error);--}}

    {{--                        submit.html('ذخیره');--}}
    {{--                        submit.prop('disabled', false);--}}


    {{--                        $(".print-error-msg").find("ul").html('');--}}
    {{--                        $(".print-error-msg").css('display', 'block');--}}
    {{--                        $.each(result.error, function (key, value) {--}}
    {{--                            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');--}}
    {{--                        });--}}
    {{--                    }--}}


    {{--                },--}}
    {{--                error: function (result) {--}}
    {{--                    alert(result.status);--}}

    {{--                }--}}
    {{--            });--}}

    {{--        });--}}


    {{--    </script>--}}



    @if($type == 'hotel' or  $type == 'website')
        @foreach($datas as $data)
            @foreach($data->properties as $property)

                @if($property->input_type == 'multi-text')
                    <script>
                        $("#btn-add-multi-text-{{$property->title}}").click(function () {

                            var txt = $("#txt-add-multi-text-{{$property->title}}");
                            var dv = $("#dv-multi-text-{{$property->title}}");

                            if (txt.val().trim() == '')
                                return;

                            var s = "";
                            s += '<div class="row" style="border: 1px dotted red;margin-bottom: 3px; ">';
                            s += '<input type="hidden" id="{{$property->title}}[]" name="{{$property->title}}[]" value="' + txt.val().trim() + '">';
                            s += '<div class="input-field col s12 m2">';
                            s += '</div>';
                            s += '<div class="input-field col s12 m6">';
                            s += txt.val();
                            s += '</div>';
                            s += '<div class="input-field col s12 m2">';
                            s += '<button type="button" class="btn button-delete">';
                            s += 'X';
                            s += '</button>';
                            s += '</div>';
                            s += '</div>';

                            dv.append(s);
                        });

                        $("#dv-multi-text-{{$property->title}}").on('click', '.button-delete', function () {
                            $(this).parent().parent().remove();
                        });

                    </script>
                @endif
            @endforeach
        @endforeach
    @endif




    <script>


        $(document).ready(function () {


            {{--$("#btn-add-multi-text-{{$property->title}}").click(function () {--}}
            {{--alert("asdasd");--}}
            {{--});--}}


            $("[id^=active-]").change(function () {

//                alert($(this).attr('id'));

                var s = $(this).attr('id');
                var ss = s.split('-');

                var did = ss[ss.length - 1];


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

//                alert($(this).prop('checked') == true ? 1 : 0);
                $.ajax({
                    {{--url: "{{ url('/admin/data/ajax/change_property') }}",--}}
                    url: "{{ route('items.change', ['type'=>$type])}}",
                    method: 'post',
                    data: {
                        id: did,
                        key: 'available',
                        value: $(this).prop('checked') == true ? 1 : 0
                    },
                    success: function (result) {
                        alert(result.message);

//                        $('#container-' + did).hide('normal', function () {
//                            $('#container-' + did).remove();
//                        });
                    }
                    ,
                    error: function (result) {
                        alert(result.status);

                    }
                });
            });
        });

    </script>



@endsection