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
