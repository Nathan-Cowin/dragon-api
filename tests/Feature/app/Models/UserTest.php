<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\assertModelMissing;

/** Database table */
it('exists', function () {
    expect(Schema::hasTable('users'))->toBeTrue();
});

/** create */
it('can create a user', function () {
    /** @var User $user */
    $user = User::factory()->create();

    assertModelExists($user);
});

/** update */
it('can update a user', function () {
    /** @var User $user */
    $user = User::factory()->create();

    $data = User::factory()->raw([
        'password' => $user->password,
        'remember_token' => $user->remember_token
    ]);

    $user->update($data);

    $data[$user->getKeyName()] = $user->getKey();
    assertDatabaseHas($user->getTable(), $data);
});

/** delete */
it('can delete a user', function () {
    /** @var User $user */
    $user = User::factory()->create();
    $user->delete();

    assertModelMissing($user);
});

/** fillable */
it('has fillable', function () {
    expect((new User)->getFillable())->toBe([
        'name',
        'email',
        'password',
    ]);
});

/** casts() */
it('has casts', function () {
    expect((new User)->getCasts())->toBe([
        'id' => 'int',
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ]);
});
