<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Database\Seeders\TestSeeder;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

it('email verification screen can be rendered', function () {
    $user = User::factory()->for(tenant())->create([
        'email_verified_at' => null,
    ]);

   // (new TestSeeder())->run(tenant(), $user);

    $response = $this->actingAs($user)->get('/verify-email');

    $response->assertStatus(Response::HTTP_OK);
});



it('email can be verified', function () {
    $user = User::factory()->for(tenant())->create([
        'email_verified_at' => null,
    ]);

    Event::fake([Verified::class]);

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $response = $this->actingAs($user)->get($verificationUrl);

    Event::assertDispatched(Verified::class);
    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(RouteServiceProvider::HOME . '?verified=1');
});


it('email is not verified with invalid hash', function () {
    $user = User::factory()->for(tenant())->create([
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($user)->get($verificationUrl);

    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
});
