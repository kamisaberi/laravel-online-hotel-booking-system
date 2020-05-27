@if(in_array(App::getLocale(),config('base.rtl_locales')))
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors-rtl.min.css')}}">
@else
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
@endif

<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/extensions/unslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/weather-icons/climacons.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/fonts/meteocons/style.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/charts/morris.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/extensions/sweetalert.css')}}">