@extends("layouts.app")
@section('title', 'Cart')
@section('content')
    <div class="men">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="margin-bottom: 30px;">Your Cart</h2>

                    @if(session('error'))
                        <p style="color:red">{{ session('error') }}</p>
                    @endif

                    @if($cartItems->isEmpty())
                        <p>Your cart is empty. <a href="{{ route('products.list') }}">Continue shopping.</a></p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Summary</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        @php
                                            $primaryImage = $item->product->images->firstWhere('is_primary', true);
                                            $imagePath = $primaryImage->image_path ?? 'images/default.jpg';
                                        @endphp
                                        <img src="{{ asset($imagePath) }}" style="width:60px; height:60px; object-fit:cover;">
                                        {{ $item->product->name }}
                                    </td>
                                    <td>${{ number_format($item->product->discount ?? $item->product->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format(($item->product->discount ?? $item->product->price) * $item->quantity, 2) }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"><strong>Summary:</strong></td>
                                <td colspan="2"><strong>${{ number_format($total, 2) }}</strong></td>
                            </tr>
                            </tfoot>
                        </table>

                        <button type="button" class="button item_add" id="checkout-btn">Order</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#checkout-btn').on('click', function() {
            $.ajax({
                url: '/cart/checkout',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#cart-popup-message').text(response.message);
                    $('#cart-popup').fadeIn().delay(1870).fadeOut();
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 1700);
                }
            });
        });
    </script>

    <div id="cart-popup" style="display:none; position:fixed; bottom:30px; right:30px; background:#333; color:white; padding:15px 25px; border-radius:5px; z-index:9999;">
        <span id="cart-popup-message"></span>
    </div>
@endsection
