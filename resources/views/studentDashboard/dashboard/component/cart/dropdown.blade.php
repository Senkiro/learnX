<div class="container cart-container">
    <h1>Your Shopping Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if($cartItems && count($cartItems) > 0)
        <div class="balance">
            Your Balance: ${{ $balance }}
        </div>
        @foreach($cartItems as $item)
            <div class="cart-item">
                <img src="{{ $item->course->image ? asset('storage/' . $item->course->image) : 'path/to/default/image.jpg' }}" alt="{{ $item->course->title }}">
                <div class="details">
                    <h4>{{ $item->course->title }}</h4>
                    <p>${{ $item->course->price }}</p>
                    <p class="status">Status: {{ $item->status }}</p>
                </div>
                <div class="actions">
                    <button onclick="window.location='{{ route('cart.remove', $item->course_id) }}'">x</button>
                </div>
            </div>
        @endforeach

        <div class="cart-summary">
            <h4>Total:</h4>
            <div class="total">
                ${{ $total }}
            </div>
        </div>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="total" value="{{ $total }}">
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
