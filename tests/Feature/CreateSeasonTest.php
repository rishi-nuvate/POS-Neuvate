<?php

use App\Models\Season;
use App\Models\User;

test('admin can create a season', function () {

    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    $data = [
        'name' => 'test'
    ];

    $this->post(route('season.store'), $data)
        ->assertRedirect();

    expect(Season::all())->count()->toBe(1)
        ->first()->name->toBe('test');
});

test('admin can update a tags', function () {
    // Create a user with the "Super Admin" role and log in
    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    // Create a brand to update
    $tag = \App\Models\Season::factory()->createOne(['name' => 'Old season Name']);

    // Data to update the brand
    $data = [
        'name' => 'updated season Name',
    ];

    // Send the PUT request to update the brand
    $this->put(route('season.update', $tag->id), $data)
        ->assertRedirect(); // Assert the request was redirected

    // Assert the brand was updated in the database
    expect(\App\Models\Season::find($tag->id))
        ->name->toBe('updated season Name');
});
