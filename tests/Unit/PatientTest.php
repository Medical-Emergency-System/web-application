<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PatientTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [
            'name' => "New Patient",
           'address' => "This is a product",
           'birthday' => 1999-8-12,
           'phone' => '0996547831',
     ];

     $response = $this->json('POST', '/admin/patients',$data);
     $response->assertStatus(401);
     $response->assertJson(['message' => "Unauthenticated."]);

        $this->assertTrue(true);
    }
}
