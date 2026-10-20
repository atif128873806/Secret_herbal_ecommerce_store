<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = collect(session('cart', []))
            ->filter(fn ($quantity): bool => is_numeric($quantity) && (int) $quantity > 0)
            ->map(fn ($quantity): int => min(99, (int) $quantity));
        $products = Product::query()->active()->whereKey($cart->keys())->get()->keyBy('id');
        $items = $cart->map(function (int $quantity, string|int $productId) use ($products): ?array {
            $product = $products->get($productId);

            return $product ? ['product' => $product, 'quantity' => $quantity] : null;
        })->filter()->values();

        return view('storefront.cart', [
            'items' => $items,
            'cartCount' => $cart->sum(),
            'subtotal' => $items->sum(fn (array $item): int => $item['product']->price * $item['quantity']),
        ]);
    }

    public function store(Request $request, Product $product): RedirectResponse
    {
        abort_unless($product->is_active, 404);
        $validated = $request->validate(['quantity' => ['nullable', 'integer', 'min:1', 'max:99']]);
        $cart = $request->session()->get('cart', []);
        $current = (int) ($cart[$product->id] ?? 0);
        $cart[$product->id] = min(99, $current + (int) ($validated['quantity'] ?? 1));
        $request->session()->put('cart', $cart);

        return back()->with('status', $product->name.' added to your cart.');
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate(['quantity' => ['required', 'integer', 'min:1', 'max:99']]);
        $cart = $request->session()->get('cart', []);

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id] = (int) $validated['quantity'];
            $request->session()->put('cart', $cart);
        }

        return to_route('cart.index')->with('status', 'Cart updated.');
    }

    public function destroy(Request $request, Product $product): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);

        return to_route('cart.index')->with('status', 'Item removed from your cart.');
    }
}
