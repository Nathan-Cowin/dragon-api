<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trailer extends Model
{
    /** @use HasFactory<\Database\Factories\TrailerFactory> */
    use HasFactory;

    protected $fillable = [
        'model_name',
        'gross_weight',
        'unladen_weight',
        'length',
        'width',
        'bed_height',
        'number_of_axles',
        'tyre_size',
        'trailer_sub_category_id',
    ];

    /**
     * @return BelongsTo<TrailerSubCategory, $this>
     */
    public function trailerSubCategory(): BelongsTo
    {
        return $this->belongsTo(TrailerSubCategory::class);
    }
}
