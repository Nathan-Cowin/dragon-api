<?php

use App\Models\TrailerCategory;
use Illuminate\Testing\Fluent\AssertableJson;

use function Pest\Laravel\getJson;

beforeEach(function () {
    login();
});

it('returns a list of all trailer categories', function () {
    TrailerCategory::factory()->count(3)->create();

    getJson(route('api.trailer-categories.index'))
        ->assertOk()
        ->assertJson(fn (AssertableJson $json) => $json
            ->has('data', 3, fn (AssertableJson $json) => $json
                ->hasAll('id', 'name', 'use_type')
            )
            ->hasAll('meta', 'links')
        )
        ->assertJsonMissingValidationErrors();
});
