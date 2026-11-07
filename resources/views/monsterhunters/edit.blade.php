@extends('layouts.app')
@section('title', 'Edit Game')
@section('content')
<h2 class="mb-4">Edit Game</h2>

<form method="POST" action="{{ route('monsterhunters.update', $game) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $game->title) }}" class="form-control">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="platform_id" class="form-label">Platform:</label>
        <select id="platform_id" name="platform_id" class="form-select">
            <option value="">-- Select Platform --</option>
            @foreach ($platforms as $platformItem)
                <option value="{{ $platformItem->id }}" @selected(old('platform_id', $game->platform_id) == $platformItem->id)>
                    {{ $platformItem->name }}
                </option>
            @endforeach
        </select>
        @error('platform_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price (₱):</label>
        <input type="text" id="price" name="price" value="{{ old('price', $game->price) }}" class="form-control">
        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock Quantity:</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock', $game->stock) }}" class="form-control">
        @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="{{ route('monsterhunters.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection