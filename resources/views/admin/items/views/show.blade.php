@extends("admin.layouts.admin")
@section('vendor-css')

    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.vendor-css")
    @endif




@endsection
@section("header")

    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.header")
    @endif



@endsection
@section("main")

    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.main",['data'=> $data] )
    @endif

@endsection
@section('vendor-js')
    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.vendor-js")
    @endif

@endsection

@section("footer")
    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.footer")
    @endif

@endsection