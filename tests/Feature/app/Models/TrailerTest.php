<?php

use App\Models\Trailer;
use App\Models\TrailerSubCategory;
use Illuminate\Support\Facades\Schema;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\assertModelMissing;

/** Database table */
it('exists', function () {
    expect(Schema::hasTable('trailers'))->toBeTrue();
});

/** create */
it('can create a trailer', function () {
    /** @var Trailer $trailer */
    $trailer = Trailer::factory()->create();

    assertModelExists($trailer);
});

/** update */
it('can update a trailer', function () {
    /** @var Trailer $trailer */
    $trailer = Trailer::factory()->create();

    $data = Trailer::factory()->make()->toArray();

    $trailer->update($data);

    $data[$trailer->getKeyName()] = $trailer->getKey();
    assertDatabaseHas($trailer->getTable(), $data);
});

/** delete */
it('can delete a trailer', function () {
    /** @var Trailer $trailer */
    $trailer = Trailer::factory()->create();
    $trailer->delete();

    assertModelMissing($trailer);
});

/** fillable */
it('has fillable', function () {
    expect((new Trailer)->getFillable())->toBe([
        'model_name',
        'gross_weight',
        'unladen_weight',
        'length',
        'width',
        'bed_height',
        'number_of_axles',
        'tyre_size',
        'trailer_sub_category_id',
    ]);
});

/** trailerSubCategory() */
it('belongs to a trailer sub category', function () {
    /** @var Trailer $trailer */
    $trailer = Trailer::factory()->create();

    expect($trailer->trailerSubCategory)->toBeInstanceOf(TrailerSubCategory::class);
});

/** casts() */
it('has casts', function () {
    expect((new Trailer)->getCasts())->toBe([
        'id' => 'int',
    ]);
});
