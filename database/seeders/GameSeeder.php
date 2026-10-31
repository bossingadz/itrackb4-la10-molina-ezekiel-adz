<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Platform;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $baseGame = Platform::create(['name' => 'Base Game']);
        $expansion = Platform::create(['name' => 'Expansion']);

        Game::create([
            'title' => 'Monster Hunter: World',
            'platform_id' => $baseGame->id,
            'price' => 1299.00,
            'stock' => 25,
            'is_featured' => false,
            'description' => 'Hunt massive monsters in living ecosystems.',
        ]);

        Game::create([
            'title' => 'Monster Hunter: World - Iceborne',
            'platform_id' => $expansion->id,
            'price' => 1799.00,
            'stock' => 18,
            'is_featured' => true,
            'description' => 'Master Rank expansion set in the Hoarfrost Reach.',
        ]);

        Game::create([
            'title' => 'Monster Hunter Rise',
            'platform_id' => $baseGame->id,
            'price' => 1499.00,
            'stock' => 30,
            'is_featured' => false,
            'description' => 'Fast-paced hunts with the Wirebug and Palamutes.',
        ]);

        Game::create([
            'title' => 'Monster Hunter Rise: Sunbreak',
            'platform_id' => $expansion->id,
            'price' => 1399.00,
            'stock' => 12,
            'is_featured' => false,
            'description' => null,
        ]);

        Game::create([
            'title' => 'Monster Hunter Wilds',
            'platform_id' => $baseGame->id,
            'price' => 2499.00,
            'stock' => 40,
            'is_featured' => true,
            'description' => 'Hunt across shifting landscapes.',
        ]);

        Game::create([
            'title' => 'Monster Hunter Generations Ultimate',
            'platform_id' => $baseGame->id,
            'price' => 1199.00,
            'stock' => 8,
            'is_featured' => false,
            'description' => 'Four hunting styles and a huge monster roster.',
        ]);
    }
}