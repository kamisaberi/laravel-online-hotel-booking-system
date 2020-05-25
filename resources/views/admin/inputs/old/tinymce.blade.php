<div class="input-field col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <p style="text-align: right; direction: rtl;">{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->title}}</p>
    <textarea class="tinymce" id="{{$property->title}}" name="{{$property->title}}">{{isset($property->assigned) ? $property->assigned : ""}}</textarea>
    @if(isset($property->fillation_rules['locales']) && $property->fillation_rules['locales'] == true )
        @php($ac=false)
        <div class="locales" style="margin-right: 3rem;">
            @foreach($locales_and_flags as $k=>$v)

                @if($base_locale == $k)
                    @php($t =$property->assigned )
                @else
                    @php($s= 'assigned-'. $k)
                    @php($t =isset($property->{$s}) ? $property->{$s} : '' )

                @endif


                <a href="#">
                    <input type="hidden" id="{{$property->title}}-{{$k}}" name="{{$property->title}}-{{$k}}" value="{{$t}}">
                    <span class="flag-icon {{$v}} {{$ac ? 'flag-icon-grayed'  : '' }}"></span>
                </a>
                @php($ac=true)
            @endforeach
        </div>
    @endif

</div>

