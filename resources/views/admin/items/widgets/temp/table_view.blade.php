<table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
    <thead>
        <tr>
            <th><input type="checkbox" class="input-chk" id="check-all" onclick="toggle();"></th>

            @if(count($datas) >0)
                @foreach($datas[0]->properties[1] as $v)
                    <th>
                        {{$v->title}}
                    </th>
                @endforeach
            @endif
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $data)
            <tr>

                <td>
                    <input type="checkbox" class="input-chk check">
                </td>


                @foreach($data->properties[1] as $k=>$v)
                    <td class="text-center text-truncate">
                        @if($v->input_type== 'date')
                            {{$v->assigned['ja']}}
                        @else
                            @if(isset($v->assigned))
                                @if($type->title == 'reserve' &&  $v->title == 'situation')
                                    {{__('messages.service_situations.' . $v->assigned)}}
                                @else
                                    {{$v->assigned}}
                                @endif
                            @else
                                <p>-</p>
                            @endif
                        @endif

                    </td>
                @endforeach


                <td>


                    @foreach($data->properties as $group)
                        @foreach($group as $property)
                            @if(isset($property->actions[0]['name']))
                                @can($permissions['show'])
                                    <a href="#" data-backdrop="true" data-toggle="modal" data-target="#mdl-reserve-actions"
                                       onclick="$('#mdl-reserve-actions input[name=mdl-download-info-url]').val('{{$data->urls['show']}}');
                                               $('#mdl-reserve-actions input[name=mdl-actions]').val('name:{{$property->actions[0]['name']}},action_style:{{$property->actions[0]['action_style']}}');
                                               $('#mdl-reserve-actions input[name=mdl-update-url]').val('{{$data->urls['update']}}');"
                                       class="purple edit mr-1">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan
                            @endif
                        @endforeach
                    @endforeach



                    @isset($data->urls['edit'])
                        @can($permissions['edit'])
                            <a href="{{$data->urls['edit']}}" class="primary edit mr-1">
                                <i class="fa fa-pencil"></i>
                            </a>
                        @endcan
                    @endisset

                    @isset($actions['show'])
                        @isset($data->urls['show'])
                            @can($permissions['show'])
                                <a href="{{$data->urls['show']}}" class="primary show mr-1">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endcan
                        @endisset
                    @endisset




                    @isset($urls['destroy'])
                        @can($permissions['destroy'])
                            <a class="danger delete mr-1" id="del-{{$data->id}}">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        @endcan
                    @endisset

                    @php($show_voucher= false)
                    @if($type->title == 'reserve')
                        @foreach($data->properties[1] as $k=>$v)
                            @if($v->title =="situation" && ($v->assigned== 7 ||$v->assigned== 9))
                                @php($show_voucher= true)
                            @endif
                        @endforeach
                        @if($show_voucher == true)
                            @foreach($data->properties[1] as $k=>$v)
                                @if($v->title =="code")
                                    <a class="danger delete mr-1" href="{{route('home.voucher.print', ['code'=>$v->assigned])}}" target="_blank">
                                        <i class="fa fa-download"></i>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endif

                    @php($show_check= false)
                    @if($type->title == 'reserve')
                        @foreach($data->properties[1] as $k=>$v)
                            @if($v->title =="situation" && $v->assigned== 7 )
                                @php($show_check= true)
                            @endif
                        @endforeach
                        @if($show_check == true)
                            @foreach($data->properties[2] as $k=>$v)
                                @if($v->title =="check")
                                    <a class="primary mr-1" href="" data-toggle="modal" data-target="#mdl-show-check" data-backdrop="true" title="فیش پرداختی"
                                       onclick="$('#mdl-show-check .modal-body img').attr('src','{{$v->assigned}}')">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endif


                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            @if(count($datas) >0)
                @foreach($datas[0]->properties[1] as $v)
                    <th>
                        {{$v->title}}
                    </th>
                @endforeach
            @endif

            <th>Actions</th>
        </tr>
    </tfoot>
</table>

