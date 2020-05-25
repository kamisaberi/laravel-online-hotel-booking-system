<div class="col s12 m4 l4" id="container-{{$data->id}}">
    <div class="card small">
        <div class="card-image waves-effect waves-block waves-light">
            <p>
                {{$data->properties['title']->title}}
            </p>

            <img class="activator"
                 src="{{isset($data->properties['slide-images']->slides[0]) ?  $data->properties['slide-images']->slides[0] : '' }}"
                 alt="office">
        </div>


        <div class="card-action">


            @can($permissions['destroy'])
                <button id="del-{{$data->id}}" class="btn-floating btn-small waves-effect waves-light red left">
                    <i class="material-icons">delete</i>
                </button>

                {{--<button id="del-{{$data->id}}" class="btn red left">{{ __('messages.operations')['delete']}}</button>--}}
            @endcan

            @can($permissions['edit'])
                <a class="btn-floating btn-small waves-effect waves-light amber"
                   href="{{$data->urls['edit']}}">
                    <i class="material-icons">edit</i>
                </a>
                {{--<a href="{{route('documents.edit' , ['type'=>$type , 'id'=>$data->id])}}">{{ __('messages.operations')['edit']}}</a>--}}
            @endcan

        </div>

    </div>
</div>
