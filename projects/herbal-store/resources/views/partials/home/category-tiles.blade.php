<section class="category-section" aria-label="Shop by category">
    <div class="category-grid page-shell">
        @foreach ([['Cleansers', 'cleansers'], ['Serums', 'serums'], ['Sunblocks', 'sunblocks'], ['Moisturizers', 'moisturizers']] as [$category, $asset])
            <a class="category-tile" href="{{ route('products.index', ['category' => $category]) }}">
                <img src="{{ asset('images/home/tiles/'.$asset.'.png') }}" alt="" loading="lazy" width="340" height="110">
                <span>{{ 'Shop '.$category }}</span><span class="tile-arrow" aria-hidden="true">›</span>
            </a>
        @endforeach
    </div>
</section>
