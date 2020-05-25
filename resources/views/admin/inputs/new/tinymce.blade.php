<div class="input-field col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <p style="text-align: right; direction: rtl;">
        {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
    </p>
    <textarea class="tinymce" id="{{$property->field}}" name="{{$property->field}}">{{isset($property->assigned) ? $property->assigned : ""}}</textarea>

</div>

