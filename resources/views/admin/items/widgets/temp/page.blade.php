<div class="col s12 m4 l4" id="container-{{$data->id}}">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <div class="row">
                <div class="col m6">
                    <p>شناسه:{{$data->id}}</p>
                </div>
                <div class="col m6">
                    <p>عنوان صفحه:{{$data->title}}</p>
                </div>
            </div>
        </div>
        <div class="card-action">
            @can("documents.edit" . ":". 'pages')

                <a class="btn-floating btn-small waves-effect waves-light amber"
                   href="{{route('documents.edit' , ['type'=>$data->title, 'id'=>$data->id])}}">
                    <i class="material-icons">edit</i>
                </a>


{{--                <a href="{{route('documents.edit' , ['type'=>$data->title, 'id'=>$data->id])}}">{{ __('messages.operations')['edit']}}</a>--}}


            @endcan
            @can("documents.destroy" . ":". 'pages')

                    <button id="del-{{$data->id}}" class="btn-floating btn-small waves-effect waves-light red ">
                        <i class="material-icons">delete</i>
                    </button>

                    {{--<button id="del-{{$data->id}}" class="btn red" >{{ __('messages.operations')['delete']}}</button>--}}


            @endcan



        </div>

    </div>
</div>
