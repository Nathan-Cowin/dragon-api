<?php

namespace App\Models;

use App\Enums\UseType;
use Database\Factories\TrailerCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrailerCategory extends Model
{
    /** @use HasFactory<TrailerCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'use_type'
    ];

    protected function casts(): array
    {
        return [
            'use_type' => UseType::class,
        ];
    }
}
