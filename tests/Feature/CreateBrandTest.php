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
