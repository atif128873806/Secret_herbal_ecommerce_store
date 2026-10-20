<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $sharedDescription = 'Figma-sourced demo catalog item. Replace this copy, ingredients, and claims with Herbal-approved product details before launch.';
        $products = [
            ['name' => 'Eternyx Advanced Retinol Serum', 'slug' => 'eternyx-advanced-retinol-serum', 'category' => 'Serums', 'concern' => 'Early signs of aging / dullness', 'price' => 1348, 'compare_at_price' => 1498, 'rating' => 4.9, 'review_count' => 55, 'image_path' => 'home/products/eternyx.png', 'is_featured' => true],
            ['name' => 'Meloryn Brightening Cream Capsules', 'slug' => 'meloryn-brightening-cream-capsules', 'category' => 'Moisturizers', 'concern' => 'Dull / uneven skin tone', 'price' => 1438, 'compare_at_price' => 1598, 'rating' => 4.9, 'review_count' => 76, 'image_path' => 'home/products/meloryn.png', 'is_featured' => true],
            ['name' => 'Spectra Block Aqua Fluid SPF 60', 'slug' => 'spectra-block-aqua-fluid-spf-60', 'category' => 'Sunblocks', 'concern' => 'All skin types', 'price' => 1348, 'compare_at_price' => 1498, 'rating' => 4.9, 'review_count' => 1145, 'image_path' => 'home/products/spectra-block.png', 'is_featured' => true],
            ['name' => 'Clarevo Anti Acne Soap', 'slug' => 'clarevo-anti-acne-soap', 'category' => 'Cleansers', 'concern' => 'Best for body acne', 'price' => 498, 'compare_at_price' => 620, 'rating' => 4.9, 'review_count' => 10412, 'image_path' => 'home/products/clarevo-soap.png', 'is_featured' => true],
            ['name' => 'Hajj & Umrah Essentials Kit', 'slug' => 'hajj-umrah-essentials-kit', 'category' => 'Kits', 'concern' => 'Hajj / Umrah safe', 'price' => 1098, 'compare_at_price' => 1500, 'rating' => 4.9, 'review_count' => 5946, 'image_path' => 'home/products/hajj-umrah-kit.png', 'is_featured' => true],
            ['name' => 'Dermive Oil-Free Fragrance Free', 'slug' => 'dermive-oil-free-fragrance-free', 'category' => 'Moisturizers', 'concern' => 'Best for sensitive skin', 'price' => 988, 'compare_at_price' => 1098, 'rating' => 4.9, 'review_count' => 41872, 'image_path' => 'home/products/dermive-oil-free.png', 'is_featured' => true],
            ['name' => 'Instant Glow Duo', 'slug' => 'instant-glow-duo', 'category' => 'Bundles', 'concern' => 'Most viral duo', 'price' => 1865, 'compare_at_price' => 2196, 'rating' => 4.9, 'review_count' => 16930, 'image_path' => 'home/products/instant-glow-duo.png', 'is_featured' => true],
            ['name' => 'Maxdif Brightening Moisturizer', 'slug' => 'maxdif-brightening-moisturizer', 'category' => 'Moisturizers', 'concern' => 'Dull / uneven skin', 'price' => 988, 'compare_at_price' => 1098, 'rating' => 4.9, 'review_count' => 23618, 'image_path' => 'home/products/maxdif-moisturizer.png', 'is_featured' => true],
            ['name' => 'Dermive Urea Economy Pack', 'slug' => 'dermive-urea-economy-pack', 'category' => 'Moisturizers', 'concern' => 'Dry / cracked skin', 'price' => 2250, 'compare_at_price' => 2498, 'rating' => 4.9, 'review_count' => 39215, 'image_path' => 'home/products/dermive-urea-pack.png', 'is_featured' => true],
            ['name' => 'Clarevo Salicylic Acid Facewash', 'slug' => 'clarevo-salicylic-acid-facewash', 'category' => 'Cleansers', 'concern' => 'Skin texture', 'price' => 988, 'compare_at_price' => 1098, 'rating' => 4.9, 'review_count' => 36641, 'image_path' => 'home/products/clarevo-facewash.png', 'is_featured' => true],
            ['name' => 'Brightening Coffee Soap', 'slug' => 'brightening-coffee-soap', 'category' => 'Cleansers', 'concern' => 'Tan removal', 'price' => 498, 'compare_at_price' => 620, 'rating' => 4.9, 'review_count' => 25350, 'image_path' => 'home/products/brightening-coffee-soap.png', 'is_featured' => true],
            ['name' => 'Anagrow Anti Frizz Hair Serum', 'slug' => 'anagrow-anti-frizz-hair-serum', 'category' => 'Hair Care', 'concern' => 'Frizzy / untamed hair', 'price' => 1798, 'compare_at_price' => 1998, 'rating' => 4.9, 'review_count' => 18356, 'image_path' => 'home/products/anagrow-anti-frizz-serum.png', 'is_featured' => true],
            ['name' => 'Anagrow Rosemary Hair Oil', 'slug' => 'anagrow-rosemary-hair-oil', 'category' => 'Hair Care', 'concern' => 'Hair fall', 'price' => 1798, 'compare_at_price' => 1998, 'rating' => 4.9, 'review_count' => 22376, 'image_path' => 'home/innovations/anagrow-rosemary-oil.png', 'is_featured' => false],
            ['name' => 'Brightening Coffee Scrub', 'slug' => 'brightening-coffee-scrub', 'category' => 'Cleansers', 'concern' => 'Dull & rough skin', 'price' => 898, 'compare_at_price' => 998, 'rating' => 4.9, 'review_count' => 20736, 'image_path' => 'home/innovations/brightening-coffee-scrub.png', 'is_featured' => false],
            ['name' => 'NiaRonic Serum (Pore Minimizing)', 'slug' => 'niaronic-serum-pore-minimizing', 'category' => 'Serums', 'concern' => 'Demo video favorite', 'price' => 1798, 'compare_at_price' => null, 'rating' => 4.9, 'review_count' => 31501, 'image_path' => 'home/videos/product-01.png', 'is_featured' => false],
            ['name' => 'Dermive Oil Free Moisturizer', 'slug' => 'dermive-oil-free-moisturizer', 'category' => 'Moisturizers', 'concern' => 'Demo video favorite', 'price' => 988, 'compare_at_price' => null, 'rating' => 4.9, 'review_count' => 60321, 'image_path' => 'home/videos/product-02.png', 'is_featured' => false],
            ['name' => 'MandelAC Serum', 'slug' => 'mandelac-serum', 'category' => 'Serums', 'concern' => 'Demo video favorite', 'price' => 1438, 'compare_at_price' => null, 'rating' => 4.9, 'review_count' => 20656, 'image_path' => 'home/videos/product-03.png', 'is_featured' => false],
            ['name' => 'Skin Rescue Mist', 'slug' => 'skin-rescue-mist', 'category' => 'Toners', 'concern' => 'Demo video favorite', 'price' => 898, 'compare_at_price' => null, 'rating' => 4.9, 'review_count' => 26990, 'image_path' => 'home/videos/product-04.png', 'is_featured' => false],
        ];

        foreach ($products as $index => $product) {
            Product::query()->updateOrCreate(
                ['slug' => $product['slug']],
                $product + [
                    'description' => $sharedDescription,
                    'is_active' => true,
                    'is_demo' => true,
                    'sort_order' => $index + 1,
                ],
            );
        }
    }
}
