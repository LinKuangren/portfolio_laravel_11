<?php

namespace Tests\Feature;

use App\Models\Experiences;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExperiencesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_basic_route(): void
    {
        $response = $this->get('/experiences');

        $response->assertStatus(200);
    }

    public function test_show(): void
    {
        $experience = Experiences::factory()->create();

        $response = $this->get("/experiences/{$experience->slug}-{$experience->id}");

        $response->assertStatus(200);
    }
}
