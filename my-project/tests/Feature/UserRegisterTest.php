<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_regstir(): void
    {
        $data = [
            'first_name' => 'ahmad',
            'last_name' => 'obeidat',
            'email'=>'ahmed@obeidat.com',
            'uuid' => 'ahobi1988'
        ];
        $response = $this->post('/api/register', $data);

        $response->assertStatus(200);
    }

}

Subject: Task Completion Request


