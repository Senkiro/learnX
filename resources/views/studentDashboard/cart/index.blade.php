<div class="container">
    <h1>Your Shopping Cart</h1>
{{--    @if (session()->has('success'))--}}
{{--        $.toast({--}}
{{--        heading: '{{ session()->get('toast')['title'] ?? '' }}',--}}
{{--        text: '{{ session()->get('toast')['msg'] ?? '' }}',--}}
{{--        bgColor: '@if (session()->get('toast')['status'] == 'success') #22bab3 @else #f63c3c @endif',--}}
{{--        textColor: 'white',--}}
{{--        hideAfter: 10000,--}}
{{--        position: 'bottom-right',--}}
{{--        icon: '{{ session()->get('toast')['status'] }}'--}}
{{--        });--}}
{{--    @endif--}}
    @if(count($cartItems) > 0)
        <div class="balance">
            Your Balance: ${{ $balance }}
        </div>
        @php $total = 0; @endphp
        @foreach($cartItems as $item)
            @php $total += $item->course->price; @endphp
            <div class="cart-item">
                <img src="{{ $item->course->image ? asset('storage/' . $item->course->image) : 'path/to/default/image.jpg' }}" alt="{{ $item->course->title }}">
                <div class="details">
                    <h4>{{ $item->course->title }}</h4>
                    <p>${{ number_format($item->course->price, 2)  }}</p>
                </div>
                <div class="actions">
                    <button onclick="window.location='{{ route('cart.remove', $item->course_id) }}'">x</button>
                </div>
            </div>
        @endforeach

        <div class="cart-summary">
            <h4>Total:</h4>
            <div class="total">
                {{ number_format($total, 2) }}
            </div>
        </div>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="total" value="{{ $total }}">
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>

        <form action="{{ route('payment.create') }}" method="POST">
            @csrf
            <input type="hidden" name="total" value="{{ $total }}">
            <button type="submit" name="redirect" class="btn btn-primary">Pay with VnPay</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
    <a href="{{ route('student_dashboard.index') }}" class="btn-custom btn-danger">Back to Dashboard</a>
    <a href="{{ route('add.funds.form') }}" class="btn-custom">Add Funds</a>
</div>

<style>

    .balance {
        font-size: 1.2em;
        margin-bottom: 20px;
        text-align: right;
    }

    .cart-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }

    .cart-item img {
        width: 100px;
        height: 100px;
        border-radius: 8px;
        margin-right: 20px;
    }

    .details {
        flex-grow: 1;
    }

    .details h4 {
        margin: 0 0 10px;
        font-size: 1.2em;
    }

    .details p {
        margin: 0;
        color: #888;
    }

    .actions {
        margin-left: 20px;
    }

    .actions button {
        background-color: #f63c3c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    .actions button:hover {
        background-color: #c32f2f;
    }

    .cart-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
        border-top: 1px solid #ddd;
        margin-top: 20px;
    }

    .cart-summary h4 {
        font-size: 1.2em;
        margin: 0;
    }

    .total {
        font-size: 1.2em;
        color: #22bab3;
    }

    form {
        margin-top: 20px;
        text-align: center;
    }

    form .btn {
        background-color: #22bab3;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin: 0 10px;
    }

    form .btn:hover {
        background-color: #1a8a85;
    }

    .btn-custom {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px;
        text-decoration: none;
        color: #fff;
        background-color: #22bab3;
        border-radius: 5px;
        text-align: center;
    }

    .btn-custom.btn-danger {
        background-color: #f63c3c;
    }

    .btn-custom:hover {
        opacity: 0.8;
    }

</style>
