<section class="review-section page-shell" id="reviews" aria-labelledby="reviews-heading">
    @php($reviewSamples = require resource_path('data/figma-review-samples.php'))
    <header class="section-heading review-heading">
        <h2 id="reviews-heading">Verified Customer Reviews 🌼</h2>
        <p class="sample-content-label">Review photos and text are Figma samples for layout preview; they are not verified Herbal reviews.</p>
    </header>
    <div class="carousel-viewport review-viewport" id="review-carousel">
        <div class="review-track carousel-track" data-carousel-track tabindex="0" aria-label="Figma sample review cards">
            @foreach ($reviewSamples as $index => $review)
                @php($photo = sprintf('reviews-%02d.jpeg', $index))
                <article class="review-photo-card carousel-slide">
                    <div class="review-photo">
                        <img src="{{ asset('images/home/reviews/'.$photo) }}" alt="Sample review photo {{ $index }} from the Figma reference" loading="lazy" width="348" height="348">
                        <span class="review-stars" aria-label="Sample five out of five stars">★★★★★</span>
                    </div>
                    <div class="review-copy">
                        <span class="review-date">{{ $review['date'] }}</span>
                        <h3>{{ $review['title'] }}</h3>
                        <p class="review-text">{{ $review['text'] }}</p>
                        <div class="review-author">
                            <strong>{{ $review['name'] }}</strong>
                            <span>{{ $review['product'] }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <div class="carousel-controls">
        <div class="carousel-progress" aria-hidden="true"><span data-carousel-progress></span></div>
        <div class="carousel-arrows">
            <button type="button" class="carousel-arrow" data-carousel-prev aria-label="Previous review photos">‹</button>
            <button type="button" class="carousel-arrow" data-carousel-next aria-label="Next review photos">›</button>
        </div>
    </div>
    <div class="section-action"><a class="button button-primary" href="{{ route('products.index') }}">Shop the collection</a></div>
</section>
