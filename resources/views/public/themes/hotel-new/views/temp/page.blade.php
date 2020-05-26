{{--{{$datas[0]->properties['template']->value}}--}}
{{--{{dd($datas[0]->properties['template']->value)}}--}}
{{--@include('public.themes.hotel-new.templates.empty')--}}


@if(isset($datas->properties['template']->value))
    @include($datas->properties['template']->value, ['data'=>$datas]);
@endif

