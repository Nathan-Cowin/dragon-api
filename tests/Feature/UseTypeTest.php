<?php

use App\Enums\UseType;

/** Enum values */
it('has the correct enum values', function () {
    expect(UseType::LIVESTOCK->value)->toBe('livestock')
        ->and(UseType::COMMERCIAL->value)->toBe('commercial');
});

/** Enum instantiation */
it('can be instantiated from string value', function () {
    expect(UseType::from('livestock'))->toBe(UseType::LIVESTOCK)
        ->and(UseType::from('commercial'))->toBe(UseType::COMMERCIAL);
});
