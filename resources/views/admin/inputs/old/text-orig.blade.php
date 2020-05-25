<div class="col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}"
{{--     data-trigger="hover" data-placement="top" data-toggle="popover" data-content="help hep help help help" data-original-title="Hover Triggered"--}}
>
    <div class="form-group">
        <label for="{{$property->title}}">
            {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->title}}
        </label>
        <input type="text" id="{{$property->title}}" class="form-control" value="{{isset($property->assigned) ? $property->assigned : '' }}"
               placeholder="{{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->title}}"
               {{isset($property->fillation_rules['disabled']) &&  $property->fillation_rules['disabled'] == true ? 'disabled' : ''  }}
               name="{{$property->title}}">

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
</div>
