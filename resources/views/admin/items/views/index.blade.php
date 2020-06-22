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
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/icheck/icheck.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/extensions/sweetalert.css')}}">

    @yield('sub-vendor-css')

@endsection
@section("header")

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/colors/palette-gradient.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/pages/app-contacts.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/plugins/forms/switch.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style-rtl.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/colors/palette-gradient.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/app-contacts.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/plugins/forms/switch.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style.css')}}">
    @endif

    @yield('sub-header')


@endsection
@section("main")

    @yield('sub-main')

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
    <script src="{{asset('admin-assets/vendors/js/extensions/sweetalert.min.js')}}"></script>


    @yield('sub-vendor-js')



{{--    --}}{{--        <script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
{{--    <script src="{{asset('vendors/vue/dist/vue.js')}}"></script>--}}
{{--    --}}{{--        <script src="https://cdn.jsdelivr.net/npm/moment"></script>--}}
{{--    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>--}}
{{--    <script src="{{asset('vendors/moment-jalaali/build/moment-jalaali.js')}}"></script>--}}
{{--    <script src="{{asset('vendors/vue-persian-datetime-picker-master/dist/vue-persian-datetime-picker-browser.js')}}"></script>--}}


@endsection

@section("footer")

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin-assets/js/scripts/pages/app-contacts.js')}}"></script>
    <!-- END: Page JS-->

    <script src="{{asset('admin-assets/js/scripts/forms/switch.min.js')}}"></script>

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
                                $('#card-' + did).remove();
                                th.parent().parent().remove();
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
