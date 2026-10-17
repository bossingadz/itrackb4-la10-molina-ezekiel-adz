<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

    public function run(): void
    {
        Game::create([
        'title' => 'Monster Hunter: World',
        'platform' => 'Base Game',
        'price' => 1299.00,
        'stock' => 25,
        'is_featured' => false,
        'description' => 'Hunt massive monsters in living ecosystems.',
        ]);

        Game::create([
        'title' => 'Monster Hunter: World - Iceborne',
        'platform' => 'Expansion',
        'price' => 1799.00,
        'stock' => 18,
        'is_featured' => true,
        'description' => 'Master Rank expansion set in the Hoarfrost Reach.',
        ]);

        Game::create([
        'title' => 'Monster Hunter Rise',
        'platform' => 'Base Game',
        'price' => 1499.00,
        'stock' => 30,
        'is_featured' => false,
        'description' => 'Fast-paced hunts with the Wirebug and Palamutes.',
        ]);

        Game::create([
        'title' => 'Monster Hunter Rise: Sunbreak',
        'platform' => 'Expansion',
        'price' => 1399.00,
        'stock' => 12,
        'is_featured' => false,
        'description' => null,
       ]);

        Game::create([
        'title' => 'Monster Hunter Wilds',
        'platform' => 'Base Game',
        'price' => 2499.00,
        'stock' => 40,
        'is_featured' => true,
        'description' => 'Hunt across shifting landscapes.',
       ]);

        Game::create([
        'title' => 'Monster Hunter Generations Ultimate',
        'platform' => 'Base Game',
        'price' => 1199.00,
        'stock' => 8,
        'is_featured' => false,
        'description' => 'Four hunting styles and a huge monster roster.',
       ]);
    }
}
