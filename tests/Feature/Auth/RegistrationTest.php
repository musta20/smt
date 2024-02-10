<?php


test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function (string $string) {

    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'domain' => $string,
        'password' => 'password',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertDatabaseHas('users', [
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    $this->assertDatabaseHas('domains', [
        'name' => $string,
    ]);
    $response->assertStatus(302);

})->with(data: 'strings');
