<table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
    <thead>
        <tr>
            <th class="background-image-none center-align">
                <label>
                    <input onClick="toggle(this)" type="checkbox"/>
                    <span></span>
                </label>
            </th>
            <th>عنوان</th>
            <th>نوع ورودی</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>


        @foreach($datas as $data)

            <tr>
                <td class="center-align">
                    <label>
                        <input name="foo" type="checkbox"/>
                        <span></span>
                    </label>
                </td>
                <td>{{isset($data->locales[app()->getLocale()])?$data->locales[app()->getLocale()]:$data->title}}</td>
                <td>{{$data->input_type}}</td>
                <td>

                    @foreach($data->actions as $action)

                        @if($action['name'] == 'edit')
                            @can($permissions['edit'])
                                <a href="{{$data->urls['edit']}}" class="primary edit mr-1">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            @endcan

                        @elseif($action['name'] == 'destroy')
                            @can($permissions['destroy'])
                                <a class="danger delete mr-1" id="del-{{$data->id}}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            @endcan

                        @elseif($action['name'] == 'translations')
                            <a href="#" class="info edit mr-1" data-backdrop="true" data-toggle="modal" data-target="#mdl-property-translations"
                               onclick="$('#mdl-property-translations input[name=data-content]').val('action=={{$data->urls['update']}}||fa:{{isset($data->locales["fa"]) ? $data->locales["fa"] : ''}},en:{{isset($data->locales["en"]) ? $data->locales["en"] : ''}},ar:{{isset($data->locales["ar"]) ? $data->locales["ar"] : ''}}');">
                                <i class="ft-globe"></i>
                            </a>

                        @endif

                    @endforeach

                    {{--                    @if(isset($data->actions['translations']))--}}
                    {{--                        <a href="#" class="info edit mr-1" data-backdrop="true" data-toggle="modal" data-target="#mdl-property-translations"--}}
                    {{--                           onclick="$('#mdl-property-translations input[name=data-content]').val('action=={{$data->urls['update']}}||fa:{{$data->locales["fa"]}},en:{{$data->locales["en"]}},ar:{{$data->locales["ar"]}}');"--}}
                    {{--                        >--}}
                    {{--                            <i class="ft-globe"></i>--}}
                    {{--                        </a>--}}
                    {{--                    @endif--}}


                    {{--                    @if(isset($data->actions['edit']))--}}
                    {{--                        @can($permissions['edit'])--}}
                    {{--                            <a href="{{$data->urls['edit']}}" class="primary edit mr-1">--}}
                    {{--                                <i class="fa fa-pencil"></i>--}}
                    {{--                            </a>--}}
                    {{--                        @endcan--}}
                    {{--                    @endif--}}
                    {{--                    @if(isset($data->actions['destroy']))--}}
                    {{--                        @can($permissions['destroy'])--}}
                    {{--                            <a class="danger delete mr-1">--}}
                    {{--                                <i class="fa fa-trash-o"></i>--}}
                    {{--                            </a>--}}
                    {{--                        @endcan--}}
                    {{--                    @endif--}}


                </td>
            </tr>

        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th>
            </th>
            <th>عنوان</th>
            <th>نوع ورودی</th>
            <th>عملیات</th>
        </tr>
    </tfoot>
</table>
