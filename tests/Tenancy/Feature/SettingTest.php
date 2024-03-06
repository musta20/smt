<?php

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it("can render setting config page", function () {
    $user = User::factory()->withVenderRole()->for(tenant())->create();
    $response = $this->actingAs($user)->get('admin/setting');
    $response->assertStatus(Response::HTTP_OK);
});

it("can update setting config", function () {

    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->put('/admin/updateSetting/', [
        "siteStatus" => false,
        "aboutPageContent" => "new-aboutPageContent",
        
    ]);

    $response->assertStatus(Response::HTTP_FOUND);

    $response->assertRedirect('/admin/setting');


    $response->assertSessionHas('OkToast');


    $this->assertDatabaseHas(
        'stores',
        [
            "about" => "new-aboutPageContent",
        ]
    );

    $this->assertDatabaseHas(
        'settings',
        [
            "key" => "siteStatus",
            "value" => "DRAFT",
            "tenant_id" => tenant('id'),
        ]
    );
});

it("can't update config setting with invalid values", function () {
    $user = User::factory()->withVenderRole()->for(tenant())->create();

    $response = $this->actingAs($user)->put('/admin/updateSetting/', [
        "siteStatus" => null,
        "aboutPageContent" => "1",
        
    ]);

    $response->assertStatus(Response::HTTP_FOUND);
    
    $response->assertSessionHasErrors();
});
