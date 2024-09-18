<?php

use App\Models\Brand;
use App\Models\User;

test('admin can create a brand', function () {
    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    $data = [
        'name' => 'Test'
    ];

    $this->post(route('brand.store'), $data)
         ->assertRedirect();

    expect(Brand::all())->count()->toBe(1)
           ->first()->name->toBe('Test');
});

test('only admin can create a brand', function () {
    $this->actingAs(User::factory()->createOne(['role' => 'Student']));

    $data = [
        'name' => 'Test'
    ];

    $this->post(route('brand.store'), $data)
        ->assertForbidden();

    expect(Brand::all())->count()->toBe(0);
});

test('only valid data can be used to create a brand', function ($data, $error) {
    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    Brand::factory()->createOne(['name' => 'Duplicate']);

    $this->post(route('brand.store'), $data)
        ->assertInvalid($error);
})->with([
    'name required' => [['name' => ''], ['name' => 'required']],
    'name must be unique' => [['name' => 'Duplicate'], ['name' => 'already been taken']],
]);

test('admin can update a brand', function () {
    // Create a user with the "Super Admin" role and log in
    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    // Create a brand to update
    $brand = Brand::factory()->createOne(['name' => 'Old Brand Name']);

    // Data to update the brand
    $data = [
        'name' => 'Old Brand Name',
    ];

    // Send the PUT request to update the brand
    $this->put(route('brand.update', $brand->id), $data)
        ->assertRedirect(); // Assert the request was redirected

    // Assert the brand was updated in the database
    expect(Brand::find($brand->id))
        ->name->toBe('Old Brand Name');
});

test('super admin can delete a brand', function () {
    // Create a user with the "Super Admin" role and log in
    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    // Create a brand to delete
    $brand = Brand::factory()->createOne();

    // Send the DELETE request to delete the brand
    $this->post(route('brand.destroy', $brand->id))
        ->assertRedirect(); // Assert the request was redirected

    // Assert the brand was deleted from the database
    expect(Brand::find($brand->id))->toBeNull();
});

