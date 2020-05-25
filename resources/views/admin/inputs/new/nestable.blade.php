<div class="{{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <label for="{{$property->field}}">
        {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
    </label>
    <br>
    <a class="btn btn-outline-blue" data-toggle="modal" data-target="#mdl-category-selector" data-backdrop="true" id="a-{{$property->field}}"
       onclick="$('#mdl-category-selector #nestable-content').val('{{$property->field}}');">
        {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
    </a>
    <br>
    <br>
    <div class="row">
        <div class="col col-md-12" id="{{$property->field}}-container">
            @isset($property->assigned)
                @if(is_array($property->assigned))
                    @foreach($property->assigned as $k=>$v)
                        <input type="hidden" name="{{$property->field}}[]" value="{{$k}}">
                        <span class="btn btn-outline-danger danger">{{$v}}</span>
                        &nbsp&nbsp&nbsp
                    @endforeach
                @endif
            @endisset
        </div>
    </div>
</div>

