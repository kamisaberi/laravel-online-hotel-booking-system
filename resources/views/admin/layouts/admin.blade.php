<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="{{in_array(App::getLocale(),config('base.rtl_locales')) ? 'rtl':'ltr'}}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <meta name="_token" content="{{csrf_token()}}"/>
        <title>Dashboard eCommerce - Stack Responsive Bootstrap 4 Admin Template</title>
        <link rel="apple-touch-icon" href="{{asset('admin-assets/images/ico/apple-icon-120.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-assets/images/ico/favicon.ico')}}">
        {{--        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">--}}
        <link href="{{asset('admin-assets/fonts/google/css/fonts.google.css')}}" rel="stylesheet">
        {{--        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/flag-icon/css/flag-icon.min.css')}}">--}}

        @yield('vendor-css')

        @if(in_array(App::getLocale(),config('base.rtl_locales')))
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/bootstrap.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/bootstrap-extended.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/colors.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/components.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/custom-rtl.min.css')}}">
        @else
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/bootstrap-extended.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/colors.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/components.min.css')}}">
        @endif

        @yield('header')

    </head>

    <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar content-left-sidebar email-application  " data-open="click" data-menu="vertical-menu-modern"
          data-col="2-columns">

        <!-- BEGIN: Header-->
        {{--        header-navbar navbar-expand-sm navbar navbar-with-menu navbar-light bg-blue bg-lighten-5 border-blue border-lighten-4--}}
        {{--        header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-border navbar-shadow--}}
        <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
            <div class="navbar-wrapper">
                <div class="navbar-header">
                    <ul class="nav navbar-nav flex-row">
                        <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="index.html#"><i
                                        class="ft-menu font-large-1"></i></a>
                        </li>
                        <li class="nav-item mr-auto">
                            <a class="navbar-brand" href="{{route('admin.index')}}">
                                <img class="brand-logo" alt="stack admin logo" src="{{asset('admin-assets/images/logo/stack-logo.png')}}">
                                <h2 class="brand-text">آرناهیت</h2>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block nav-toggle">
                            <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                                <i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i>
                            </a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-container content">
                    <div class="collapse navbar-collapse" id="navbar-mobile">
                        <ul class="nav navbar-nav mr-auto float-left">
                            <li class="dropdown nav-item mega-dropdown" hidden>
                                <a class="dropdown-toggle nav-link" href="index.html#" data-toggle="dropdown">Mega</a>
                                <ul class="mega-dropdown-menu dropdown-menu row">
                                    <li class="col-md-2 col-sm-6">
                                        <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-newspaper-o"></i> News</h6>
                                        <div id="mega-menu-carousel-example">
                                            <div><img class="rounded img-fluid mb-1" src="{{asset('admin-assets/images/slider/slider-2.png')}}" alt="First slide"><a
                                                        class="news-title mb-0 d-block" href="index.html#">Poster Frame PSD</a>
                                                <p class="news-content"><span class="font-small-2">January 26, 2016</span></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-3 col-sm-6">
                                        <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-random"></i> Menu</h6>
                                        <ul>
                                            <li class="menu-list">
                                                <ul>
                                                    <li><a class="dropdown-item" href="layout-fixed.html"><i class="ft-file"></i> Page layouts</a></li>
                                                    <li><a class="dropdown-item" href="color-palette-primary.html"><i class="ft-camera"></i> Color pallet</a></li>
                                                    <li><a class="dropdown-item" href="../../../starter-kit/ltr/vertical-menu-template/layout-static.html"><i class="ft-edit"></i>
                                                            Starter kit</a></li>
                                                    <li><a class="dropdown-item" href="changelog.html"><i class="ft-minimize-2"></i> Change log</a></li>
                                                    <li><a class="dropdown-item" href="../../../../pixinvent_ticksy_default.html"><i class="fa fa-life-ring"></i> Support center</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3 col-sm-6">
                                        <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-list-ul"></i> Accordion</h6>
                                        <div class="mt-1" id="accordionWrap" role="tablist" aria-multiselectable="true">
                                            <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                                                <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a data-toggle="collapse" href="index.html#accordionOne"
                                                                                                                         aria-expanded="true" aria-controls="accordionOne">Accordion
                                                        Item #1</a></div>
                                                <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionWrap"
                                                     aria-expanded="true">
                                                    <div class="card-content">
                                                        <p class="accordion-text text-small-3">Caramels dessert chocolate cake pastry jujubes bonbon. Jelly wafer jelly beans.
                                                            Caramels chocolate cake liquorice cake wafer jelly beans croissant apple pie.</p>
                                                    </div>
                                                </div>
                                                <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a class="collapsed" data-toggle="collapse"
                                                                                                                         href="index.html#accordionTwo" aria-expanded="false"
                                                                                                                         aria-controls="accordionTwo">Accordion Item #2</a></div>
                                                <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionWrap"
                                                     aria-expanded="false">
                                                    <div class="card-content">
                                                        <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly tiramisu dessert pie. Tiramisu macaroon muffin jelly
                                                            marshmallow cake. Pastry oat cake chupa chups.</p>
                                                    </div>
                                                </div>
                                                <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a class="collapsed" data-toggle="collapse"
                                                                                                                           href="index.html#accordionThree" aria-expanded="false"
                                                                                                                           aria-controls="accordionThree">Accordion Item #3</a>
                                                </div>
                                                <div class="card-collapse collapse" id="accordionThree" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordionWrap"
                                                     aria-expanded="false">
                                                    <div class="card-content">
                                                        <p class="accordion-text">Candy cupcake sugar plum oat cake wafer marzipan jujubes lollipop macaroon. Cake dragée jujubes
                                                            donut chocolate bar chocolate cake cupcake chocolate topping.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-4 col-sm-6">
                                        <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-envelope-o"></i> Contact Us</h6>
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="inputName1">Name</label>
                                                    <div class="col-sm-9">
                                                        <div class="position-relative has-icon-left">
                                                            <input class="form-control" type="text" id="inputName1" placeholder="John Doe">
                                                            <div class="form-control-position pl-1"><i class="fa fa-user-o"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="inputEmail1">Email</label>
                                                    <div class="col-sm-9">
                                                        <div class="position-relative has-icon-left">
                                                            <input class="form-control" type="email" id="inputEmail1" placeholder="john@example.com">
                                                            <div class="form-control-position pl-1"><i class="fa fa-envelope-o"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="inputMessage1">Message</label>
                                                    <div class="col-sm-9">
                                                        <div class="position-relative has-icon-left">
                                                            <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>
                                                            <div class="form-control-position pl-1"><i class="fa fa-commenting-o"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 mb-1">
                                                        <button class="btn btn-primary float-right" type="button"><i class="fa fa-paper-plane-o"></i> Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item d-none d-md-block">
                                <a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="generate-sitemap">
                                    <span>ایجاد نقشه سایت</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('stats')}}" class="nav-link">
                                    <span>آمار بازدید سایت</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('services.index', ['type'=>'reserve', 'filters'=> urlencode(json_encode(  ['situation' =>['values'=>[1, 5],'operator'=>'in']]   ))])}}"
                                   class="nav-link">
                                    <span>رزرو تست</span>
                                </a>
                            </li>


                            <li class="nav-item nav-search" hidden>
                                <a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                                <div class="search-input">
                                    <input class="input" type="text" placeholder="Explore Stack...">
                                </div>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown dropdown-language nav-item" hidden>
                                <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flag-icon flag-icon-gb"></i>
                                    <span class="selected-language"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                    <a class="dropdown-item" href="#">
                                        <i class="flag-icon flag-icon-gb"></i>
                                        English
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="flag-icon flag-icon-fr"></i>
                                        French
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="flag-icon flag-icon-cn"></i>
                                        Chinese
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="flag-icon flag-icon-de"></i>
                                        German
                                    </a>
                                </div>
                            </li>
                            <li class="dropdown dropdown-notification nav-item" hidden>
                                <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                    <i class="ficon ft-bell"></i>
                                    <span class="badge badge-pill badge-danger badge-up">5</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span
                                                    class="notification-tag badge badge-danger float-right m-0">5 New</span></h6>
                                    </li>
                                    <li class="scrollable-container media-list"><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">You have new order!</h6>
                                                    <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading red darken-1">99% Server load</h6>
                                                    <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                                    <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Complete the task</h6>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Generate monthly report</h6>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a></li>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-notification nav-item" hidden>
                                <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                    <i class="ficon ft-mail"></i><span class="badge badge-pill badge-warning badge-up">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span
                                                    class="notification-tag badge badge-warning float-right m-0">4 New</span></h6>
                                    </li>
                                    <li class="scrollable-container media-list"><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img
                                                                src="{{asset('admin-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Margaret Govan</h6>
                                                    <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img
                                                                src="{{asset('admin-assets/images/portrait/small/avatar-s-2.png')}}" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Bret Lezama</h6>
                                                    <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img
                                                                src="{{asset('admin-assets/images/portrait/small/avatar-s-3.png')}}" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Carie Berra</h6>
                                                    <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a><a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img
                                                                src="{{asset('admin-assets/images/portrait/small/avatar-s-6.png')}}" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Eric Alsobrook</h6>
                                                    <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a></li>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-user nav-item">
                                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <span class="avatar avatar-online">
                                        <img src="{{asset('admin-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i>
                                    </span>
                                    <span class="user-name">{{$user->name}} {{$user->last_name}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" hidden>
                                        <i class="ft-user"></i>
                                        {{__('layout.public.edit profile')}}
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="ft-mail"></i>
                                        {{__('layout.public.messages')}}
                                    </a>
                                    <a class="dropdown-item" href="#" hidden>
                                        <i class="ft-check-square"></i>
                                        Task
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="ft-message-square"></i>
                                        {{__('layout.public.rooms')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('auth.logout')}}">
                                        <i class="ft-power"></i>
                                        {{__('layout.public.logout')}}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: Header-->
        <!-- BEGIN: Main Menu-->

        <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                    @isset($navigations )


                        @php($section="none")
                        @php($g_name="none")
                        @foreach($navigations as $k=>$nav)
                            @php($g_f = current($nav))
                            @if(isset($g_f->display_rules['section']) && $g_f->display_rules['section'] != $section)
                                <li class=" navigation-header">
                                <span>
                                    {{trans("messages.navigation.sections." . $g_f->display_rules['section'])}}
                                </span>
                                    <i class=" ft-minus" data-toggle="tooltip" data-placement="right"
                                       data-original-title="{{trans("messages.navigation.sections." . $g_f->display_rules['section'])}}"></i>
                                </li>
                                @php($section= $g_f->display_rules['section'])
                            @endif
                            @if(count($nav)>1 && isset($g_f->display_rules['g_name']))

                                @php($class= "")
                                @foreach($nav as $k1=>$navigation)
                                    @if($navigation->active == true)
                                        @php($class= "active bold open")
                                        @break
                                    @endif
                                @endforeach
                                <li class=" nav-item">
                                    <a href="">
                                        <i class="ft-home"></i>
                                        <span class="menu-title" data-i18n="">{{trans("messages.navigation.groups." . $g_f->display_rules['g_name'])}}</span>
                                        {{--                                    <span class="badge badge badge-primary badge-pill float-right mr-2">3</span>--}}
                                    </a>
                                    <ul class="menu-content">
                                        @foreach($nav as $k1=>$navigation)
                                            @include('admin.layouts.widgets.navigation_item', ['navigation'=> $navigation,'show_icon'=>false])
                                        @endforeach
                                    </ul>
                                </li>
                            @elseif(count($nav)==1)
                                @include('admin.layouts.widgets.navigation_item', ['navigation'=> current($nav),'show_icon'=>true])
                            @endif
                        @endforeach

                    @endisset

                </ul>
            </div>
        </div>


        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
    @yield('main')
    <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light navbar-border">
            <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
                <span class="float-md-left d-block d-md-inline-block">
                    کپی رایت
                      &copy; 2019
                    <a class="text-bold-800 grey darken-2" href="http://arnahit.ir" target="_blank">
                         گروه آرناهیت
                    </a>
                </span>
                <span class="float-md-right d-none d-lg-block">
                    ساخته شده توسط
                    <a href="http://arnahit.ir" target="_blank">
                        گروه آرناهیت
                    </a>
{{--                    <i class="ft-heart pink"></i>--}}
                </span>
            </p>
        </footer>
        <!-- END: Footer-->


        <!-- BEGIN: Vendor JS-->
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
    @yield('vendor-js')
    <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{asset('admin-assets/js/core/app-menu.min.js')}}"></script>
        <script src="{{asset('admin-assets/js/core/app.min.js')}}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
    @yield('footer')
    <!-- END: Page JS-->


        <script>
            $("#generate-sitemap").click(function (e) {
                e.preventDefault();
                swal({
                    title: "ایجاد نقشه سایت",
                    text: "آیا میخواهید نقشه جدید ایجاد شود ؟",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    closeModal: false,
                    closeOnConfirm: false, //It does close the popup when I click on close button
                    closeOnCancel: false,
                }).then((willGenerateSitemap) => {
                    if (willGenerateSitemap) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{route('generate-sitemap')}}",
                            method: 'get',

                            success: function (result) {
                                if (result.error === false) {
                                    swal(result.path);
                                }
                            },
                            error: function (result) {
                                alert(result.status);
                            }
                        });

                    } else {

                    }
                });
            });
        </script>

    </body>
    <!-- END: Body-->
</html>
