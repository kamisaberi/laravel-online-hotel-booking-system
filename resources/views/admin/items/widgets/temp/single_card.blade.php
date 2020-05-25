<div class="col s12 m6 l6">
    <div class="card horizontal">
        <div class="card-stacked">
            <div class="card-content">

                @foreach($data->properties as $k=>$v)
                    @if($v->level == 1 && $v->input_type == 'text')
                        <div class="row">
                            <div class="col s12">
                                <span>
                                    @if(isset($v->title))
                                        {{$v->title}}
                                    @else
                                        <p>&nbsp</p>
                                    @endif
                                </span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>


{{--            @include('admin.items.widgets.service')--}}

            <div class="card-action">
                @can($permissions['edit'])
                    <a class="btn-floating btn-small waves-effect waves-light amber left"
                       href="{{$data->urls['edit']}}">
                        <i class="material-icons">edit</i>
                    </a>
                @endcan
                @can( (isset($permissions['change']) ? $permissions['change'] : '') )
                    <div class="switch right">
                        <label>
                            فعال
                            @if( isset($data->properties['available'])==true and $data->properties['available']->title== 1)
                                <input id="active-{{$data->id}}" type="checkbox" checked>
                            @else
                                <input id="active-{{$data->id}}" type="checkbox">
                            @endif
                            <span class="lever"></span>

                            غیر فعال
                        </label>
                    </div>
                @endcan

            </div>
        </div>
    </div>
</div>
