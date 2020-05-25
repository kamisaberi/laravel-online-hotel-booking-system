<div class="col s12  m2 l2" id="container-{{$data->id}}">
    <div class="card small">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator"
                 src="{{isset($data->properties['path']->small) ?  $data->properties['path']->small : isset($data->properties['path']->title) ? $data->properties['path']->title : ''  }}"
                 alt="office">
        </div>

        <div class="card-action">
            @can($permissions['destroy'])
                <button id="del-{{$data->id}}" class="btn-floating btn-small waves-effect waves-light red left">
                    <i class="material-icons">delete</i>
                </button>
            @endcan
            @can($permissions['edit'])
                <a class="btn-floating btn-small waves-effect waves-light amber"
                   href="{{$data->urls['edit']}}">
                    <i class="material-icons">edit</i>
                </a>
            @endcan
        </div>

    </div>
</div>
