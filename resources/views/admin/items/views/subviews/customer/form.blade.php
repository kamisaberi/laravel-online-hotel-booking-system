@extends('admin.items.views.create')
@section("sub-vendor-css")

@endsection
@section("sub-header")

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
                                                {{--                                                <h4 class="form-section"><i class="ft-user"></i>داده ها</h4>--}}
                                                {{@csrf_field()}}
                                                <div class="row">
                                                    <div class="col col-md-12">
                                                        <h4 class="form-section"><i class="ft-user"></i>main</h4>
                                                    </div>
                                                    @include('admin.inputs.new2.text', ['field'=>'name', 'value'=>''])
                                                    @include('admin.inputs.new2.email', ['field'=>'email', 'value'=>''])
                                                    @include('admin.inputs.new2.text', ['field'=>'mobile', 'value'=>''])
                                                    @include('admin.inputs.new2.text', ['field'=>'phone', 'value'=>''])
                                                    @include('admin.inputs.new2.text', ['field'=>'ssn', 'value'=>''])
                                                    @include('admin.inputs.new2.text', ['field'=>'password', 'value'=>''])
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


    @isset($components['files'])
        @include('admin.components.file-manager', ['images'=>$components['files']['images']]);
    @endisset

    @include('admin.components.add-new-property');
    @include('admin.components.mdl-category-selector');

@endsection

@section("sub-vendor-js")

@endsection
@section("sub-footer")

@endsection

