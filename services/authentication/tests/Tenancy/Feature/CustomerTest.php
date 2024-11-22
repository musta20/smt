<?php

use App\Enums\Identity\Role;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it('can render customer management page', function () {

    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->get('admin/customer');

    $response->assertStatus(Response::HTTP_OK);
});

it('can delete customer ', function () {

    $user = User::factory()->withVenderRole()->for(tenant())->create();
    $customer = User::factory()->withRole(Role::CUSTOMER->value)->for(tenant())->create();

    $response = $this->actingAs($user)->delete('admin/customer/' . $customer->id);

    $response->assertSessionHas('OkToast');
    $this->assertDataBaseHas('users', [
        'id' => $customer->id,
    ]);
    $response->assertStatus(Response::HTTP_FOUND);
});
