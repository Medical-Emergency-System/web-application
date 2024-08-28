<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {

        $response = $this->actingAs($user, '/admin/loign')->post('/admin/patients',[
            'email' => 'admin@admin.com',
            'password'  => 'password'
        ]);

        $response->assertStatus(302);
        // $this->assertTrue(true);
    }
}
