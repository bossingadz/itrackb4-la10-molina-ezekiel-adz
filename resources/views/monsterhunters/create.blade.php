@extends('layouts.app')
@section('title', 'Add New Game')
@section('content')
<h2> Add New Game</h2>

<form method="POST" action="{{ route('monsterhunters.store') }}">
    @csrf

    <p>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="platform_id">Platform:</label><br>
        <select id="platform_id" name="platform_id" class="form-select">
            <option value="">-- Select Platform --</option>
            @foreach ($platforms as $platformItem)
                <option value="{{ $platformItem->id }}" @selected(old('platform_id') == $platformItem->id)>
                    {{ $platformItem->name }}
                </option>
            @endforeach
        </select>
        @error('platform_id') <span class="text-danger">{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="price">Price (₱):</label><br>
        <input type="text" id="price" name="price" value="{{ old('price') }}" class="form-control">
        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="stock">Stock Quantity:</label><br>
        <input type="number" id="stock" name="stock" value="{{ old('stock') }}" class="form-control">
        @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
    </p>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('monsterhunters.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection