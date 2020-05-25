<div class="col-md-3 col-12" id="card-{{$data->id}}" style="min-height:360px; ">
    <figure class="effect-zoe" style="min-height: 240px;">

        @if(isset($data->properties[2]))
            @foreach($data->properties[2] as $p)
                @if(isset($p->assigned))
                    @if(is_array($p->assigned))
                        <img class="img-fluid" width="480" src="{{asset('uploads/room-020.jpg')}}" alt="Card image cap">
                    @else
                        @if(isset($p->thumbs['480x360']))
                            <img class="img-fluid" width="480" src="{{$p->thumbs['480x360']}}" alt="Card image cap">
                        @elseif(isset($p->assigned))
                            <img class="img-fluid" width="480" src="{{$p->assigned}}" alt="Card image cap">
                        @else
                            <img class="img-fluid" width="480" src="{{asset('uploads/room-020.jpg')}}" alt="Card image cap">
                        @endif
                    @endif
                @else
                    <img class="img-fluid" width="480" src="{{asset('uploads/room-020.jpg')}}" alt="Card image cap">
                @endif
            @endforeach
        @endif


        <figcaption>
            <h2>

                <span>
                    @if(isset($data->properties[1]))
                        @foreach($data->properties[1] as $p)
                            {{$p->assigned}}
                        @endforeach
                    @endif
                    {{--                    {{isset($data->properties['title']->title ) ? $data->properties['title']->title : ''}} --}}
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
                @if(isset($data->properties[3]))
                    @foreach($data->properties[3] as $p)
                        {{$p->assigned}}
                    @endforeach
                @endif
            </p>
        </figcaption>
    </figure>
</div>
