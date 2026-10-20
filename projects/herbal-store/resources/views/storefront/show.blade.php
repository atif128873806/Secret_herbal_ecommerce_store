@extends('layouts.storefront')

@section('title', $product->name)

@section('content')
    <div class="breadcrumbs page-shell"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><a href="{{ route('products.index') }}">All products</a><span aria-hidden="true">/</span><span>{{ $product->name }}</span></div>
    <section class="product-detail page-shell">
        <div class="detail-image-wrap">
            <img src="{{ asset('images/'.$product->image_path) }}" alt="{{ $product->name }}" width="440" height="446">
            <span class="demo-label">Demo catalog item</span>
        </div>
        <div class="detail-copy">
            <p class="eyebrow">{{ $product->category }} · {{ $product->concern }}</p>
            <h1>{{ $product->name }}</h1>
            <p class="detail-rating"><span aria-hidden="true">★★★★★</span> <span>({{ number_format($product->review_count) }} demo reviews)</span></p>
            <div class="product-price detail-price">
                @if ($product->compare_at_price && $product->compare_at_price > $product->price)
                    <s>Rs. {{ number_format($product->compare_at_price) }}</s>
                @endif
                <strong>Rs. {{ number_format($product->price) }}</strong>
            </div>
            <p class="demo-disclaimer">This is preview content from the supplied Figma design. Confirm the Herbal product name, ingredients, claims, and price before publishing.</p>
            <p class="detail-description">{{ $product->description }}</p>
            <form action="{{ route('cart.store', $product) }}" method="post" class="detail-add-form">
                @csrf
                <label for="quantity">Quantity</label>
                <input id="quantity" type="number" name="quantity" value="1" min="1" max="99">
                <button class="button button-primary" type="submit">Add to cart</button>
            </form>
        </div>
    </section>

    @if ($relatedProducts->isNotEmpty())
        <section class="related-section page-shell" aria-labelledby="related-heading">
            <div class="section-heading"><p class="eyebrow">Keep exploring</p><h2 id="related-heading">More from the collection</h2></div>
            <div class="product-grid">
                @foreach ($relatedProducts as $relatedProduct)
                    @include('partials.product-card', ['product' => $relatedProduct])
                @endforeach
            </div>
        </section>
    @endif
@endsection
