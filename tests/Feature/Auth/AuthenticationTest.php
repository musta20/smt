<?php


use App\Models\User;



test('users can not authenticate without tenant ', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertGuest();
});



