@extends("admin.layouts.admin")
@section('vendor-css')
    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors-rtl.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/fonts/glyphicons/css/bootstrap-glyphicons.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/flag-icon/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/bootstrap-fileinput/css/fileinput.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/forms/selects/select2.min.css')}}">

    {{--    <link href="{{asset('admin-assets/vendors/jquery.nestable2/jquery.nestable.css')}}" type="text/css" rel="stylesheet">--}}
    <link href="{{asset('admin-assets/vendors/jquery.nestable2/1/jquery.nestable.css')}}" type="text/css"
          rel="stylesheet">

@endsection

@section("header")
    @if(in_array(App::getLocale(),config('base.rtl_locales')))
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css-rtl/core/colors/palette-gradient.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style-rtl.css')}}">
        <!-- END: Custom CSS-->
    @else
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/colors/palette-gradient.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style.css')}}">
        <!-- END: Custom CSS-->

    @endif


    @foreach($groups as $group)
        @foreach($group->properties as $property)
            @if($property->rules['type']== 'cropper')
                <link href="{{asset('vendors/cropper/cropper.css')}}" type="text/css" rel="stylesheet">
            @elseif($property->rules['type']== 'tinymce')
                <script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>
            @endif
        @endforeach
    @endforeach


@endsection
@section("main")

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            @include('admin.layouts.widgets.breadcrumbs', ['page_title'=>$page_title , 'breadcrumbs'=> $breadcrumbs])
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">{{$page_title}}</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class=" col m12  alert alert-danger print-error-msg red-text" style="display:none">
                                                <ul></ul>
                                            </div>
                                        </div>

                                        <form id="form" action="{{$urls['update']}}" method="post">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Information</h4>
                                                {{@csrf_field()}}
                                                @include('admin.items.forms.input_form',['groups'=> $groups])

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @isset($files)
        @include('admin.components.file-manager', ['images'=>$images]);
    @endisset

    @include('admin.components.add-new-property');
    @include('admin.components.mdl-category-selector');

@endsection
@section('vendor-js')
    <script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap-fileinput/js/plugins/piexif.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap-fileinput/js/plugins/sortable.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap-fileinput/js/plugins/purify.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/jquery.nestable2/1/jquery.nestable2.js')}}"></script>
    {{--    <script src="{{asset('admin-assets/vendors/jquery.nestable2/jquery.nestable.js')}}"></script>--}}

@endsection

@section("footer")

    <script src="{{asset('admin-assets/js/scripts/forms/select/form-select2.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/popover/popover.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/mine/items.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/mine/form-action.js')}}"></script>
    <script src="{{asset('admin-assets/js/mine/select-image.js')}}"></script>
    <script src="{{asset('admin-assets/js/mine/property-manager.js')}}"></script>
    <script src="{{asset('admin-assets/js/mine/nestable.selector.js')}}"></script>
    <script src="{{asset('admin-assets/js/mine/file-manager.js')}}"></script>



    <script>
            @php($xx= config('base.extensions'))
        var file_extensions = @JSON($xx);
            @isset($components['files'])
            @php($files= $components['files'])
        var files = @JSON($files);
            @endisset
            @isset($documents_urls)
        var documents_urls = @JSON($documents_urls);
        var base_locale = '{{App::getLocale()}}';
        @endisset
    </script>

    <script>
        FILE_MANAGER.init({'selector': $("#file-1"), 'upload_url': ""});
        FORM_ACTION.init({'form': "#form",'url_index': "{{$urls['index']}}",'url_destroy': "{{isset($urls['destroy']) ? $urls['destroy'] : ''}}"});
    </script>


    @foreach($groups as $group)
        @foreach($group->properties as $property)
            @if($property->rules['type'] == 'cropper')
                <script type="text/javascript" src="{{asset('vendors/cropper/cropper.js')}}"></script>
                <script type="text/javascript" src="{{asset('vendors/cropper/jquery-cropper.js')}}"></script>

                <script>

                    var $image = $(".featured_image > img");
                    originalData = {};

                    $image.cropper({
                        aspectRatio: '{{$settings->aspect_ratio}}',
                        resizable: true,
                        zoomable: false,
                        rotatable: false,
                        multiple: true,
                        dragend: function (data) {
                            originalData = $image.cropper("getCroppedCanvas");
                            console.log(originalData.toDataURL());
                            $('.data-url').text(originalData.toDataURL());
                            $('#path').val(originalData.toDataURL());
                        }
                    });

                    $('#submit').click(function () {
                        var $image = $(".featured_image > img");
                        originalData = $image.cropper("getCroppedCanvas");
                        $('#path').val(originalData.toDataURL());
                    });

                    $('#send').click(function () {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{url("/cropper/save")}}",
                            method: 'post',
                            data: {'file': $image.cropper("getCroppedCanvas").toDataURL()},
                            success: function (result) {
//                        alert(result);
                                alert(result.message);

                            },
                            error: function (result) {
                                alert("error code :" + result.status);

                            }
                        });
                    });


                    var $inputImage = $("#inputImage");
                    if (window.FileReader) {
                        $inputImage.change(function () {
                            var fileReader = new FileReader(),
                                files = this.files,
                                file;

                            if (!files.length) {
                                return;
                            }

                            file = files[0];

                            if (/^image\/\w+$/.test(file.type)) {
                                fileReader.readAsDataURL(file);
                                fileReader.onload = function () {
                                    $inputImage.val("");
                                    $image.cropper("reset", true).cropper("replace", this.result);
                                };
                            } else {
                                showMessage("Please choose an image file.");
                            }
                        });
                    } else {
                        $inputImage.addClass("hide");
                    }

                </script>

            @elseif($property->rules['type'] == 'nestable')

                <script>
                    NESTABLE_ACTION.init({'nestable': "#nestable3", 'url_update': "{{$property->url}}"});
                </script>
                {{--            <script>--}}
                {{--                var lastId = 0;--}}
                {{--                $(document).ready(function () {--}}
                {{--                    $('#nestable3').nestable();--}}
                {{--                    var obj = '{{$property->values}}';--}}
                {{--                    var obj = obj.replace(/&quot;/g, '\"');--}}

                {{--                    $.each(JSON.parse(obj), function (index, item) {--}}
                {{--                        $('#nestable3').nestable('add', item);--}}
                {{--                    });--}}
                {{--                    $('#nestable3 .dd-empty').remove();--}}
                {{--                });--}}
                {{--            </script>--}}

                <script>
                    var lastId = 0;
                    $(document).ready(function () {
                        var obj = '{{$property->values}}';
                        var obj = obj.replace(/&quot;/g, '\"');
                        var output = '';

                        function buildItem(item) {

                            lastId = Math.max(item.id, lastId);

                            $ttles = item.title.split(',');
                            $title_to_print = '';
                            $.each($ttles, function (indx, val) {
                                $ttl = val.split(':');
                                if ($ttl[0] == base_locale) {
                                    $title_to_print = $ttl[1];
                                }
                            });

                            var html = "<li class='dd-item dd3-item' data-id='" + item.id + "' data-title='" + item.title + "'>";
                            html += "<div class='dd-handle dd3-handle'></div>";
                            html += `<div class="dd3-content" name="1"><div class="row"><div class="col col-md-1"><a href="#" class="delete-item"><i class="fa fa-remove"></i></a></div><div class="col col-md-1"><a href="#" data-toggle="modal" data-target="#mdl-add-category" data-backdrop="true"class="add-item"><i class="fa fa-plus"></i></a></div><div class="col col-md-10 item" style="text-align: left">${item.title}</div></div></div>`;

                            if (item.children) {

                                html += "<ol class='dd-list outer'>";
                                $.each(item.children, function (index, sub) {
                                    html += buildItem(sub);
                                });
                                html += "</ol>";

                            }

                            html += "</li>";

                            return html;
                        }


                        $.each(JSON.parse(obj), function (index, item) {
                            output += buildItem(item);
                        });

                        $('#nestable3 > .dd-list.dd3-list').html(output);
                        $('#nestable3').nestable();
                    });
                </script>


            @endif
        @endforeach
    @endforeach


@endsection
