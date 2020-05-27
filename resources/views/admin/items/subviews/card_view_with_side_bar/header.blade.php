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
