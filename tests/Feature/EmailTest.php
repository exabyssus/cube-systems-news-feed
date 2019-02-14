<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmailTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * User email check [scenario: when not exists]
     */
    public function testUserEmailNotExists()
    {
        $response = $this->json(
            'GET', // Method
            route('verify.email', 'page@google.com') // Route with parameter
        );
        $response->assertStatus(200)
            ->assertJson([]);
    }

    /**
     * User email check [scenario: when exists]
     */
    public function testUserEmailExists()
    {
        $user = factory(User::class)->create();
        $response = $this->json(
            'GET', // Method
            route('verify.email', $user->email) // Route with parameter
        );

        $response->assertStatus(422)
            ->assertJson([]);
    }
}
