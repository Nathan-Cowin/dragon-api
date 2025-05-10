<?php

use App\Enums\UseType;
use App\Models\TrailerCategory;
use Illuminate\Support\Facades\Schema;

use function Pest\Laravel\assertDatabaseHas;

/** Database table */
it('exists', function () {
    expect(Schema::hasTable('trailer_categories'))->toBeTrue();
});

/** Persistence */
it('can be persisted', function () {
    $trailerCategory = TrailerCategory::factory()->create();

    assertDatabaseHas($trailerCategory->getTable(),[$trailerCategory->getKeyName() => $trailerCategory->getKey()], $trailerCategory->getConnectionName());
});

/** fillable */
it('has fillable', function () {
    expect((new TrailerCategory)->getFillable())->toBe([
        'use_type'
    ]);
});

/** casts() */
it('has casts', function () {
    expect((new TrailerCategory)->getCasts())->toBe([
        'id' => 'int',
        'use_type' => UseType::class,
    ]);
});
