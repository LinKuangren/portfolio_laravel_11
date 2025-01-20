<?php

namespace Tests\Feature;

use App\Models\Categories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     */
    public function test_basic_route(): void
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    public function test_show_productions_for_category(): void
    {
        $category = Categories::factory()->create(['name' => 'Categorie', 'id' => 1]);

        $response = $this->get("/categories/Categorie-1/realisations");

        $response->assertOk();
        $response->assertSee('Categorie');
    }
}
