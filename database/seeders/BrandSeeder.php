<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Rolex', 'country' => 'Switzerland', 'founded_year' => 1905],
            ['name' => 'Omega', 'country' => 'Switzerland', 'founded_year' => 1848],
            ['name' => 'Casio', 'country' => 'Japan', 'founded_year' => 1946],
            ['name' => 'Seiko', 'country' => 'Japan', 'founded_year' => 1881],
            ['name' => 'Tag Heuer', 'country' => 'Switzerland', 'founded_year' => 1860],
            ['name' => 'Fossil', 'country' => 'USA', 'founded_year' => 1984],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand['name'],
                'country' => $brand['country'],
                'founded_year' => $brand['founded_year'],
            ]);
        }
    }
}
