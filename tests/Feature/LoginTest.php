<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Guest user enters front page
     */
    public function testGuestUserEntersFrontPage()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

    /**
     * Authenticated user enters front page
     */
    public function testAuthenticatedUserEntersFrontPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }

    /**
     * Authenticated user cannot enter to login page
     */
    public function testAuthenticatedUserCannotEnterToLoginPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('login'));
        $response->assertRedirect('/');
    }
}
