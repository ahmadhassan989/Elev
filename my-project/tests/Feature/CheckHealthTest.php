<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckHealthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_check(): void
    {
        $response = $this->get('/api/health');

        $response->assertStatus(200);
    }
}
