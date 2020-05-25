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
            <th>زیر شاخه دارد ؟</th>
            <th>حداکثر تعداد آیتم ها</th>
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
                <td>{{$data->can_have_child}}</td>
                <td>{{$data->can_have_item}}</td>
                <td>
                    @can($permissions['edit'])
                        <a href="{{$data->urls['edit']}}" class="primary edit mr-1">
                            <i class="fa fa-pencil"></i>
                        </a>
                    @endcan
                    @can($permissions['destroy'])
                        <a class="danger delete mr-1">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    @endcan

                </td>
            </tr>

        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th>
            </th>

            <th>عنوان</th>
            <th>زیر شاخه دارد ؟</th>
            <th>حداکثر تعداد آیتم ها</th>
            <th>عملیات</th>
        </tr>
    </tfoot>

</table>
