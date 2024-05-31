<?php

use App\Models\Product;
use App\Models\ShopCart;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it('can  add product to shoping cart', function () {

    $user = User::factory()->for(tenant())->create();
    $product = Product::factory()->for(tenant())->create();
    $response = $this->actingAs($user)->get('/addToCart/' . $product->id);

    $this->assertDatabaseHas('shop_carts', [
        'product_id' => $product->id,
        'user_id' => $user->id,
    ]);

    $response->assertStatus(Response::HTTP_FOUND);
    $response->assertSessionHas('OkToast');
});

it('can  add product to shoping cart while not loged in', function () {

    $product = Product::factory()->for(tenant())->create();
    $response = $this->get('/addToCart/' . $product->id);

    $response->assertStatus(Response::HTTP_FOUND);
    $response->assertSessionHas('OkToast');
    $response->assertSessionHas('cart');
});

it('can render a shoping cart list while not loged in ', function () {

    $response = $this->get('/showCart');

    $response->assertStatus(Response::HTTP_OK);

});

it('can render a shoping cart list ', function () {

    $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->get('/showCart');

    $response->assertStatus(Response::HTTP_OK);

});

it('can  remove product from shoping cart', function () {

    $user = User::factory()->for(tenant())->create();
    $product = Product::factory()->for(tenant())->create();

    ShopCart::factory()->for($product)->for($user)->for(tenant())->create();

    $response = $this->actingAs($user)->get('/removeCart/' . $product->id);

    $this->assertDatabaseMissing('shop_carts', [
        'product_id' => $product->id,
        'user_id' => $user->id,
        'deleted_at' => null,
    ]);

    $response->assertStatus(Response::HTTP_FOUND);
    $response->assertSessionHas('OkToast');
});

it('can  remove product from shoping cart while not loged in', function () {

    $product = Product::factory()->for(tenant())->create();
    $this->get('/addToCart/' . $product->id);

    $response = $this->get('/removeCart/' . $product->id);

    $response->assertStatus(Response::HTTP_FOUND);
    $response->assertSessionHas('OkToast');
});
