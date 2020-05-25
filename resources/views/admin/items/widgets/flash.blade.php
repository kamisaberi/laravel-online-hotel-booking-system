<div class="col-md-3 col-12" id="card-{{$data->id}}" style="min-height:360px; ">
    <figure class="effect-zoe" style="min-height: 240px;">
        <img class="img-fluid" width="480" src="{{asset('uploads/room-020.jpg')}}" alt="Card image cap">
        <figcaption>
            <h2>
                <span>
                    {{$data->title}}
                </span>

            </h2>
            <p class="icon-links">
                @can($permissions['show'])
                    <a href="#" class="mr-1"><i class="ft-eye"></i></a>
                @endcan
                @can($permissions['edit'])
                    @isset($data->urls['edit'])
                        <a href="{{$data->urls['edit']}}" class="mr-1"><i class="ft-edit"></i></a>
                    @endisset
                @endcan
                @can($permissions['destroy'])
                    @isset($urls['destroy'])
                        <a id="del-{{$data->id}}" href="#" class="mr-1"><i class="ft-delete"></i></a>
                    @endisset
                @endcan
            </p>
            <p class="description">
                این یک تست است
            </p>
        </figcaption>
    </figure>
</div>
