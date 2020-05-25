<div class="col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-10'}}">
    <div class="form-group">
        <label for="{{$property->field}}">{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}</label>
        <input class="form-control" id="txt-add-multi-text-{{$property->field}}" name="txt-add-multi-text-{{$property->field}}"
               type="text">
    </div>
</div>
<div class="col col-sm-12 col-md-2">
    <button type="button" class="btn" id="btn-add-multi-text-{{$property->field}}">
        {{ __('messages.operations')['insert']}}
    </button>
</div>

{{--<div class="input-field col s12 m12">--}}
{{--    <button type="button" class="btn-flat red-text">--}}
{{--        {{ __('messages.operations')['values']}}--}}
{{--    </button>--}}
{{--</div>--}}

<div class="input-field col s12 m6" id="dv-multi-text-{{$property->field}}">
    @foreach($property->assigned as $item)
        <div class="row" style="border: 1px dotted red;margin-bottom:3px;">
            <input type="hidden" id="{{$property->field}}[]" name="{{$property->field}}[]" value="{{$item}}">
            <div class="input-field col s12 m2">
            </div>
            <div class="input-field col s12 m6">
                {{$item}}
            </div>
            <div class="input-field col s12 m2">
                <button type="button" class="btn button-delete">
                    {{ __('messages.operations')['delete']}}
                </button>
            </div>
        </div>

    @endforeach
</div>
@php($property->input_type= 'multi-text')
