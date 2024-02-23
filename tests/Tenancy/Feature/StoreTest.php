<?php

use App\Models\Store;
use App\Models\Tenant;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it("can render store config page",function(){
    $user = User::factory()->for(tenant())->create();
    Store::factory()->for($user)->for(tenant())->create();
    $response = $this->actingAs($user)->get('admin/store/');
    $response->assertStatus(Response::HTTP_OK);
});

it("can update store config",function(){

    $user = User::factory()->for(tenant())->create();

    $store =Store::factory()->for($user)->for(tenant())->create([
        "title" => "old",
    ]);

    $response = $this->actingAs($user)->put('/admin/store/'.$store->id , [
        "title" => "title",
        "discription" => "title desvription",
    ]);

    $response->assertStatus(Response::HTTP_FOUND);

    $response->assertRedirect('/admin/store');

    $store->refresh();
    expect($store->title)->toBe("title"); 

});

it("can't update config with invalid values",function(){
    $user = User::factory()->for(tenant())->create();
    $store =Store::factory()->for($user)->for(tenant())->create();
    $response = $this->actingAs($user)->put('/admin/store/'.$store->id , [
        "title" => ''
    ]);

    $response->assertSessionHasErrors();
});


?>