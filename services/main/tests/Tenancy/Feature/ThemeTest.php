<?php

use App\Models\Store;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it('can render themes config page', function () {
    $user = User::factory()->withVenderRole()->for(tenant())->create();
    Store::factory()->for($user)->for(tenant())->create();
    $response = $this->actingAs($user)->get('admin/themes/');
    $response->assertStatus(Response::HTTP_OK);
});

it('can update theme ', function () {

    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->put('/admin/updateTheme/', [
        'theme' => 'Default',
    ]);

    $response->assertStatus(Response::HTTP_FOUND);

    $response->assertRedirect('/admin/themes');

    $response->assertSessionHas('OkToast');

});

it("can't update theme with invalid values", function () {
    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->put('/admin/updateTheme/', [
        'theme' => '',
    ]);

    $response->assertStatus(Response::HTTP_FOUND);

    $response->assertSessionHasErrors();
});
