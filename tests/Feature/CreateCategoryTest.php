<?php

use App\Models\CategoryMaster;
use App\Models\User;

test('admin can create a season', function () {

    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    $data = [
        'CategoryName' => 'test'
    ];

    $this->post(route('category.store'), $data)
        ->assertRedirect();

    $category = CategoryMaster::first();

    // Assertions
    expect($category)->not->toBeNull();
    expect($category->CategoryName)->toBe('test');

});



test('admin can update a brand', function () {
    // Create a user with the "Super Admin" role and log in
    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    // Create a brand to update
    $season = \App\Models\Season::factory()->createOne(['name' => 'Old Brand Name']);

    // Data to update the brand
    $data = [
        'name' => 'updated Brand Name',
    ];

    // Send the PUT request to update the brand
    $this->put(route('brand.update', $season->id), $data)
        ->assertRedirect(); // Assert the request was redirected

    // Assert the brand was updated in the database
    expect(\App\Models\Season::find($season->id))
        ->name->toBe('updated Brand Name');
});
