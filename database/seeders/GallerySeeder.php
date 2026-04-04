<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gallery')->insert([
            [
                'title' => 'Pointe',
                'path' => 'images/g1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Port de bras',
                'path' => 'images/g2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'pli·é',
                'path' => 'images/g3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Adagio',
                'path' => 'images/g4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Frappé',
                'path' => 'images/g5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Glissade',
                'path' => 'images/g6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Jeté',
                'path' => 'images/g7.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Piqué',
                'path' => 'images/g8.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
