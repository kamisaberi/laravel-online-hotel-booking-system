<div class="col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <label>
        <input id="{{$property->field}}" name="{{$property->field}}" type="checkbox" value="1"
               class="filled-in" {{isset($property->assigned) &&  $property->assigned == 1 ? 'checked' : ''}}/>
        <span>{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}</span>
    </label>
</div>