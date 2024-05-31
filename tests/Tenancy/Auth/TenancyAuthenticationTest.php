<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

it('login screen can be rendered', function () {

    $response = $this->get(RouteServiceProvider::LOGIN);

    $response->assertStatus(Response::HTTP_OK);
});

it('users can authenticate using the login screen', function () {

    $user = User::factory()->for(tenant())->create();

    $response = $this->post(RouteServiceProvider::LOGIN, [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertValid();

    $this->assertAuthenticated();

    $response->assertRedirect(RouteServiceProvider::HOME);
});

it('users can not authenticate with invalid password', function () {

    $user = User::factory()->for(tenant())->create();

    $this->post(RouteServiceProvider::LOGIN, [
        'email' => $user->email,
        'password' => 'invalid-password',
    ]);

    $this->assertGuest();
});

it('users can logout', function () {

    $user = User::factory()->for(tenant())->create();

    $response = $this->actingAs($user)->post(RouteServiceProvider::LOGOUT);

    $this->assertGuest();

    $response->assertRedirect('/');

});
