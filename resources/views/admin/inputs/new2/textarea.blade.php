@if ($locales == true)
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
        <label for="{{$field}}">{{$field}}</label>
        @if ($locales == true)
            <textarea id="{{$field}}" rows="5" placeholder="{{$field}}" class="form-control" name="{{$field}}">{{$value[$base_locale]}}</textarea>
        @else
            <textarea id="{{$field}}" rows="5" placeholder="{{$field}}" class="form-control" name="{{$field}}">{{$value}}</textarea>
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
