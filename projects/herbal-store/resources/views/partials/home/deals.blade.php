<section class="deals-section" id="deals" aria-labelledby="deals-heading">
    <div class="page-shell deals-inner">
        <header class="deals-heading">
            <p class="eyebrow">Big savings 💸</p>
            <h2 id="deals-heading">Clock's Ticking On These Deals:</h2>
            <p>Offer artwork is included from the Figma design as preview content. No promotion is active.</p>
        </header>
        <div class="deal-grid">
            @foreach ([['deal-1.png', 'Bundle offer', 'Sample bundle offer from the design'], ['deal-2.png', 'Gift offer', 'Sample gift offer from the design'], ['deal-3.png', 'Shipping offer', 'Sample shipping offer from the design']] as [$image, $label, $alt])
                <a class="deal-card" href="{{ route('products.index') }}" aria-label="{{ $label }} · browse demo products">
                    <img src="{{ asset('images/home/deals/'.$image) }}" alt="{{ $alt }}" loading="lazy" width="357" height="112">
                </a>
            @endforeach
        </div>
        <div class="section-action"><a class="button button-primary" href="{{ route('products.index') }}">Explore Products</a></div>
    </div>
</section>
