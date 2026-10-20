<section class="video-section page-shell" aria-labelledby="video-heading">
    <header class="section-heading">
        <h2 id="video-heading">Discover Favourites From Herbal 💛</h2>
        <p class="sample-content-label">Static video previews from the Figma design · no video files were supplied</p>
    </header>
    <div class="video-grid">
        @foreach ($videoProducts as $index => $product)
            @php($number = $index + 1)
            <article class="video-card">
                <button class="video-preview" type="button" data-video-preview data-image="{{ asset('images/home/videos/celebrity-0'.$number.'.png') }}" data-title="{{ $product->name }}" aria-label="Open static preview for {{ $product->name }}">
                    <img src="{{ asset('images/home/videos/celebrity-0'.$number.'.png') }}" alt="Static Figma video-poster sample for {{ $product->name }}" loading="lazy" width="318" height="426">
                    <span class="video-play" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z" fill="currentColor"/></svg></span>
                </button>
                <div class="video-product-meta">
                    <a href="{{ route('products.show', $product) }}" class="video-product-image"><img src="{{ asset('images/home/videos/product-0'.$number.'.png') }}" alt="" loading="lazy" width="75" height="76"></a>
                    <div><span class="rating" aria-label="Demo rating {{ number_format((float) $product->rating, 1) }} out of 5"><span aria-hidden="true">★★★★★</span></span><span class="review-count">({{ number_format($product->review_count) }})</span><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></div>
                </div>
                <form action="{{ route('cart.store', $product) }}" method="post" class="video-add-form">
                    @csrf
                    <button type="submit"><span aria-hidden="true">＋</span> Add to cart <span class="video-price">Rs. {{ number_format($product->price) }}</span></button>
                </form>
            </article>
        @endforeach
    </div>
</section>
<dialog class="video-dialog" aria-labelledby="video-dialog-title">
    <form method="dialog"><button class="video-dialog-close" aria-label="Close preview">×</button></form>
    <img data-video-dialog-image alt="">
    <h2 id="video-dialog-title"></h2>
    <p>This Figma reference includes a poster image only. A video has not been supplied.</p>
</dialog>
