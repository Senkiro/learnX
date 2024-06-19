<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-checkbox">
        </th>
        <th>Tên nhóm thành viên</th>
        <th class="text-center">Số thành viên</th>
        <th>Mô tả</th>
        <th class="text-center">Tình Trạng</th>
        <th class="text-center">Thao Tác</th>
    </tr>
    </thead>
    <tbody>

    @if(isset($roles)&& is_object($roles))

        @foreach($roles as $role)
            <tr>
                <td>
                    <input type="checkbox" id="userCheckbox" value="{{$role->id}}" class="input-checkbox checkBoxItem">
                </td>
                <td>

                    {{$role -> name}}
                </td>
                <td>
                    {{$role->users_count}}
                </td>
                <td>
                    {{$role -> description}}
                </td>
                <td class="text-center js-switch-{{$role->id}}">
                    <input type="checkbox" value="{{$role->publish}}" class="js-switch status" data-field="publish" data-model="Role"
                           {{($role->publish == 2) ? 'checked' : ''}} data-modelId="{{$role->id}}"/>
                </td>
                <td class="text-center">
                    <a href="{{route('user.catalogue.edit',$role->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{route('user.catalogue.delete',$role->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

 {{ $roles->links('pagination::bootstrap-4') }}
