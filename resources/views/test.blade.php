@extends('admin.layouts.admin')

@section('vendor-css')

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors-rtl.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/fonts/glyphicons/css/bootstrap-glyphicons.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/flag-icon/css/flag-icon.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/bootstrap-fileinput/css/fileinput.min.css')}}">
    {{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>--}}
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>--}}

@endsection

@section('header')

    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/colors/palette-gradient.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style-rtl.css">
        <!-- END: Custom CSS-->
    @else
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/colors/palette-gradient.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
        <!-- END: Custom CSS-->

    @endif

    <script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>

@endsection

@section('main')

    <div class="container">

        <form id="form" action="{{route('documents.store', ['type'=>'general'])}}" method="post">
            <div class="form-body">
                <h4 class="form-section"><i class="ft-user"></i>داده ها</h4>
                {{@csrf_field()}}

                <div class="form-actions">
                    <button type="reset" class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i>
                        {{__('messages.operations.submit')}}
                    </button>
                </div>
            </div>
        </form>

        <form action="{{route('admin.index')}}" method="post">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>
        </form>
        <!-- Modal -->
        <div id="exampleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">مدیریت تصاویر</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow-x: hidden !important;">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Basic Tabs</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
                                                       aria-selected="true">تصاویر</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
                                                       aria-selected="false">آپلود</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content card pt-5" id="myTabContentJust">
                                                <div class="tab-pane show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">

                                                    <div class="row">
                                                        <div class="col col-md-12">
                                                            <div class="row" id="rw-images">
                                                                <div class="col col-md-10">
                                                                    @foreach($images as $image)
                                                                        <img class="se-image"
                                                                             src="{{$image->properties['path']->title}}"
                                                                             style="width: 128px" data-content="0" alt="">
                                                                    @endforeach
                                                                </div>
                                                                <div class="col col-md-2"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="tab-pane " id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">


                                                    <div class="row">
                                                        <div class="col-lg-8 col-sm-12 col-11 main-section">
                                                            <h1 class="text-center text-danger">File Input Example</h1><br>
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <div class="file-loading">
                                                                    <input id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false"
                                                                           data-min-file-count="2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-add-image" data-dismiss="modal">Save changes</button>
                        <input type="hidden" value="" id="property-title">
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('vendor-js')
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>

    {{--    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>--}}

    <script src="{{asset('admin-assets/vendors/bootstrap-fileinput/js/plugins/piexif.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap-fileinput/js/plugins/sortable.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap-fileinput/js/plugins/purify.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap-fileinput/js/fileinput.min.js')}}"></script>

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>--}}

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>--}}

    {{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>--}}

@endsection

@section('footer')

    <script src="{{asset('admin-assets/js/mine/items.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/mine/form-action.js')}}"></script>
    <script src="{{asset('admin-assets/js/mine/select-image.js')}}"></script>

    <script type="text/javascript">

        $("#file-1").fileinput({
            // theme: 'fa',
            uploadUrl: "{{route('documents.store', ['type'=>'test'])}}",
            uploadExtraData: function () {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize: 2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });

    </script>

@endsection

