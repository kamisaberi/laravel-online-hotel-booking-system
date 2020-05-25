<div class="{{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <div class="form-group">
        <label for="{{$property->field}}">
            {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
        </label>
        @if(isset($property->assigned))
            <input id="{{$property->field}}" name="{{$property->field}}" class="form-control"
                   value="{{$property->assigned}}"
                   type="text">
        @else
            <input id="{{$property->field}}" class="form-control"
                   name="{{$property->field}}"
                   type="text">
        @endif
    </div>
</div>
