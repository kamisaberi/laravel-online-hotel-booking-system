<div class="col-xl-3 col-md-6 col-sm-12" id="cord-{{$data->id}}">
    <div class="card">
        <div class="card-content">
            <div class="card-body">

                <h4 class="card-title text-truncate">
                    {{$data->title}}
                </h4>

                <h6 class="card-subtitle text-muted text-truncate">
                    {{$data->description}}
                </h6>
            </div>
            <img class="img-fluid" src="{{asset('uploads/480x360/room-010.jpg')}}" alt="Card image cap">

            <div class="card-body">
                <div class="row">


                    {{--                    @foreach($data->properties[4] as $p)--}}
                    {{--                        @if(isset($p->fillation_rules['action']) && $p->fillation_rules['action'] != "" )--}}
                    {{--                            @if($p->fillation_rules['type']== 'switch')--}}
                    {{--                                --}}{{--                                @include('admin.inputs.new.switch', ['property'=> $p])--}}
                    {{--                            @elseif($p->fillation_rules['type']== 'a')--}}
                    {{--                                <div class="col">--}}


                    {{--                                    <a href="#" data-backdrop="true" data-toggle="modal" data-target="#mdl-{{$p->title}}"--}}
                    {{--                                       data-content="{{isset($p->assigned) && isset($p->fillation_rules['display_history_at_modal']) ? $p->assigned : ''}}"--}}
                    {{--                                       onclick="$('#mdl-{{$p->title}} > input[type=hidden]').val('assigned=={{is_array($p->assigned) ? '' : $p->assigned}}|action=={{isset($p->url)?$p->url:$data->urls['update']}}|display_history_at_modal=={{isset($p->fillation_rules['display_history_at_modal']) ? 1 : 0}}');"--}}
                    {{--                                       class="card-link danger ">--}}
                    {{--                                        @if(isset($p->fillation_rules['action_icon']))--}}
                    {{--                                            <i class="{{$p->fillation_rules['action_icon']}}"></i>--}}
                    {{--                                        @else--}}
                    {{--                                            <i class="ft-activity"></i>--}}
                    {{--                                        @endif--}}
                    {{--                                    </a>--}}


                    {{--                                </div>--}}
                    {{--                            @endif--}}
                    {{--                        @endif--}}
                    {{--                    @endforeach--}}


                    <div class="col">
                        @can($permissions['edit'])
                            {{--                            @isset($data->urls['edit'])--}}
                            {{--                                <a href="{{$data->urls['edit']}}" class="card-link pink float-right"><i class="ft-edit"></i></a>--}}
                            <a href="{{route('items.edit', ['type'=>$type, 'id'=>$data->id])}}" class="card-link pink float-right"><i class="ft-edit"></i></a>
                            {{--                            @endisset--}}
                        @endcan
                        @can($permissions['destroy'])
                            @isset($urls['destroy'])
                                <a id="del-{{$data->id}}" href="{{$urls['destroy']}}" class="card-link pink float-right"><i class="ft-delete"></i></a>
                            @endisset
                        @endcan
                    </div>
                </div>
                {{--                <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>--}}


            </div>
        </div>
    </div>
</div>
