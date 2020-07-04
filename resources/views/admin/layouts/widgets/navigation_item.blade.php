@if($navigation->link_type == "route")

    @if(isset($navigation->properties->key) and  isset($navigation->properties->value) )
{{--        {{ $navigation->properties->route . ":" . $navigation->properties->value }}--}}
{{--        <br>--}}


        @can($navigation->properties->route . ":" . $navigation->properties->value)
{{--            {{ $navigation->properties->key . ":" . $navigation->properties->value }}--}}
            <li class=" nav-item {{isset($navigation->active) &&  $navigation->active ? 'active' : ''}}">
                <a href="{{route($navigation->properties->route, [$navigation->properties->key=>$navigation->properties->value])}}">
                    @if($show_icon == true)
                        <i class="ft-printer"></i>
                    @endif
                    <span class="menu-title" data-i18n="">
                    {{$navigation->properties->title }}
                </span>
                </a>
            </li>
        @endcan
    @else
        @can($navigation->properties->route)
            <li class=" nav-item {{isset($navigation->active) &&  $navigation->active ? 'active' : ''}}">
                <a href="{{route($navigation->properties->route)}}">
                    @if($show_icon == true)
                        <i class="ft-printer"></i>
                    @endif

                    <span class="menu-title" data-i18n="">
                    {{$navigation->properties->title }}
                </span>
                </a>
            </li>
        @endcan
    @endif
@elseif($navigation->link_type == "url")
    <li class=" nav-item {{isset($navigation->active) &&  $navigation->active ? 'active' : ''}}">
        <a href="{{$navigation->properties->url}}">
            @if($show_icon == true)
                <i class="ft-printer"></i>
            @endif
            <span class="menu-title" data-i18n="">
                    {{$navigation->properties->title }}
                </span>
        </a>
    </li>
@endif

