<div class="container">
    <h2>Add Funds</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('add.funds') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Funds</button>
        <a href="{{ route('cart.index') }}" class="btn-custom">Back to cart</a>
    </form>
</div>
