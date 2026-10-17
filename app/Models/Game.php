<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title', 'platform', 'price', 'stock', 'is_featured', 'description'];

    protected function casts(): array
    {
        return [
            'stock' => 'integer',
            'is_featured' => 'boolean',
            'price' => 'decimal:2',
        ];
    }
}
