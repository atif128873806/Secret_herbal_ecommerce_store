@extends('layouts.storefront')

@section('title', 'All products')
@section('body-class', 'catalog-page')

@section('content')
    <section class="catalog-campaign page-shell" aria-label="Sample collection campaign">
        <a class="catalog-campaign-link" href="{{ route('products.index', ['category' => 'Bundles']) }}#collection" aria-label="Browse sample bundle products">
            <img src="{{ asset('images/catalog/shop-all-banner.png') }}" alt="Sample bundle campaign artwork from the Figma design preview" width="1340" height="300">
        </a>
    </section>

    <section class="collection-section page-shell" id="collection" aria-label="Product collection">
        <form class="collection-toolbar" action="{{ route('products.index') }}" method="get" data-auto-submit>
            @if (filled($validated['q'] ?? null))
                <input type="hidden" name="q" value="{{ $validated['q'] }}">
            @endif
            <div class="filter-controls">
                <span class="filter-controls-label">Filters:</span>
                <label class="sr-only" for="concern-filter">Skin concerns</label>
                <select id="concern-filter" name="concern" aria-label="Skin concerns">
                    <option value="">Skin concerns</option>
                    @foreach ($concerns as $concern)
                        <option value="{{ $concern }}" @selected(($validated['concern'] ?? '') === $concern)>{{ $concern }}</option>
                    @endforeach
                </select>
                <label class="sr-only" for="category-filter">Product type</label>
                <select id="category-filter" name="category">
                    <option value="">Product type</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" @selected(($validated['category'] ?? '') === $category)>{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sort-control">
                <label for="sort-products">Sort by:</label>
                <select id="sort-products" name="sort">
                    <option value="featured" @selected(($validated['sort'] ?? 'featured') === 'featured')>Featured</option>
                    <option value="price_asc" @selected(($validated['sort'] ?? '') === 'price_asc')>Price: low to high</option>
                    <option value="price_desc" @selected(($validated['sort'] ?? '') === 'price_desc')>Price: high to low</option>
                    <option value="name" @selected(($validated['sort'] ?? '') === 'name')>Name</option>
                </select>
            </div>
        </form>

        <div class="catalog-meta">
            <p>{{ $products->total() }} sample {{ Str::plural('product', $products->total()) }}</p>
            <span>Figma preview · products and offer artwork are examples; no promotion is active</span>
        </div>

        @if ($products->isNotEmpty())
            <div class="product-grid collection-grid">
                @foreach ($products as $product)
                    @include('partials.product-card', ['product' => $product])
                    @if ($loop->iteration === 3 && $products->currentPage() === 1 && empty($validated['q']) && empty($validated['category']) && empty($validated['concern']))
                        <a class="catalog-promo" href="{{ route('products.index') }}#collection" aria-label="Sample giveaway campaign artwork. The offer is not active. Browse sample products.">
                            <img src="{{ asset('images/catalog/giveaway-promo.png') }}" alt="" width="330" height="623" loading="lazy">
                        </a>
                        <a class="catalog-promo" href="{{ route('products.index') }}#collection" aria-label="Sample free gift campaign artwork. The offer is not active. Browse sample products.">
                            <img src="{{ asset('images/catalog/free-gift-promo.png') }}" alt="" width="330" height="623" loading="lazy">
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="pagination-wrap">{{ $products->links() }}</div>
        @else
            <div class="empty-state">
                <h2>No products found</h2>
                <p>Try another search or browse all categories.</p>
                <a class="button button-primary" href="{{ route('products.index') }}">Clear filters</a>
            </div>
        @endif
    </section>
@endsection
