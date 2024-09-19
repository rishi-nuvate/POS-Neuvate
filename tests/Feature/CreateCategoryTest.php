<?php

use App\Models\Category;
use App\Models\User;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test(' can create a brand', function () {

    $this->actingAs(User::factory()->createOne(['role' => 'Super Admin']));

    $requestData = [
        'CategoryName' => 'Sample Category',
        'SubCatName' => ['SubCat 1', 'SubCat 2', 'SubCat 3'],
    ];

    // Simulate the POST request to the route that handles category creation
    $response = $this->post(route('category.store'),$requestData);


    // Check if the category was created
    $this->assertDatabaseHas('categories', [
        'name' => 'Sample Category',
    ]);

    // Retrieve the created category
    $category = Category::where('name', 'Sample Category')->first();

    // Check if the subcategories were created
    foreach ($requestData['SubCatName'] as $subCatName) {
        $this->assertDatabaseHas('sub_categories', [
            'name' => $subCatName,
        ]);
    }

    // Check if the response was a redirect with success message
    $response->assertRedirect(); // Adjust this based on your actual redirection
    $response->assertSessionHas('success', 'Category has been created');
});
