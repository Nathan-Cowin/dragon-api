<?php

use App\Enums\UseType;
use App\Models\TrailerCategory;
use App\Models\TrailerSubCategory;
use Illuminate\Support\Facades\Schema;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\assertModelMissing;

/** Database table */
it('exists', function () {
    expect(Schema::hasTable('trailer_categories'))->toBeTrue();
});

/** create */
it('can create a trailer category', function () {
    /** @var TrailerCategory $trailerCategory */
    $trailerCategory = TrailerCategory::factory()->create();

    assertModelExists($trailerCategory);
});

/** update */
it('can update a trailer category', function () {
    /** @var TrailerCategory $trailerCategory */
    $trailerCategory = TrailerCategory::factory()->create();

    $data = TrailerCategory::factory()->make()->toArray();

    $trailerCategory->update($data);

    $data[$trailerCategory->getKeyName()] = $trailerCategory->getKey();
    assertDatabaseHas($trailerCategory->getTable(), $data);
});

/** delete */
it('can delete a trailer category', function () {
    /** @var TrailerCategory $trailerCategory */
    $trailerCategory = TrailerCategory::factory()->create();
    $trailerCategory->delete();

    assertModelMissing($trailerCategory);
});

/** fillable */
it('has fillable', function () {
    expect((new TrailerCategory)->getFillable())->toBe([
        'name',
        'use_type',
    ]);
});

/** trailerSubCategories() */
it('has many trailer sub categories', function () {
    /** @var TrailerCategory $trailerCategory */
    $trailerCategory = TrailerCategory::factory()->hasTrailerSubCategories(3)->create();

    $trailerSubCategories = $trailerCategory->trailerSubCategories;

    expect($trailerSubCategories)->toHaveCount(3);
    $trailerSubCategories->each(fn ($subCategory) => expect($subCategory)->toBeInstanceOf(TrailerSubCategory::class));
});

/** casts() */
it('has casts', function () {
    expect((new TrailerCategory)->getCasts())->toBe([
        'id' => 'int',
        'use_type' => UseType::class,
    ]);
});
