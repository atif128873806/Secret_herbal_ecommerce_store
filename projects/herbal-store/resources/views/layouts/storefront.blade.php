<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#183A2B">
    <meta name="description" content="Discover botanical skincare from Secret Herbals by Shazia Saeed.">
    <title>@yield('title', 'Shop') — Secret Herbals</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="@yield('body-class')">
    <a class="skip-link" href="#main-content">Skip to content</a>
    <div class="announcement"><span class="announcement-message">A little more care for your everyday routine</span><span aria-hidden="true">✦</span><a href="{{ route('products.index') }}">Explore the collection</a></div>
    <header class="site-header">
        <div class="header-main page-shell">
            <form class="header-search" action="{{ route('products.index') }}" method="get" role="search">
                <label class="sr-only" for="site-search">Search products</label>
                <svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="10.8" cy="10.8" r="6.8"></circle><path d="m16 16 4.5 4.5"></path></svg>
                <input id="site-search" name="q" value="{{ request('q') }}" placeholder="Search products" autocomplete="off">
            </form>
            <a class="brand-logo-link" href="{{ route('home') }}" aria-label="Secret Herbals home">
                <img class="brand-logo" src="{{ asset('images/brand/secret-herbals-logo-transparent.png') }}" alt="Secret Herbals by Shazia Saeed logo" width="1265" height="1243">
            </a>
            <div class="header-actions">
                <a class="cart-link" href="{{ route('cart.index') }}" aria-label="Cart, {{ $cartCount ?? collect(session('cart', []))->sum() }} items">
                    <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M5 8h14l1 12H4L5 8Z"></path><path d="M9 8V6a3 3 0 0 1 6 0v2"></path></svg>
                    <span>Cart</span><span class="cart-count">{{ $cartCount ?? collect(session('cart', []))->sum() }}</span>
                </a>
            </div>
            <details class="mobile-menu">
                <summary aria-label="Open navigation menu"><span></span><span></span><span></span></summary>
                <nav aria-label="Mobile navigation">
                    <a href="{{ route('products.index') }}">Shop all</a>
                    <a href="{{ route('products.index', ['category' => 'Bundles']) }}">Bundle &amp; save</a>
                    <a href="{{ route('products.index', ['category' => 'Cleansers']) }}">Cleansers</a>
                    <a href="{{ route('products.index', ['category' => 'Serums']) }}">Serums</a>
                    <a href="{{ route('products.index', ['category' => 'Hair Care']) }}">Hair care</a>
                    <a href="{{ route('home') }}#results">Sample results</a>
                    <a href="{{ route('home') }}#deals">Offers preview</a>
                    <a href="{{ route('home') }}#reviews">Reviews preview</a>
                    <a href="{{ route('cart.index') }}">Cart</a>
                </nav>
            </details>
        </div>
        <nav class="desktop-nav" aria-label="Main navigation">
            <a href="{{ route('products.index') }}">Shop all</a>
            <a href="{{ route('products.index', ['category' => 'Bundles']) }}">Bundle &amp; save</a>
            <a href="{{ route('products.index') }}">Skin care</a>
            <a href="{{ route('products.index', ['category' => 'Hair Care']) }}">Hair care</a>
            <a href="{{ route('home') }}#best-sellers">Best sellers</a>
            <a href="{{ route('home') }}#deals">Sale</a>
            <a href="{{ route('home') }}#results">Skin stories</a>
            <a href="{{ route('home') }}#reviews">Reviews</a>
            <a href="{{ route('cart.index') }}">Cart</a>
        </nav>
    </header>

    @if (session('status'))
        <div class="flash-message" role="status">{{ session('status') }}</div>
    @endif

    <main id="main-content">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-inner page-shell">
            <div class="footer-brand">
                <a class="brand-logo-link footer-brand-logo" href="{{ route('home') }}" aria-label="Secret Herbals home">
                    <img class="brand-logo" src="{{ asset('images/brand/secret-herbals-logo-transparent.png') }}" alt="Secret Herbals by Shazia Saeed logo" width="1265" height="1243" loading="lazy">
                </a>
                <p>Thoughtful care for everyday routines.</p>
                <p class="footer-preview-note">This page uses sample catalog and campaign material from a Figma design preview.</p>
            </div>
            <div class="footer-column"><h2>Shop</h2><a href="{{ route('products.index') }}">Shop all</a><a href="{{ route('products.index', ['category' => 'Bundles']) }}">Bundles</a><a href="{{ route('home') }}#best-sellers">Best sellers</a><a href="{{ route('home') }}#deals">Offer artwork</a></div>
            <div class="footer-column"><h2>Skin care</h2><a href="{{ route('products.index', ['category' => 'Cleansers']) }}">Cleansers</a><a href="{{ route('products.index', ['category' => 'Serums']) }}">Serums</a><a href="{{ route('products.index', ['category' => 'Sunblocks']) }}">Sun protection</a><a href="{{ route('products.index', ['category' => 'Moisturizers']) }}">Moisturizers</a></div>
            <div class="footer-column"><h2>Explore</h2><a href="{{ route('home') }}#results">Sample stories</a><a href="{{ route('home') }}#reviews">Review photo preview</a><a href="{{ route('home') }}#brand-story">Our note</a><span>Quiz and tracking are not configured.</span></div>
            <div class="footer-column"><h2>Your order</h2><a href="{{ route('cart.index') }}">Shopping cart</a><span>Cart only · checkout is not available</span></div>
        </div>
        <div class="footer-legal page-shell"><span>© {{ now()->year }} Secret Herbals</span><span>Figma demonstration · Product information and imagery are for preview only</span><a href="{{ route('cart.index') }}">View cart</a></div>
    </footer>
</body>
</html>
