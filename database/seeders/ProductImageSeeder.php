<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            for ($i = 1; $i <= 3; $i++) {
                $formats = ['jpg', 'jpeg', 'webp', 'png'];

                foreach ($formats as $format) {
                    $path = "images/men-watches/{$product->id}/{$i}.{$format}";

                    if (file_exists(public_path($path))) {
                        ProductImage::create([
                            'product_id' => $product->id,
                            'image_path' => $path,
                            'alt_text' => $product->name . " - slika {$i}",
                            'is_primary' => ($i === 1),
                            'order' => $i
                        ]);
                        break;
                    }
                }
            }
        }
    }
}
