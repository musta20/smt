<?php

use App\Models\Product;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it('can add new review', function (string $string) {

    $user = User::factory()->for(tenant())->create();
    $product = Product::factory()->withReview()->for(tenant())->create();
    $rating = rand(1, 5);
    $response = $this->actingAs($user)->post('/comment', [
        'rating' => $rating,
        'comment' => $string,
        'product_id' => $product->id,
    ]);

    $response->assertStatus(Response::HTTP_FOUND);
    $response->assertSessionHas('OkToast');

    $this->assertDatabaseHas('comments', [
        'product_id' => $product->id,
        'user_id' => $user->id,
        'comment' => $string,
        'rating' => $rating,
    ]
    );

})->with(data: 'strings');

it("can't add review with invalid info", function (string $string) {

    $user = User::factory()->for(tenant())->create();
    $product = Product::factory()->for(tenant())->create();
    $response = $this->actingAs($user)->post('/comment', [
        'ratting' => '',
        'comment' => '2',
        'product_id' => $product->id,
    ]);

    $response->assertSessionHasErrors();

})->with(data: 'strings');
