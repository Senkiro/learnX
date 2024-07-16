<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-checkbox">
        </th>
        <th>Họ Tên</th>
        <th>Email</th>
        <th>Số Điện Thoại</th>
        <th>Địa chỉ</th>
        <th>Role</th>
        <th class="text-center">Tình Trạng</th>
        <th class="text-center">Thao Tác</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($users) && $users->count())
        @foreach($users as $user)
            <tr>
{{--                @php--}}
{{--                dd($user->role)--}}
{{--                @endphp--}}
                <td>
                    <input type="checkbox" id="userCheckbox" value="{{$user->id}}" class="input-checkbox checkBoxItem">
                </td>
                <td>
                    {{$user->name ?? 'N/A'}}
                </td>
                <td>
                    {{$user->email ?? 'N/A'}}
                </td>
                <td>
                    {{$user->phone ?? 'N/A'}}
                </td>
                <td>
                    {{$user->address ?? 'N/A'}}
                </td>
                <td>
                    {{$user->role->name ?? 'N/A'}}
                </td>
                <td class="text-center js-switch-{{$user->id}}">
                    <input type="checkbox" data-href="{{route('ajax.dashboard.changeStatus')}}" value="{{$user->publish}}" class="js-switch status" data-field="publish" data-model="User" role="{{$user->role->name}}"
                           {{($user->publish == 2) ? 'checked' : ''}} data-modelId="{{$user->id}}"/>
                </td>
                <td class="text-center">
                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="8" class="text-center">No users found</td>
        </tr>
    @endif
    </tbody>
</table>

{{ $users->links('pagination::bootstrap-4') }}
