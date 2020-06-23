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

            $("[id^=active-]").change(function () {
                var s = $(this).attr('id');
                var ss = s.split('-');
                var did = ss[ss.length - 1];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('items.change', ['type'=>$type])}}",
                    method: 'post',
                    data: {
                        id: did,
                        key: 'available',
                        value: $(this).prop('checked') == true ? 1 : 0
                    },
                    success: function (result) {
                        alert(result.message);
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
