@php
    $cardImage = $imagePath ?? $product->image_path;
    $cardFlag = $flagLabel ?? ($product->is_featured ? 'Best seller' : 'New arrival');
@endphp
<article class="product-card" data-category="{{ strtolower($product->category) }}" data-concern="{{ strtolower($product->concern) }}">
    <a class="product-image-link" href="{{ route('products.show', $product) }}" aria-label="View {{ $product->name }}">
        <img class="product-image" src="{{ asset('images/'.$cardImage) }}" alt="{{ $product->name }}" loading="lazy" width="440" height="446">
        <span class="product-concern">{{ $product->concern }}</span>
        @if ($product->compare_at_price && $product->compare_at_price > $product->price)
            <span class="sale-sticker" aria-label="Demo offer"><img src="{{ asset('images/home/products/sale-sticker.png') }}" alt=""><span>SALE</span></span>
        @endif
        @if ($product->is_featured)
            <span class="product-flag">{{ $cardFlag }}</span>
        @else
            <span class="product-flag">{{ $cardFlag }}</span>
        @endif
    </a>
    <div class="product-card-body">
        <div class="rating" aria-label="Demo rating {{ number_format((float) $product->rating, 1) }} out of 5">
            <span aria-hidden="true">★★★★★</span>
            <span class="review-count">({{ number_format($product->review_count) }})</span>
        </div>
        <a class="product-name" href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
        <div class="product-price">
            @if ($product->compare_at_price && $product->compare_at_price > $product->price)
                <s>Rs. {{ number_format($product->compare_at_price) }}</s>
            @endif
            <strong>Rs. {{ number_format($product->price) }}</strong>
            @if ($product->compare_at_price && $product->compare_at_price > $product->price)
                <span class="discount-pill">{{ (int) round((1 - $product->price / $product->compare_at_price) * 100) }}% off</span>
            @endif
        </div>
        <form action="{{ route('cart.store', $product) }}" method="post">
            @csrf
            <button class="button button-primary add-to-cart" type="submit">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M5 8h14l1 12H4L5 8Z"></path><path d="M9 8V6a3 3 0 0 1 6 0v2"></path></svg>
                Add to cart
            </button>
        </form>
    </div>
</article>
