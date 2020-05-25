<div class="col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <div class="form-group">
        <label for="{{$property->field}}">
            {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
        </label>
        <input type="text" id="{{$property->field}}" class="form-control" value="{{isset($property->assigned) ? $property->assigned : '' }}"
               placeholder="{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}"
               {{isset($property->fillation_rules['disabled']) &&  $property->fillation_rules['disabled'] == true ? 'disabled' : ''  }}
               name="{{$property->field}}">

    </div>
</div>
