<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = Brand::all()->keyBy('name');
        $categories = Category::all()->keyBy('name');


        Product::create([
            'name' => 'Rolex Submariner Date',
            'short_description' => 'Legendary diving watch',
            'description' => 'The Rolex Submariner is an icon among diving watches. Water-resistant up to 300m.',
            'brand_id' => $brands['Rolex']->id,
            'reference_number' => '126610LN',
            'price' => 9500.00,
            'discount' => 9000.00,
            'category_id' => $categories['Luxury']->id,
        ]);

        Product::create([
            'name' => 'Omega Speedmaster Moonwatch',
            'short_description' => 'First watch on the Moon',
            'description' => 'The legendary Omega Speedmaster Professional, known as the "Moonwatch", was the first watch worn on the Moon. Manual winding and chronograph.',
            'brand_id' => $brands['Omega']->id,
            'reference_number' => '310.30.42.50.01.001',
            'price' => 6800.00,
            'discount' => 6200.00,
            'category_id' => $categories['Casual']->id,
        ]);

        Product::create([
            'name' => 'Casio G-Shock GA-2100',
            'short_description' => 'CasiOak - iconic design',
            'description' => 'Octagonal design inspired by classic watches, combined with G-Shock durability.',
            'brand_id' => $brands['Casio']->id,
            'reference_number' => 'GA-2100-1A1',
            'price' => 150.00,
            'discount' => null,
            'category_id' => $categories['Sport']->id,
        ]);

        Product::create([
            'name' => 'Seiko 5 Sports "5KX"',
            'short_description' => 'Affordable automatic watch',
            'description' => 'Seiko 5 Sports offers a reliable automatic movement at an affordable price. Sporty design and 100m water resistance.',
            'brand_id' => $brands['Seiko']->id,
            'reference_number' => 'SRPD55K2',
            'price' => 280.00,
            'discount' => null,
            'category_id' => $categories['Luxury']->id,
        ]);

        Product::create([
            'name' => 'Tag Heuer Carrera Calibre 16',
            'short_description' => 'Legendary chronograph',
            'description' => 'Tag Heuer Carrera is an icon among chronographs, inspired by racing and precision.',
            'brand_id' => $brands['Tag Heuer']->id,
            'reference_number' => 'CV201AA.FT6034',
            'price' => 3950.00,
            'discount' => null,
            'category_id' => $categories['Casual']->id,
        ]);

        Product::create([
            'name' => 'Fossil Machine Chronograph',
            'short_description' => 'Industrial design',
            'description' => 'The Fossil Machine features a robust industrial design with an open mechanism and leather strap.',
            'brand_id' => $brands['Fossil']->id,
            'reference_number' => 'BQ8882',
            'price' => 250.00,
            'discount' => 199.00,
            'category_id' => $categories['Sport']->id,
        ]);

        Product::create([
            'name' => 'Rolex Lady-Datejust 28',
            'short_description' => 'Luxury watch with diamonds',
            'description' => 'The Rolex Lady-Datejust 28 is a timeless luxury watch made of Oystersteel and white gold, featuring diamond details and iconic design.',
            'brand_id' => $brands['Rolex']->id,
            'reference_number' => '279384RBR',
            'price' => 12500.00,
            'discount' => 12000.00,
            'category_id' => $categories['Luxury']->id,
        ]);

        Product::create([
            'name' => 'Tag Heuer Carrera Lady',
            'short_description' => 'Elegant sporty women’s watch',
            'description' => 'The Tag Heuer Carrera Lady combines sporty aesthetics with elegance, featuring a quartz movement and a clean classic design.',
            'brand_id' => $brands['Tag Heuer']->id,
            'reference_number' => 'WBK1312.BA0652',
            'price' => 2200.00,
            'discount' => null,
            'category_id' => $categories['Casual']->id,
        ]);

        Product::create([
            'name' => 'Casio Baby-G',
            'short_description' => 'Durable sporty watch',
            'description' => 'The Casio Baby-G offers shock resistance, a digital-analog display, and a bold sporty design perfect for everyday wear.',
            'brand_id' => $brands['Casio']->id,
            'reference_number' => 'BA-110-7A1',
            'price' => 140.00,
            'discount' => null,
            'category_id' => $categories['Sport']->id,
        ]);

        Product::create([
            'name' => 'Omega Constellation Manhattan',
            'short_description' => 'Iconic luxury watch with claws',
            'description' => 'The Omega Constellation Manhattan is a highly recognizable luxury watch featuring its signature claws and elegant 28mm case.',
            'brand_id' => $brands['Omega']->id,
            'reference_number' => '131.10.28.60.02.001',
            'price' => 5200.00,
            'discount' => null,
            'category_id' => $categories['Luxury']->id,
        ]);

        Product::create([
            'name' => 'Seiko Presage Cocktail Time',
            'short_description' => 'Elegant automatic watch',
            'description' => 'The Seiko Presage Cocktail Time features an automatic movement and a refined dial inspired by cocktail aesthetics.',
            'brand_id' => $brands['Seiko']->id,
            'reference_number' => 'SRP841J1',
            'price' => 450.00,
            'discount' => 399.00,
            'category_id' => $categories['Casual']->id,
        ]);

        Product::create([
            'name' => 'Fossil Jacqueline',
            'short_description' => 'Minimalist elegant design',
            'description' => 'The Fossil Jacqueline is a slim and minimalist watch, perfect for everyday elegance and a clean modern look.',
            'brand_id' => $brands['Fossil']->id,
            'reference_number' => 'ES3433',
            'price' => 180.00,
            'discount' => null,
            'category_id' => $categories['Casual']->id,
        ]);

    }
}
