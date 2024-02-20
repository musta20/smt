<?php

use App\Models\Category;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it("can render category management page",function(){
    $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/category');

    $response->assertStatus(Response::HTTP_OK);
    
});


it("can render category edit page", function () {
    $user = User::factory()->for(tenant())->create();

    $category = Category::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/category/'.$category->id.'/edit');

    $response->assertStatus(Response::HTTP_OK);
});


it("can add new category",function($string){  
     $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->post('/admin/category/', [
        "name" => $string,
        "discription" => $string,
    ]);

    $response->assertStatus(Response::HTTP_FOUND);

    $category = Category::first();

    $response->assertRedirect('/admin/caregory/');

})->with(data: 'strings');

it("can't add new category on deferent store ",function(){})->skip();

it("get 404 when trying to view category item with wrong id",function(){})->skip();

it("get 422 when trying to create new category item with invalid value",function(){})->skip();

it("can add new child category",function(){})->skip();

it("can delete a category item",function(){})->skip();

it("get 404 when try to delete a category item with wrong id",function(){})->skip();

it("get 422 when trying to update a category with invalid value",function(){})->skip();

it("can update category",function(){})->skip();

it("can change parent category",function(){})->skip();

it("can't change parent category that dose not belong to your tenant",function(){})->skip();

it("get 401 when trying to modify category while not authorized",function(){})->skip();

it("get 403 when trying to modify category that dose not belong to user",function(){})->skip();

it("get 403 when trying to modify category on a deferent tenant",function(){})->skip();

?>