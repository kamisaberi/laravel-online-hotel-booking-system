@extends('admin.items.views.create')
@section("sub-vendor-css")

@endsection
@section("sub-header")
    <script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>
@endsection

@section("sub-main")

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
                                        <form id="form" action="{{$urls['form_action']}}" method="post">
                                            <div class="form-body">
                                                {{@csrf_field()}}
                                                <div class="row">
                                                    <div class="col col-md-12">
                                                        <h4 class="form-section"><i class="ft-user"></i>main</h4>
                                                    </div>
                                                    @include('admin.inputs.new2.text', ['field'=>'title', 'value'=> ($form_type == 'edit' ? $room->title : ''), 'locales'=> true])
                                                    @include('admin.inputs.new2.textarea', ['field'=>'description', 'value'=>($form_type == 'edit' ? $room->description : ''), 'locales'=> true])
                                                    @include('admin.inputs.new2.tinymce', ['field'=>'content', 'value'=>($form_type == 'edit' ? $room->content : ''), 'locales'=> true])
                                                    @include('admin.inputs.new2.select', ['field'=>'floor', 'value'=>($form_type == 'edit' ? $room->floor : '')])
                                                    @include('admin.inputs.new2.select_image', ['field'=>'image', 'value'=>''])
                                                    @include('admin.inputs.new2.select_video', ['field'=>'video', 'value'=>''])
                                                    @include('admin.inputs.new2.select_flash', ['field'=>'flash', 'value'=>''])
                                                </div>
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


    {{--    @isset($components['files'])--}}
    @include('admin.components.file-manager', ['images'=>$components['files']['images']]);
    {{--    @endisset--}}

    @include('admin.components.add-new-property');
    @include('admin.components.mdl-category-selector');

@endsection

@section("sub-vendor-js")



@endsection
@section("sub-footer")

@endsection

