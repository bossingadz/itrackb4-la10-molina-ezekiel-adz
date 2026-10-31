@extends('layouts.app')

@section('title', $game->title)

@section('content')
<h2>{{ $game->title }}</h2>

<p><strong>ID:</strong> {{ $game->id }}</p>
<p><strong>Platform:</strong> {{ $game->platform->name }}</p>
<p><strong>Price:</strong> ₱{{ number_format($game->price, 2) }}</p>
<p><strong>Stock:</strong> {{ $game->stock }} pcs</p>

<p>
    <a href="{{ route('monsterhunters.index') }}">← Back to List</a>
</p>
@endsection