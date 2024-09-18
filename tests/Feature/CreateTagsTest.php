<?php

use App\Models\Tags;
use App\Models\User;

test('admin can create a season', function () {

    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    $data = [
        'name' => 'test'
    ];

    $this->post(route('tags.store'), $data)
        ->assertRedirect();

    expect(Tags::all())->count()->toBe(1)
        ->first()->name->toBe('test');
});



test('admin can update a tags', function () {
    // Create a user with the "Super Admin" role and log in
    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    // Create a brand to update
    $tag = \App\Models\Tags::factory()->createOne(['name' => 'Old tags Name']);

    // Data to update the brand
    $data = [
        'name' => 'updated tags Name',
    ];

    // Send the PUT request to update the brand
    $this->put(route('tags.update', $tag->id), $data)
        ->assertRedirect(); // Assert the request was redirected

    // Assert the brand was updated in the database
    expect(\App\Models\Tags::find($tag->id))
        ->name->toBe('updated tags Name');
});
