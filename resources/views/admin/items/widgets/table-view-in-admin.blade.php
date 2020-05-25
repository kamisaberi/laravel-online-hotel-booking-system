<table id="recent-orders" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
    <thead>
        <tr>
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
{{--            {{dd($data)}}--}}
            <tr>
                @foreach($data->properties[1] as $k=>$v)
                    <td class="text-center text-truncate">
                        @if($v->input_type== 'date')
                            {{$v->assigned['ja']}}
                        @else
                            @if(isset($v->assigned))
                                @if($service_type->title == 'reserve' &&  $v->title == 'situation')
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
                                <a href="#" data-backdrop="true" data-toggle="modal" data-target="#mdl-reserve-actions"
                                   onclick="$('#mdl-reserve-actions input[name=mdl-download-info-url]').val('{{$data->urls['show']}}');
                                           $('#mdl-reserve-actions input[name=mdl-actions]').val('name:{{$property->actions[0]['name']}},action_style:{{$property->actions[0]['action_style']}}');
                                           $('#mdl-reserve-actions input[name=mdl-update-url]').val('{{$data->urls['update']}}');"
                                   class="purple edit mr-1">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif



                        @endforeach
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
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

