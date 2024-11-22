<?php

use App\Models\Category;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it('can render category management page', function () {

    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/category');

    $response->assertStatus(Response::HTTP_OK);
});

it('can render category edit page', function () {
    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $category = Category::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/category/' . $category->id . '/edit');

    $response->assertStatus(Response::HTTP_OK);
});

it('can add new category', function ($string) {
    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->post('/admin/category/', [
        'name' => $string,
        'description' => $string,
    ]);

    $this->assertDatabaseHas('categories', [
        'name' => $string,
        'description' => $string,
    ]);

    $response->assertStatus(Response::HTTP_FOUND);

    $response->assertRedirect('/admin/category/');

    $response->assertSessionHas('OkToast');
})->with(data: 'strings');

it('get 404 when trying to view category item with wrong id', function () {

    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/category/000/edit');

    $response->assertStatus(Response::HTTP_NOT_FOUND);
});

it('get 422 when trying to create new category item with invalid value', function () {
    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->post('/admin/category/', [
        'name' => '',
        'discription' => '',
    ]);

    $response->assertSessionHasErrors();

})->with(data: 'strings');

it('can delete a category item', function () {
    $user = User::factory()->withVenderRole()->create();

    $category = Category::factory()->create();

    $response = $this->actingAs($user)->delete('/admin/category/' . $category->id);

    $response->assertRedirect('/admin/category');

    $category->fresh();

    $response->assertSessionHas('OkToast');

    $this->assertSoftDeleted($category);

    $response->assertStatus(Response::HTTP_FOUND);
});

it('get 404 when try to delete a category item with wrong id', function () {
    $user = User::factory()->withVenderRole()->create();
    $response = $this->actingAs($user)->delete('/admin/category/000');
    $response->assertStatus(Response::HTTP_NOT_FOUND);
});

it('get erorrs when trying to update a category with invalid value', function () {

    $user = User::factory()->withVenderRole()->create();

    $category = Category::factory()->create();

    $response = $this->actingAs($user)->put('/admin/category/' . $category->id, [
        'name' => '',
        'discription' => '',
    ]);

    $response->assertSessionHasErrors();
})->with(data: 'strings');

it('can update category', function () {

    $user = User::factory()->withVenderRole()->create();

    $category = Category::factory()->create();

    $response = $this->actingAs($user)->put('/admin/category/' . $category->id, [
        'name' => 'new-name',
        'description' => 'new-description',
    ]);

    $this->assertDatabaseHas('categories', [
        'name' => 'new-name',
        'description' => 'new-description',
    ]);

    $response->assertRedirect('/admin/category');
});

it('redirect to login page when trying to modify category while not authorized', function () {

    $category = Category::factory()->create();

    $response = $this->put('/admin/category/' . $category->id, [
        'name' => 'new-name',
        'description' => 'new-description',
    ]);

    $response->assertRedirect('/login');
});
