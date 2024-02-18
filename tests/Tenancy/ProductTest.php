<?php

use App\Models\Product;
use App\Models\Store;
use App\Models\User;

it("can render product management page",function(){
    $user = User::factory()->for(tenant())->create();
    $response = $this->actingAs($user)->get('admin/product');

    $response->assertStatus(200);
});

it("can render product edit page",function(){
    $user = User::factory()->for(tenant())->create();

    $store=Store::factory()->for($user)->for(tenant())->create();

    $product = Product::factory()->for($store)->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/product/'.$product->id.'/edit');

    $response->assertStatus(200);
});


it("get list of product only belong to your store",function(){

})->skip();

it("can render product update page",function(){})->skip();

it("can add new product",function(){})->skip();

it("get 403 add new product on deferent store ",function(){})->skip();

it("get 404 when trying to view product item with wrong id",function(){})->skip();

it("get 422 when trying to create new product item with invalid value",function(){})->skip();

it("can delete a product item",function(){})->skip();

it("get 404 when try to delete a product item with wrong id",function(){})->skip();

it("get 422 when trying to update a product with invalid value",function(){})->skip();

it("can update product",function(){})->skip();

it("get 403 when updating  product that dose not belong to your tenant",function(){})->skip();

it("get 401 when trying to modify product while not authorized",function(){})->skip();

it("get 403 when trying to modify product that dose not belong to user",function(){})->skip();

it("get 403 when trying to modify product on a deferent tenant",function(){})->skip();


?>