<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\ProductSeeder;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ProductSeeder::class);
    }

    public function test_home_and_product_catalog_render_with_demo_products(): void
    {
        $this->get('/')->assertOk()->assertSee('Herbal')->assertSee('Eternyx Advanced Retinol Serum');
        $this->get('/products')->assertOk()
            ->assertSee('Figma preview')
            ->assertSee('Skin concerns')
            ->assertSee('Product type')
            ->assertSee('Clarevo Anti Acne Soap')
            ->assertSee('Skin Rescue Mist')
            ->assertSee('images/catalog/shop-all-banner.png')
            ->assertSee('images/catalog/giveaway-promo.png')
            ->assertSee('images/catalog/free-gift-promo.png');
    }

    public function test_catalog_shows_all_figma_demo_items_and_paginates_larger_catalogs(): void
    {
        $this->get('/products')->assertOk()->assertSee('Skin Rescue Mist')->assertDontSee('Next &raquo;');

        $extraProduct = \App\Models\Product::query()->firstOrFail()->replicate();
        $extraProduct->slug = 'qa-extra-product';
        $extraProduct->name = 'QA Extra Product';
        $extraProduct->is_featured = false;
        $extraProduct->sort_order = 99;
        $extraProduct->save();

        $this->get('/products?page=2')
            ->assertOk()
            ->assertSee('QA Extra Product')
            ->assertDontSee('Eternyx Advanced Retinol Serum');
    }

    public function test_catalog_search_category_and_sort_filters_are_applied(): void
    {
        $this->get('/products?q=Spectra')->assertOk()->assertSee('Spectra Block Aqua Fluid SPF 60')->assertDontSee('Eternyx Advanced Retinol Serum');
        $this->get('/products?category=Cleansers')->assertOk()->assertSee('Clarevo Anti Acne Soap')->assertDontSee('Meloryn Brightening Cream Capsules');
        $this->get('/products?concern=Hair%20fall')->assertOk()->assertSee('Anagrow Rosemary Hair Oil')->assertDontSee('Eternyx Advanced Retinol Serum');
        $this->get('/products?sort=price_asc')->assertOk()->assertSee('All products');
        $this->get('/products?sort=invalid')->assertSessionHasErrors('sort');
    }

    public function test_cart_add_update_and_remove_flow(): void
    {
        $product = \App\Models\Product::query()->where('slug', 'eternyx-advanced-retinol-serum')->firstOrFail();

        $this->post(route('cart.store', $product))->assertRedirect();
        $this->get('/cart')->assertOk()->assertSee('Eternyx Advanced Retinol Serum')->assertSee('Rs. 1,348');

        $this->patch(route('cart.update', $product), ['quantity' => 2])->assertRedirect(route('cart.index'));
        $this->get('/cart')->assertSee('value="2"', false)->assertSee('Rs. 2,696');

        $this->patch(route('cart.update', $product), ['quantity' => 0])->assertSessionHasErrors('quantity');
        $this->delete(route('cart.destroy', $product))->assertRedirect(route('cart.index'));
        $this->get('/cart')->assertSee('Your cart is ready');
    }
}
