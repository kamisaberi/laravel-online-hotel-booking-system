<div class="col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}" data-placement="top" data-trigger="hover" data-toggle="popover" data-content="help hep help help help" data-original-field="Hover Triggered">
    <div class="form-group float-left">
{{--        <label for="{{$property->field}}" >--}}
{{--            {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}--}}
{{--        </label>--}}
        <input type="checkbox" id="{{$property->field}}" class="switchery" data-size="xs" {{$property->assigned == 1 ? 'checked' : ''}} />
        {{--        <label for="{{$property->field}}">Right Label</label>--}}
    </div>
</div>
