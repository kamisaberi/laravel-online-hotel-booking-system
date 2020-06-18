<div class="col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <div class="form-group">
        <label for="{{$property->field}}">
            {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
        </label>
        <textarea id="{{$property->field}}" rows="5"
                  placeholder="{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}"
                  class="form-control" name="{{$property->field}}">{{isset($property->value) ? $property->value : ''}}</textarea>

    </div>
</div>
