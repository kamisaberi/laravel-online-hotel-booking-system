<div class="{{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <div class="form-group">
        <label for="{{$property->field}}">{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}</label>
        <input class="form-control" id="{{$property->field}}" name="{{$property->field}}" type="password"
               value="{{isset($property->assigned) ? $property->assigned : '' }}" {{isset($property->fillation_rules[0]->rules['disabled']) ? 'disabled' : ''}}>
    </div>
</div>
