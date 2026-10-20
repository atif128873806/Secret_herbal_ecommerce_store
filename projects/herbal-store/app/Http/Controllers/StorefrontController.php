<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StorefrontController extends Controller
{
    public function home(): View
    {
        $products = Product::query()->active()->where('is_featured', true)->orderBy('sort_order')->get();
        $innovationSlugs = [
            'eternyx-advanced-retinol-serum', 'meloryn-brightening-cream-capsules',
            'spectra-block-aqua-fluid-spf-60', 'clarevo-anti-acne-soap',
            'hajj-umrah-essentials-kit', 'dermive-oil-free-fragrance-free',
            'maxdif-brightening-moisturizer', 'dermive-urea-economy-pack',
            'clarevo-salicylic-acid-facewash', 'anagrow-anti-frizz-hair-serum',
            'anagrow-rosemary-hair-oil', 'brightening-coffee-scrub',
        ];
        $videoSlugs = [
            'niaronic-serum-pore-minimizing', 'dermive-oil-free-moisturizer',
            'mandelac-serum', 'skin-rescue-mist',
        ];
        $innovations = Product::query()->active()->whereIn('slug', $innovationSlugs)->get()
            ->sortBy(fn (Product $product): int => array_search($product->slug, $innovationSlugs, true))
            ->values();
        $videoProducts = Product::query()->active()->whereIn('slug', $videoSlugs)->get()
            ->sortBy(fn (Product $product): int => array_search($product->slug, $videoSlugs, true))
            ->values();

        return view('storefront.home', compact('products', 'innovations', 'videoProducts'));
    }

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:60'],
            'concern' => ['nullable', 'string', 'max:100'],
            'sort' => ['nullable', 'in:featured,price_asc,price_desc,name'],
        ]);

        $query = Product::query()->active();

        if (filled($validated['q'] ?? null)) {
            $search = trim($validated['q']);
            $query->where(function ($builder) use ($search): void {
                $builder->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('concern', 'like', "%{$search}%");
            });
        }

        if (filled($validated['category'] ?? null)) {
            $query->where('category', $validated['category']);
        }

        if (filled($validated['concern'] ?? null)) {
            $query->where('concern', $validated['concern']);
        }

        match ($validated['sort'] ?? 'featured') {
            'price_asc' => $query->orderBy('price')->orderBy('sort_order'),
            'price_desc' => $query->orderByDesc('price')->orderBy('sort_order'),
            'name' => $query->orderBy('name'),
            default => $query->orderByDesc('is_featured')->orderBy('sort_order'),
        };

        // The Figma catalog composition shows 18 products on its first page.
        // Keep Laravel pagination so larger live catalogs continue onto later pages.
        $products = $query->paginate(18)->withQueryString();
        $categories = Product::query()->active()->select('category')->distinct()->orderBy('category')->pluck('category');
        $concerns = Product::query()->active()->select('concern')->distinct()->orderBy('concern')->pluck('concern');
        $cartCount = collect(session('cart', []))->sum();

        return view('storefront.products', compact('products', 'categories', 'concerns', 'cartCount', 'validated'));
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $relatedProducts = Product::query()->active()->where('category', $product->category)
            ->whereKeyNot($product->id)->orderBy('sort_order')->limit(4)->get();

        return view('storefront.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'cartCount' => collect(session('cart', []))->sum(),
        ]);
    }
}
