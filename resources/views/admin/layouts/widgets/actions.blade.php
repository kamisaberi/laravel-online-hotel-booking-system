@can($permissions['edit'])
    <a href="{{route('items.edit',['type'=>$type, 'id'=>$data->id])}}"
       class="primary edit mr-1">
        <i class="fa fa-pencil"></i>
    </a>
@endcan
@can($permissions['show'])
    <a href="{{route('items.show',['type'=>$type, 'id'=>$data->id])}}"
       class="primary show mr-1">
        <i class="fa fa-eye"></i>
    </a>
@endcan
@can($permissions['destroy'])
    <a class="danger delete mr-1"
       id="del-{{$data->id}}">
        <i class="fa fa-trash-o"></i>
    </a>
@endcan
