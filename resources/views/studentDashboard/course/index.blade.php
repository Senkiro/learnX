<style>
    .course {
        margin-bottom: 20px;
    }
    .cart-container {
        position: fixed;
        top: 0;
        right: 0;
        width: 300px;
        height: 100%;
        background-color: #fff;
        box-shadow: -2px 0 5px rgba(0,0,0,0.5);
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
        z-index: 1000;
    }
    .cart-container.active {
        transform: translateX(0);
    }
    .cart-header, .cart-item, .cart-footer {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    .cart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .cart-item img {
        width: 50px;
        height: 50px;
    }
    .cart-footer {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
    }
    .checkout-btn {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }
    .description {
        position: relative;
    }
    .description .more-text {
        display: none;
    }
</style>

<div class="container">
    <h2 class="text-center mt-4">Our Popular Courses</h2>

    @include('studentDashboard.course.component.filter')
    <div class="container courses__container mt-4">
        @foreach($courses as $course)
            @if($course->publish != 1)
                <article class="course" data-id="{{ $course->id }}">
                    <div class="course_-image">
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" height="200px">
                        @else
                            <img src="path/to/default/image.jpg" alt="Default Image">
                        @endif
                    </div>
                    <div class="course__info">
                        <h4>{{ $course->title }}</h4>
                        <p class="description">
                            <span class="short-text">{{ Str::limit($course->description, 100) }}</span>
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const readMoreLinks = document.querySelectorAll('.read-more');
        readMoreLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const description = link.closest('.description');
                const shortText = description.querySelector('.short-text');
                const moreText = description.querySelector('.more-text');

                if (moreText.style.display === 'none' || moreText.style.display === '') {
                    moreText.style.display = 'inline';
                    shortText.style.display = 'none';
                    link.textContent = 'Read less';
                } else {
                    moreText.style.display = 'none';
                    shortText.style.display = 'inline';
                    link.textContent = 'Read more';
                }
            });
        });

    });

</script>
