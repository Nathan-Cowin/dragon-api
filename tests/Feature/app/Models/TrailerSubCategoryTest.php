<?php

use App\Models\TrailerCategory;
use App\Models\TrailerSubCategory;
use Illuminate\Support\Facades\Schema;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\assertModelMissing;

/** Database table */
it('exists', function () {
    expect(Schema::hasTable('trailer_sub_categories'))->toBeTrue();
});

/** create */
it('can create a trailer sub category', function () {
    /** @var TrailerSubCategory $trailerSubCategory */
    $trailerSubCategory = TrailerSubCategory::factory()->create();

    assertModelExists($trailerSubCategory);
});

/** update */
it('can update a trailer sub category', function () {
    /** @var TrailerSubCategory $trailerSubCategory */
    $trailerSubCategory = TrailerSubCategory::factory()->create();

    $data = TrailerSubCategory::factory()->make()->toArray();

    $trailerSubCategory->update($data);

    $data[$trailerSubCategory->getKeyName()] = $trailerSubCategory->getKey();
    assertDatabaseHas($trailerSubCategory->getTable(), $data);
});

/** delete */
it('can delete a trailer sub category', function () {
    /** @var TrailerSubCategory $trailerSubCategory */
    $trailerSubCategory = TrailerSubCategory::factory()->create();
    $trailerSubCategory->delete();

    assertModelMissing($trailerSubCategory);
});

/** fillable */
it('has fillable', function () {
    expect((new TrailerSubCategory)->getFillable())->toBe([
        'name',
        'long_description',
        'trailer_category_id',
    ]);
});

/** category() */
it('belongs to a category', function () {
    /** @var TrailerSubCategory $trailerSubCategory */
    $trailerSubCategory = TrailerSubCategory::factory()->create();

    expect($trailerSubCategory->trailerCategory)->toBeInstanceOf(TrailerCategory::class);
});

/** casts() */
it('has casts', function () {
    expect((new TrailerSubCategory)->getCasts())->toBe([
        'id' => 'int',
    ]);
});
