<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class MonsterHunterController extends Controller
{
    public function index(Request $request)
    {
        $platform = $request->query('platform', 'all');
        $priceRange = $request->query('price_range', 'all');

        $query = Game::query();

        if ($platform !== 'all') {
            $query->whereRaw('LOWER(platform) = ?', [strtolower($platform)]);
        }

        if ($priceRange === 'budget') {
            $query->where('price', '<=', 1500);
        } elseif ($priceRange === 'premium') {
            $query->where('price', '>', 1500);
        }

        $games = $query->get()->keyBy('id');

        return view('monsterhunters.index', [
            'games' => $games,
            'currentPlatform' => $platform,
            'currentPriceRange' => $priceRange,
        ]);
    }

    public function create()
    {
        return view('monsterhunters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:200',
            'platform' => 'required|in:Base Game,Expansion',
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