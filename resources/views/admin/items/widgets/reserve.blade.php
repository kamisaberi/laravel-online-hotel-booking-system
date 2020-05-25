<table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
    <thead>
        <tr>
            <th><input type="checkbox" class="input-chk" id="check-all" onclick="toggle();"></th>
            <th>
                code
            </th>
            <th>
                start date
            </th>
            <th>
                end date
            </th>

            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $data)
            <tr>
                <td>
                    <input type="checkbox" class="input-chk check">
                </td>
                <td>
                    {{$data->code}}
                </td>
                <td>
                    {{$data->start_date}}
                </td>
                <td>
                    {{$data->end_date}}
                </td>

                <td>

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

                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>
                code
            </th>
            <th>
                start date
            </th>
            <th>
                end date
            </th>

            <th>Actions</th>
        </tr>
    </tfoot>
</table>

