@php
    $innovationImages = [
        'eternyx-advanced-retinol-serum' => 'eternyx.png',
        'meloryn-brightening-cream-capsules' => 'meloryn.png',
        'spectra-block-aqua-fluid-spf-60' => 'spectra-block.png',
        'clarevo-anti-acne-soap' => 'clarevo-soap.png',
        'hajj-umrah-essentials-kit' => 'hajj-umrah-kit.png',
        'dermive-oil-free-fragrance-free' => 'dermive-oil-free.png',
        'maxdif-brightening-moisturizer' => 'maxdif-moisturizer.png',
        'dermive-urea-economy-pack' => 'dermive-urea-pack.png',
        'clarevo-salicylic-acid-facewash' => 'clarevo-facewash.png',
        'anagrow-anti-frizz-hair-serum' => 'anagrow-anti-frizz-serum.png',
        'anagrow-rosemary-hair-oil' => 'anagrow-rosemary-oil.png',
        'brightening-coffee-scrub' => 'brightening-coffee-scrub.png',
    ];
@endphp
<section class="innovation-section" aria-labelledby="innovation-heading">
    <div class="innovation-inner page-shell">
        <div class="innovation-content">
            <p class="innovation-note">New arrivals · Demo catalog</p>
            <h2 id="innovation-heading">Meet Our Newest Innovations 🌈</h2>
            <div class="carousel-viewport" id="innovation-carousel">
                <div class="innovation-track carousel-track" data-carousel-track tabindex="0" aria-label="New products">
                    @foreach ($innovations as $product)
                        @php($innovationImage = 'home/innovations/'.($innovationImages[$product->slug] ?? ''))
                        <div class="innovation-slide carousel-slide">
                            @include('partials.product-card', ['product' => $product, 'imagePath' => $innovationImage])
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="carousel-controls">
                <div class="carousel-progress" aria-hidden="true"><span data-carousel-progress></span></div>
                <div class="carousel-arrows">
                    <button type="button" class="carousel-arrow carousel-arrow-light" data-carousel-prev aria-label="Previous innovations">‹</button>
                    <button type="button" class="carousel-arrow carousel-arrow-light" data-carousel-next aria-label="Next innovations">›</button>
                </div>
            </div>
        </div>
    </div>
</section>
