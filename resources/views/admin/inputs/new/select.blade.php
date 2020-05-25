<div class="{{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <div class="form-group">
        <label for="{{$property->field}}">
            {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
        </label>
        <select id="{{$property->field}}" name="{{$property->field}}" class="form-control"
                {{isset($property->fillation_rules['disabled']) &&  $property->fillation_rules['disabled'] == true ? 'disabled' : ''  }}>
            <option value="none" selected="" disabled="">
                {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
            </option>
            @isset($property->values)
                @foreach($property->values as $value)
                    <option value="{{$value->value}}" {{$value->value==$property->assigned?"selected":""}} >{{$value->value}}</option>
                @endforeach
            @endisset

        </select>
    </div>
</div>

