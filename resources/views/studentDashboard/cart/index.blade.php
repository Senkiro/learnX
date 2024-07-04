<style>
        .cart-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
        .cart-item .details {
            flex: 1;
            margin-left: 10px;
        }
        .cart-item .details h4 {
            margin: 0;
            font-size: 16px;
        }
        .cart-item .details p {
            margin: 0;
            color: #666;
        }
        .cart-item .details .status {
            color: #888;
            font-size: 14px;
        }
        .cart-item .actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .cart-item .actions button {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 18px;
        }
        .cart-summary {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .cart-summary h4 {
            margin: 0;
            font-size: 18px;
        }
        .cart-summary .total {
            font-size: 24px;
            color: #28a745;
        }
        .balance {
            font-size: 18px;
            margin-bottom: 20px;
            color: #007bff;
        }
    </style>
</head>
<body>
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
                    <p>${{ $item->course->price }}</p>
                </div>
                <div class="actions">
                    <button onclick="window.location='{{ route('cart.remove', $item->course_id) }}'">x</button>
                </div>
            </div>
        @endforeach

        <div class="cart-summary">

{{--                            @php--}}
{{--                            dd($cartItems)--}}
{{--                            @endphp--}}
            <h4>Total:</h4>
            <div class="total">
                {{ $total }}vnd
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
            <button type="submit" class="btn btn-primary">Pay with VnPay</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
