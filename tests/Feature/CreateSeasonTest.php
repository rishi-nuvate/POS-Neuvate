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
