<section id="{{ $id }}" class="home-product-section" aria-labelledby="{{ $id }}-heading" data-product-carousel>
    <div class="home-section-inner page-shell">
        <header class="carousel-heading">
            <p class="carousel-eyebrow">{{ $eyebrow }}</p>
            <h2 id="{{ $id }}-heading">{{ $title }}</h2>
            <div class="category-tabs" role="group" aria-label="Filter {{ strtolower($title) }}">
                @foreach ($filters as $index => $filter)
                    <button class="category-tab{{ $index === 0 ? ' is-active' : '' }}" type="button" data-product-filter="{{ $filter }}" aria-pressed="{{ $index === 0 ? 'true' : 'false' }}">{{ $filter }}</button>
                @endforeach
            </div>
        </header>
        <div class="carousel-viewport" id="{{ $id }}-carousel">
            <div class="product-grid carousel-track" data-carousel-track tabindex="0" aria-label="{{ $title }}">
                @foreach ($products as $product)
                    @php
                        $filterText = strtolower($product->category.' '.$product->concern.' '.$product->name);
                        $imagePath = ($imageDirectory ?? 'products') === 'innovations'
                            ? 'home/innovations/'.$product->slug.'.png'
                            : $product->image_path;
                    @endphp
                    <div class="carousel-slide" data-slide data-filter-text="{{ $filterText }}">
                        @include('partials.product-card', [
                            'product' => $product,
                            'imagePath' => $imagePath,
                            'flagLabel' => $flagLabel ?? null,
                        ])
                    </div>
                @endforeach
            </div>
        </div>
        <div class="carousel-controls">
            <div class="carousel-progress" aria-hidden="true"><span data-carousel-progress></span></div>
            <div class="carousel-arrows">
                <button type="button" class="carousel-arrow" data-carousel-prev aria-label="Previous products">‹</button>
                <button type="button" class="carousel-arrow" data-carousel-next aria-label="Next products">›</button>
            </div>
        </div>
    </div>
</section>
