<div class="col s12 m4">
    <div class="card">
        <div class="card-content">
                <span class="card-title">
                    {{$data->properties['title']->value}}
                </span>
            <p>
                {{isset($data->properties['excerpt']->value) ? $data->properties['excerpt']->value : ''}}
{{--                {{$data->properties['excerpt']->value}}--}}
            </p>
        </div>
        <div class="card-action">
            <a href="{{route('home.data' , ['type'=>'news' , 'id'=>$data->id])}}">ادامه...</a>
        </div>
    </div>
</div>

