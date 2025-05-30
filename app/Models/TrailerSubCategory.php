<?php

namespace App\Models;

use Database\Factories\TrailerSubCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrailerSubCategory extends Model
{
    /** @use HasFactory<TrailerSubCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'long_description',
        'trailer_category_id',
    ];

    /**
     * @return HasMany<Trailer, $this>
     */
    public function trailers(): HasMany
    {
        return $this->hasMany(Trailer::class);
    }

    /**
     * @return BelongsTo<TrailerCategory, $this>
     */
    public function trailerCategory(): BelongsTo
    {
        return $this->belongsTo(TrailerCategory::class);
    }
}
