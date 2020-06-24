@if (isset($locales) && $locales == true)
    @if(\App\Libraries\Utilities\TextUtility::isJsonText($value))
        @php($value = json_decode($value, JSON_UNESCAPED_UNICODE))
    @else
        @php($p=$value)
        @php($value= [])
        @foreach($locales_and_flags as $k=>$v)
            @php($value[$k]=$p)
        @endforeach
    @endif
@endif
<div class="col col-md-12">
    <div class="form-group">
        <label for="{{$field}}">{{isset(__("fields")[$field]) ? __("fields")[$field] :  $field }} :</label>
        @if ($locales == true)
            <input type="text" id="{{$field}}" class="form-control" value="{{$value[$base_locale]}}" placeholder="{{$field}}" name="{{$field}}">
        @else
            <input type="text" id="{{$field}}" class="form-control" value="{{$value}}" placeholder="{{$field}}" name="{{$field}}">
        @endif

        @if(isset($locales) && $locales == true )
            @php($ac=false)
            <div class="locales" style="margin-right: 3rem;">
                @foreach($locales_and_flags as $k=>$v)
                    @if($base_locale == $k)
                        @php($t =$value[$k])
                    @else
                        @php($s= 'assigned-'. $k)
                        @php($t =isset($value[$k]) ? $value[$k] : '' )
                    @endif
                    <a href="#">
                        <input type="hidden" id="{{$field}}-{{$k}}" name="{{$field}}-{{$k}}" value="{{$t}}">
                        <span class="flag-icon {{$v}} {{$ac ? 'flag-icon-grayed'  : '' }}"></span>
                    </a>
                    @php($ac=true)
                @endforeach
            </div>
        @endif

    </div>
</div>
