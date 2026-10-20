@extends('layouts.storefront')

@section('title', 'Your cart')

@section('content')
    <section class="cart-page page-shell">
        <div class="section-heading cart-heading"><p class="eyebrow">Your selection</p><h1>Shopping cart</h1><p>{{ $cartCount }} {{ Str::plural('item', $cartCount) }}</p></div>
        @if ($items->isEmpty())
            <div class="empty-state">
                <h2>Your cart is ready for something good.</h2>
                <p>Browse the preview collection and add an item to get started.</p>
                <a class="button button-primary" href="{{ route('products.index') }}">Shop all products</a>
            </div>
        @else
            <div class="cart-layout">
                <div class="cart-items">
                    @foreach ($items as $item)
                        @php($product = $item['product'])
                        <article class="cart-item">
                            <a href="{{ route('products.show', $product) }}"><img src="{{ asset('images/'.$product->image_path) }}" alt="{{ $product->name }}" width="440" height="446"></a>
                            <div class="cart-item-copy">
                                <a class="product-name" href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                <span>{{ $product->category }}</span>
                                <strong>Rs. {{ number_format($product->price) }}</strong>
                            </div>
                            <form class="quantity-form" action="{{ route('cart.update', $product) }}" method="post">
                                @csrf @method('PATCH')
                                <label for="quantity-{{ $product->id }}">Qty</label>
                                <input id="quantity-{{ $product->id }}" type="number" name="quantity" min="1" max="99" value="{{ $item['quantity'] }}">
                                <button class="text-button" type="submit">Update</button>
                            </form>
                            <form action="{{ route('cart.destroy', $product) }}" method="post">
                                @csrf @method('DELETE')
                                <button class="text-button remove-button" type="submit">Remove</button>
                            </form>
                        </article>
                    @endforeach
                </div>
                <aside class="cart-summary" aria-labelledby="summary-heading">
                    <h2 id="summary-heading">Order summary</h2>
                    <div><span>Subtotal</span><strong>Rs. {{ number_format($subtotal) }}</strong></div>
                    <p>Shipping and payment are not calculated in this preview.</p>
                    <button class="button button-primary" type="button" disabled>Checkout unavailable</button>
                    <a class="continue-link" href="{{ route('products.index') }}">Continue shopping</a>
                </aside>
            </div>
        @endif
    </section>
@endsection
