@extends('admin.items.views.index')

@section('sub-vendor-css')

@endsection

@section('sub-header')

@endsection

@section('sub-main')

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
                                            <div class="sidebar-toggle d-block d-lg-none"><i
                                                    class="ft-menu font-large-1"></i></div>
                                            <form action="#">
                                                <div class="position-relative">
                                                    <input type="search" id="search-contacts" class="form-control"
                                                           placeholder="Search contacts...">
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
                                        <div class="table-responsive">

                                            <table id="users-contacts"
                                                   class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
                                                <thead>
                                                <tr>
                                                    {{--                                                    <th><input type="checkbox" class="input-chk" id="check-all"--}}
                                                    {{--                                                               onclick="toggle();"></th>--}}
                                                    <th>
                                                        {{__("fields.title")}}
                                                    </th>
                                                    <th>{{__("admin.actions")}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($datas as $data)
                                                    <tr>
                                                        {{--                                                        <td>--}}
                                                        {{--                                                            <input type="checkbox" class="input-chk check">--}}
                                                        {{--                                                        </td>--}}
                                                        <td>
                                                            @if(\App\Libraries\Utilities\TextUtility::isJsonText($data->title))
                                                                {{json_decode($data->title,true)[$base_locale]}}
                                                            @else
                                                                {{$data->title}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @include('admin.layouts.widgets.actions', ['permissions'=>$permissions , 'type'=>'room'])
                                                            <a href="#" data-toggle="modal" data-target="#mdl-set-price"
                                                               data-content="{{$data->id}}"
                                                               class="primary show mr-1">
                                                                <i class="fa fa-adjust"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    {{--                                                    <th></th>--}}
                                                    <th>
                                                        {{__("fields.title")}}
                                                    </th>
                                                    <th>{{__("admin.actions")}}</th>
                                                </tr>
                                                </tfoot>
                                            </table>
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
                                        <h5 class="media-heading">{{$page_title}}</h5>
                                    </div>
                                </div>
                            </div>
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
                                </ul>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @isset($modals)
        @foreach($modals as $modal)
            @include('admin.components.modal-form', ['modal'=>$modal])
        @endforeach
    @endisset

    @include('admin.components.modal-reserve-action')
    @include('admin.components.mdl-show-check')
    @include('admin.components.modal-set-price')

@endsection
@section('sub-vendor-js')

    {{--        <script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
    <script src="{{asset('vendors/vue/dist/vue.js')}}"></script>
    {{--        <script src="https://cdn.jsdelivr.net/npm/moment"></script>--}}
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('vendors/moment-jalaali/build/moment-jalaali.js')}}"></script>
    <script src="{{asset('vendors/vue-persian-datetime-picker-master/dist/vue-persian-datetime-picker-browser.js')}}"></script>

@endsection
@section('sub-footer')

    <script>
        $('a[data-target="#mdl-set-price"]').on("click", function () {
            $('#mdl-set-price').modal('show');
            $('#mdl-set-price input[name=data-content]').val($(this).attr("data-content"));
        });

        $('#mdl-set-price').on('shown.bs.modal', function (e) {

            var id = $('#mdl-set-price input[name=data-content]').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('items.get.property' , ['type'=>'room' , 'property'=>'price'])}}',
                method: 'post',
                data: {
                    'id': id
                },
                success: function (result) {
                    var prices = result.prices;

                    var tbody_set_price = $('#mdl-set-price').find('tbody');
                    $('#mdl-set-price').find('tbody').html('');

                    $.each(prices, function (key, value) {
                        var ii = `<input type="hidden" name="price[]" value="${value['id']}">`;
                        $('#mdl-set-price').find('tbody').append(`<tr>${ii}<td>${value['dates']}</td><td>${value['value']}</td><td><a href="#" class="danger"><i class="ft-delete"></i></a></td></tr>`);
                    });

                    // console.log(prices);

                },
                error: function (result) {
                    alert(result.status);
                }
            });
        });

        $('#mdl-set-price').on('show.bs.modal', function (e) {
            $('#mdl-set-price').modal('hide');
        });
    </script>

    <script>
        var start_date_price = new Vue({
            el: '#start-date-price',
            data: {
                date: moment().format('jYYYY/jMM/jDD'),
                today: moment().format('jYYYY/jMM/jDD'),
            },
            components: {
                DatePicker: VuePersianDatetimePicker
            },
            methods: {
                onChange(picker) {
                    end_date_price.date = picker;
                    end_date_price.min = moment(picker).format('jYYYY/jMM/jDD');
                    end_date_price.disabled = false;
                    end_date_price.update();
                }
            }
        });


        var end_date_price = new Vue({
            el: '#end-date-price',
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
                }
            }
        });


        $("#btn-add-range-price").click(function () {

            var st = start_date_price.date;
            var en = end_date_price.date;
            // alert(st + ":" + en);
            var s = '';
            if (st.trim() == en.trim()) {
                s = st;
            } else {
                s = st + ":" + en;
            }

            var i = `<input type="hidden" name="price[]" value="${s}">`;
            $('#mdl-set-price tbody').append(`<tr>${i}<td>${$('#new-price').val()}</td><td>${s}</td><td><a href="#" class="danger"><i class="ft-delete"></i></a></td></tr>`);

        });

        $("#btn-add-weekday-price").click(function () {
            var to_add = $(this).parent().parent().find('select[name=weekdays]').val();
            if (to_add == null)
                return;

            var i = `<input type="hidden" name="price[]" value="${to_add}">`;
            $('#mdl-set-price tbody').append(`<tr>${i}<td>${$('#new-price').val()}</td><td>${to_add}</td><td><a href="#" class="danger"><i class="ft-delete"></i></a></td></tr>`);
        });

        $('#mdl-set-price').on('click', 'a i.ft-delete', function () {
            $(this).parent().parent().parent().remove();
        });

    </script>



@endsection
