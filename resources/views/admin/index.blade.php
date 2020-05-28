@extends("admin.layouts.admin")

@section('vendor-css')


    @include('admin.layouts.subviews.modern_dashboard.vendor-css')

@endsection


@section("header")

    @include('admin.layouts.subviews.modern_dashboard.header')

@endsection

@section("main")
    @include('admin.layouts.subviews.modern_dashboard.main')


    @include('admin.components.modal-reserve-action')

@endsection

@section('vendor-js')


    @include('admin.layouts.subviews.modern_dashboard.vendor-js')


    {{--        <script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
    <script src="{{asset('vendors/vue/dist/vue.js')}}"></script>
    {{--        <script src="https://cdn.jsdelivr.net/npm/moment"></script>--}}
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('vendors/moment-jalaali/build/moment-jalaali.js')}}"></script>
    <script src="{{asset('vendors/vue-persian-datetime-picker-master/dist/vue-persian-datetime-picker-browser.js')}}"></script>

@endsection


@section("footer")

    @include('admin.layouts.subviews.modern_dashboard.footer')



    <script>

        $(document).ready(function () {

            $("#waiting-reserves-list").on("click", ".button", function () {
                var service_id = $(this).attr("data-id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('services.get', ['type'=>'reserve']) }}",
                    method: 'post',
                    data: {
                        service_id: service_id
                    },
                    success: function (result) {
                        var service = result.message;
                        var tbl_reserve_info = $("#tbl-reserve-info");
                        var s = "<tr><th>کد رهگیری</th><th>تاریخ ورود</th><th>تاریخ خروج</th></tr>";
                        s += "<tr><td>" + service.properties['code'].title + "</td>";
                        s += "<td>" + service.properties['ja-start-date'].title + "<br>" + service.properties['gr-start-date'].title + "</td>";
                        s += "<td>" + service.properties['ja-end-date'].title + "<br>" + service.properties['gr-end-date'].title + "</td></tr>";
                        tbl_reserve_info.html("");
                        tbl_reserve_info.html(s);
                        $("#hdn-service-id").val(service.id);

                        if (service.properties['situation'].title == 1) {
                            $("#hdn-type").val("room");
                            $("#dv-check-image").prop('hidden', true);
                        } else if (service.properties['situation'].title == 5) {
                            $("#hdn-type").val("check");
                            $("#dv-check-image").prop('hidden', false);
                            $("#dv-check-image  img").attr('src', service.check_path);
//                            alert(service.check_path);
                        }

                        $("#modal-room-confirmation").modal("open");

                    },
                    error: function (result) {
                        alert(result.status);
                    }

                });
            });

            $("#btn-modal-confirm-room-service").click(function () {


                var value;
                if ($("#hdn-type").val() == "room") {
                    value = 3;
                } else if ($("#hdn-type").val() == "check") {
                    value = 7;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('services.change',['type'=>'reserve']) }}",
                    method: 'post',
                    data: {
                        service_id: $("#hdn-service-id").val(),
                        property: 'situation',
                        value: value,
                    },
                    success: function (result) {
                        $("#modal-room-confirmation").modal("close");

                    },
                    error: function (result) {
                        alert(result.status);
                    }
                });


            });


            $("#btn-modal-reject-room-service").click(function () {


                var value;
                if ($("#hdn-type").val() == "room") {
                    value = 2;
                } else if ($("#hdn-type").val() == "check") {
                    value = 6;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('services.change',['type'=>'reserve'])}}",
                    method: 'post',
                    data: {
                        service_id: $("#hdn-service-id").val(),
                        property: 'situation',
                        value: 6,
                    },
                    success: function (result) {
                        $("#modal-room-confirmation").modal("close");

                    },
                    error: function (result) {
                        alert(result.status);
                    }
                });


            });

            var refreshData = function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('services.index', ['type'=>'reserve', 'filters'=> urlencode(json_encode(['situation' =>['values'=>[1, 5],'operator'=>'in']]))])}}",
                    method: 'get',
                    data: {
                        type: 'reserve'
                    },
                    success: function (result) {
                        var oo = result.message.waiting_reserves;

                        var resreves = result.message.datas;

                        console.log(resreves);

                        var situations = result.message.situations;

                        var tbody = $("#recent-orders tbody");
                        var thead = $("#recent-orders thead");
                        tbody.html("");

                        $("#p-waiting-reserve-count").html(resreves.length + " عدد");
                        $("#spn-waiting-reserves").html(resreves.length);
                        // console.log(result.message.reserves);

                        $.each(resreves, function (index, value) {

                            to_print = "<tr>";
                            $.each(value.properties[1], function (p_index, p_value) {
                                if (p_value.title === 'situation') {
                                    to_print += `<td class="text-truncate">${situations[p_value.assigned]}</td>`;
                                } else if (p_value.input_type === 'date') {
                                    to_print += `<td class="text-truncate">${p_value.assigned['ja']}</td>`;
                                } else {
                                    to_print += `<td class="text-truncate">${p_value.assigned}</td>`;
                                }
                            });

                            to_print += `<td>`;
                            $.each(value.properties, function (p_index, gr_value) {
                                $.each(gr_value, function ($pr_index, $pr_value) {
                                    $.each($pr_value.actions, function ($ac_index, $ac_value) {
                                        to_print += `<a href="#" data-backdrop="true" data-toggle="modal" data-target="#mdl-reserve-actions"
                                                   onclick="$('#mdl-reserve-actions input[name=mdl-download-info-url]').val('${value.urls['show']}');
                                                           $('#mdl-reserve-actions input[name=mdl-actions]').val('name:${$ac_value['name']},action_style:buttons');
                                                           $('#mdl-reserve-actions input[name=mdl-update-url]').val('${value.urls['update']}');"
                                                   class="purple edit mr-1">
                                                    <i class="fa fa-eye"></i>
                                                </a>`;
                                    });
                                });
                            });

                            to_print += `</td>`;
                            to_print += "</tr>";
                            tbody.append(to_print);
                        });
                    },
                    error: function (result) {
                        alert(result.status);
                    }
                });
            };
            setInterval(refreshData, 5000);
        });


    </script>

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

                    console.log(groups);
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

                    // refreshData();

                },
                error: function (result) {
                    swal(result.status);
                }
            });


        });

    </script>


@endsection
