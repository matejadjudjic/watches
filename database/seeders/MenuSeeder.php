<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'title' => 'Home',
            'path' => '/',

        ]);

        Menu::create([
            'title' => 'Products',
            'path' => '/products',

        ]);

        Menu::create([
            'title' => 'Contact',
            'path' => '/contact',

        ]);


        Menu::create([
            'title' => 'About',
            'path' => '/about',

        ]);
    }
}
