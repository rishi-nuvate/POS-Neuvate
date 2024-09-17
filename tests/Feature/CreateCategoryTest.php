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
