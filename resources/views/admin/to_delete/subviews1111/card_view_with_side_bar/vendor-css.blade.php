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
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/extensions/sweetalert.css')}}">