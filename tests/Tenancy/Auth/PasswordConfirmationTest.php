<?php

use App\Models\User;
use Database\Seeders\TestSeeder;
use Symfony\Component\HttpFoundation\Response;

test('confirm password screen can be rendered', function () {
    $user = User::factory()->for(tenant())->create();

    //(new TestSeeder())->run(tenant(), $user);

    $response = $this->actingAs($user)->get('/confirm-password');

    $response->assertStatus(Response::HTTP_OK);
});

test('password can be confirmed', function () {
    $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->post('/confirm-password', [
        'password' => 'password',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password', function () {
    $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->post('/confirm-password', [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
});
