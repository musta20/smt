<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

it("can render product management page", function () {
    $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/product');

    $response->assertStatus(Response::HTTP_OK);
});

it("can render product edit page", function () {
    $user = User::factory()->for(tenant())->create();

    $store = Store::factory()->for($user)->for(tenant())->create();

    $product = Product::factory()->for($store)->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/product/' . $product->id . '/edit');

    $response->assertStatus(Response::HTTP_OK);
});

it("can render creating product page", function () {
    $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->get('/admin/product/create');

    $response->assertStatus(Response::HTTP_OK);
});

it("can add new product", function (string $string) {

    $user = User::factory()->for(tenant())->create();
    $categories = Category::factory(2)->for(tenant())->create();

    Storage::fake('image');
    $image = UploadedFile::fake()->image('image.png');
    $response = $this->actingAs($user)->post('/admin/product/', [
        "name" => $string,
        "discription" => $string,
        "price" => 423,
        "order_url" => "http://" . $string . ".com",
        "discount" => 51,
        "category" => $categories->pluck('id')->toArray(),
        "older_price" => 40,
        "image" => $image
    ]);

    $response->assertStatus(Response::HTTP_FOUND);

    $product = Product::first();

    $response->assertRedirect('/admin/product/' . $product->id . '/edit');

    Storage::disk('media')->assertExists($image->hashName());
})->with(data: 'strings');

it("get 404 when trying to view product item with wrong id", function () {
    $user = User::factory()->for(tenant())->create();
    $response = $this->actingAs($user)->get('/admin/product/000/edit');
    $response->assertStatus(Response::HTTP_NOT_FOUND);
});

it("get 422 when trying to create new product item with invalid value", function (string $string) {

    $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->post('/admin/product/', [
        "name" => '1',
        "discription" => 1,
        "order_url" => "http://" . $string . ".com",
        "discount" => 51,
        "older_price" => 40,
    ]);

    $response->assertSessionHasErrors();
})->with(data: 'strings');

it("can delete a product item", function () {
    $user = User::factory()->for(tenant())->create();
    $product = Product::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->delete('admin/product/' . $product->id);


    $response->assertRedirect('/admin/product');

    $response->assertStatus(Response::HTTP_FOUND);

    $this->assertSoftDeleted($product);

});

it("get 404 when try to delete a product item with wrong id", function () {

    $user = User::factory()->for(tenant())->create();
    $response = $this->actingAs($user)->delete('admin/product/000');

    $response->assertStatus(Response::HTTP_NOT_FOUND);

});

it("get 422 when trying to update a product with invalid value", function ($string) {
    $user = User::factory()->for(tenant())->create();
    $product = Product::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->put('/admin/product/'.$product->id , [
        "name" => '',
        "discription" => 1,
        "order_url" => "http://" . $string . ".com",
        "discount" => 51,
        "older_price" => 40,
    ]);

    $response->assertSessionHasErrors();

})->with(data: 'strings');


it("can update product", function (string $string) {

    $user = User::factory()->for(tenant())->create();
    $categories = Category::factory(2)->for(tenant())->create();

    $product = Product::factory()->for(tenant())->create();
    $response = $this->actingAs($user)->put('/admin/product/'.$product->id, [
        "name" => $string,
        "discription" => $string,
        "price" => 423,
        "order_url" => "http://" . $string . ".com",
        "discount" => 51,
        "category" => $categories->pluck('id')->toArray(),
        "older_price" => 40,
    ]);

    $response->assertStatus(Response::HTTP_FOUND);

    $product = Product::first();

    $response->assertRedirect('/admin/product/' . $product->id . '/edit');
})->with(data: 'strings');

it("get 401 when trying to modify product while not authorized", function () {

    $product = Product::factory()->for(tenant())->create();
    $response = $this->put('/admin/product/'.$product->id, [
        "name" => "NAME",
    ]);

    $response->assertStatus(Response::HTTP_FOUND);
    $response->assertRedirect('/login');
});

it("get 403 when trying to modify product that dose not belong to tenant", function (string $string) {

    $user = User::factory()->for(tenant())->create();
    $categories = Category::factory(2)->for(tenant())->create();
    $product = Product::factory()->for(Tenant::factory()->create())->create();
    $response = $this->actingAs($user)->put('/admin/product/'.$product->id, [
        "name" => $string,
        "discription" => $string,
        "price" => 423,
        "order_url" => "http://" . $string . ".com",
        "discount" => 51,
        "category" => $categories->pluck('id')->toArray(),
        "older_price" => 40,
    ]);
    $response->assertStatus(Response::HTTP_NOT_FOUND);

    // $response->assertSessionHasErrors();


})->with(data:'strings');
