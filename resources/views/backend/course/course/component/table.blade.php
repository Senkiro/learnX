<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" id="checkAll" value="" class="input-checkbox">
        </th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Ảnh</th>
        <th class="text-center">Tình Trạng</th>
        <th class="text-center">Thao Tác</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($courses) && $courses->count() > 0)
        @foreach($courses as $course)

            <tr>
                <td>
                    <input type="checkbox" id="userCheckbox" value="{{$course->id}}" class="input-checkbox checkBoxItem">
                </td>
                <td>{{ $course->title }}</td>
                <td>{{\Illuminate\Support\Str::limit($course->description, 50) }}</td>
                <td>{{ number_format($course->price, 2) }} $</td>

                <td>
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" width="100%" height="50px">
                    @endif
                </td>
                <td class="text-center js-switch-{{$course->id}}">
                    <input type="checkbox" value="{{$course->publish}}" class="js-switch status" data-field="publish" data-model="Course"
                           {{($course->publish == 2) ? 'checked' : ''}} data-modelId="{{$course->id}}"/>
                </td>
                <td class="text-center">
                    <a href="{{route('course.edit',$course->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{route('course.delete',$course->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" class="text-center">No courses found</td>
        </tr>
    @endif
    </tbody>
</table>

{{ $courses->links('pagination::bootstrap-4') }}
