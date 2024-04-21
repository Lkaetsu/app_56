<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Professor;
use Tests\TestCase;

class ProfessorsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_the_professor_table_be_read(): void
    {
        $professor = Professor::factory()->create();

        $response = $this->get('/professor');

        $response->assertSee($professor->name);
    }

    public function test_can_create_a_professor(): void
    {
        $professor = Professor::factory()->make();

        $this->post('/professor', $professor->toArray());

        $this->assertDatabaseHas('professors', ['name' => $professor->name]);

    }

    public function test_that_a_professor_requires_a_name(): void
    {
        $professor = Professor::factory()->make(['name' => null]);

        $this->post('/professor', $professor->toArray())->assertSessionHasErrors('name');
    }

    public function test_a_professor_requires_a_RP(): void
    {
        $professor = Professor::factory()->make(['RP' => null]);

        $this->post('/professor', $professor->toArray())->assertSessionHasErrors('RP');
    }

    public function test_can_update_a_professor(): void
    {
        $professor = Professor::factory()->create();
        $professor->name = "update name";

        $this->patch('/professor', $professor->toArray());

        $this->assertDatabaseHas('professors',['id'=> $professor->id, 'name' => 'update name']);
    }

    public function test_can_delete_a_professor(): void
    {
        $professor = Professor::factory()->create();
        
        $this->delete('/professor', $professor->toArray());

        $this->assertDatabaseMissing('professors',['id'=> $professor->id]);
    }
}
