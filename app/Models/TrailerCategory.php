<?php

namespace App\Models;

use App\Enums\UseType;
use Database\Factories\TrailerCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrailerCategory extends Model
{
    /** @use HasFactory<TrailerCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'use_type'
    ];

    /**
     * @return HasMany<TrailerSubCategory, $this>
     */
    public function trailerSubCategories(): HasMany
    {
        return $this->hasMany(TrailerSubCategory::class);
    }


    protected function casts(): array
    {
        return [
            'use_type' => UseType::class,
        ];
    }
}
