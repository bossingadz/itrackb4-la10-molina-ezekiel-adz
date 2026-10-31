<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonsterHunterController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();

        $platformId = $request->query('platform');
        $priceRange = $request->query('price_range');

        $query = Game::with('platform');

        if ($platformId && $platformId !== 'all') {
            $query->where('platform_id', $platformId);
        }

        if ($priceRange === 'budget') {
            $query->where('price', '<=', 1500);
        } elseif ($priceRange === 'premium') {
            $query->where('price', '>', 1500);
        }

        $games = $query->get()->keyBy('id');
        $platforms = Platform::all();

        return view('monsterhunters.index', [
            'games' => $games,
            'platforms' => $platforms,
            'currentPlatform' => $platformId ?? 'all',
            'currentPriceRange' => $priceRange ?? 'all',
        ]);
    }

    public function create()
    {
        $platforms = Platform::all();
        return view('monsterhunters.create', compact('platforms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:200',
            'platform_id' => 'required|exists:platforms,id',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:1|max:100',
        ]);

        Game::create($validated);

        return redirect()->route('monsterhunters.index')
            ->with('success', 'New record added successfully!');
    }

    public function show(string $id)
    {
        $game = Game::findOrFail($id);
        return view('monsterhunters.show', compact('game'));
    }

    public function featured()
    {
        $game = Game::findOrFail(5);
        return view('monsterhunters.show', compact('game'));
    }

    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}