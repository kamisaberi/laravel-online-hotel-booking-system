@if(in_array(App::getLocale(),config('base.rtl_locales')))
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors-rtl.min.css')}}">
@else
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
@endif


<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/extensions/sweetalert.css')}}">
