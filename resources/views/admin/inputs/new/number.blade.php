<div class="{{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <div class="form-group">
        <label for="{{$property->Field}}">{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->Field}}</label>
        @if(isset($property->assigned))
            <input id="{{$property->Field}}" name="{{$property->Field}}"
                   class="form-control"

                   placeholder="{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->Field}}"
                   value="{{$property->assigned}}"
                   type="number">
        @else
            <input id="{{$property->Field}}" name="{{$property->Field}}"
                   class="form-control"
                   placeholder="{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->Field}}"
                   type="number">
        @endif
    </div>
</div>
