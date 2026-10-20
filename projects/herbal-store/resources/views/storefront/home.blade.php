@extends('layouts.storefront', ['cartCount' => collect(session('cart', []))->sum()])

@section('title', 'Everyday skincare')

@section('content')
    @include('partials.home.hero')
    <p class="home-demo-notice" role="note">Figma preview content: product details, prices, reviews, customer stories, promotions and trust claims are examples, not verified Herbal information.</p>
    @include('partials.home.trust-strip')
    @include('partials.home.category-tiles')
    @include('partials.home.product-carousel', [
        'id' => 'best-sellers',
        'title' => 'Products That Are Clinically Proven To Deliver Results 🧪',
        'eyebrow' => '★★★★★ &nbsp; 2,000,000+ Happy Customers',
        'products' => $products,
        'filters' => ['Best Sellers', 'Anti Acne', 'Skin Brightening', 'Hair Fall', 'Dry Skin'],
        'tone' => 'light',
    ])
    @include('partials.home.innovations')
    @include('partials.home.results')
    @include('partials.home.quiz')
    @include('partials.home.reviews')
    @include('partials.home.deals')
    @include('partials.home.video-favorites')
    @include('partials.home.quote')
    @include('partials.home.press-strip')
@endsection
