<div class="{{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'm12'}}">
    <div class="form-group">
        <label for="{{$property->field}}">{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}</label>
        @if(isset($property->assigned))
            <input class="form-control" id="{{$property->field}}" name="{{$property->field}}"
                   value="{{$property->assigned}}"
                   type="number">
        @else
            <input class="form-control" id="{{$property->field}}" name="{{$property->field}}"
                   type="number">
        @endif
    </div>
</div>
