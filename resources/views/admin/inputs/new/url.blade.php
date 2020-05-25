<div class="input-field col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'm12'}}">
    <div class="form-group">
        <label for="{{$property->field}}">{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}</label>
        @if(isset($property->fillation_rules['icon']))
            <i class="material-icons prefix">{{$property->fillation_rules['icon']}}</i>
        @endif
        <input class="form-control" id="{{$property->field}}" name="{{$property->field}}" value="{{isset($property->assigned) ? $property->assigned : '' }}"
               type="url" {{isset($property->fillation_rules['disabled']) ? 'disabled' : ''}}>
    </div>
</div>
