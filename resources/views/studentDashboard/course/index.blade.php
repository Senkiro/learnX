<h2 class="text-center mt-4">Our Popular Courses</h2>

@include('studentDashboard.course.component.filter')

<div class="container courses__container mt-4">
    @foreach($courses as $course)
        @if($course->publish != 1)
            <article class="course">
                <div class="course_-image">
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" height="200px">
                    @else
                        <img src="path/to/default/image.jpg" alt="Default Image">
                    @endif
                </div>
                <div class="course__info">
                    <h4>{{ $course->title }}</h4>
                    <p>{{ $course->description }}</p>
                    <h4>{{ number_format($course->price, 2) }} $</h4>
                    <a href="" class="btn btn-primary">Add Course</a>
                </div>
            </article>
        @endif
    @endforeach
</div>

<div class="pagination">
    {{ $courses->links('pagination::bootstrap-4') }}
</div>
