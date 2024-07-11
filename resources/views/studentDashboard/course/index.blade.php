<div class="container">
    <h2 class="text-center mt-4">Our Popular Courses</h2>

    @include('studentDashboard.course.component.filter')
    <div class="container courses__container mt-4">
        @php
            $paidCourseIds = [];
            foreach ($cartItems as $cartItem) {
                if ($cartItem->status == 'paid') {
                    $paidCourseIds[] = (int) $cartItem->course_id;
                }
            }
        @endphp

        <div style="display: none;">
            <h3>Paid Course IDs:</h3>
            <pre>{{ print_r($paidCourseIds) }}</pre>
        </div>

        @foreach($courses as $course)
            @php
                $courseId = (int) $course->id;
                $isPaid = in_array($courseId, $paidCourseIds);
            @endphp

            @if(!$isPaid && $course->publish != 1)
                <article class="course" data-id="{{ $course->id }}">
                    <div class="course_-image">
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" height="150">
                        @else
                            <img src="path/to/default/image.jpg" alt="Default Image">
                        @endif
                    </div>
                    <div class="course__info">
                        <h4>{{ $course->title }}</h4>
                        <p class="description">
                            <span class="short-text">{{ Str::limit($course->description, 10) }}</span>
                            <span class="more-text">{{ $course->description }}</span>
                            <a href="#" class="read-more">Read more</a>
                        </p>
                        <h4>{{ number_format($course->price, 2) }} vnd</h4>
                        <a href="{{ route('cart.add', $course->id) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </article>
            @endif
        @endforeach
    </div>
</div>

<div class="pagination">
    {{ $courses->links('pagination::bootstrap-4') }}
</div>


