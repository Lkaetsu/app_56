<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Materia;
use Tests\TestCase;

class MateriasTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_the_materia_table_be_read(): void
    {
        $materia = Materia::factory()->create();

        $response = $this->get('/materia');

        $response->assertSee($materia->name);
    }

    public function test_can_create_an_materia(): void
    {
        $materia = Materia::factory()->make();

        $this->post('/materia', $materia->toArray());

        $this->assertDatabaseHas('materias', ['name' => $materia->name]);

    }

    public function test_an_materia_requires_a_name(): void
    {
        $materia = Materia::factory()->make(['name' => null]);

        $this->post('/materia', $materia->toArray())->assertSessionHasErrors('name');
    }

    public function test_can_update_an_materia(): void
    {
        $materia = Materia::factory()->create();
        $materia->name = "update name";

        $this->patch('/materia', $materia->toArray());

        $this->assertDatabaseHas('materias',['id'=> $materia->id, 'name' => 'update name']);
    }

    public function test_can_delete_an_materia(): void
    {
        $materia = Materia::factory()->create();
        
        $this->delete('/materia', $materia->toArray());

        $this->assertDatabaseMissing('materias',['id'=> $materia->id]);
    }
}
