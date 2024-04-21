<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Curso;
use Tests\TestCase;

class CursosTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_the_curso_table_be_read(): void
    {
        $curso = Curso::factory()->create();

        $response = $this->get('/curso');

        $response->assertSee($curso->name);
    }

    public function test_can_create_a_curso(): void
    {
        $curso = Curso::factory()->make();

        $this->post('/curso', $curso->toArray());

        $this->assertDatabaseHas('cursos', ['name' => $curso->name]);

    }

    public function test_that_a_curso_requires_a_name(): void
    {
        $curso = Curso::factory()->make(['name' => null]);

        $this->post('/curso', $curso->toArray())->assertSessionHasErrors('name');
    }

    public function test_can_update_a_curso(): void
    {
        $curso = Curso::factory()->create();
        $curso->name = "update name";

        $this->patch('/curso', $curso->toArray());

        $this->assertDatabaseHas('cursos',['id'=> $curso->id, 'name' => 'update name']);
    }

    public function test_can_delete_a_curso(): void
    {
        $curso = Curso::factory()->create();
        
        $this->delete('/curso', $curso->toArray());

        $this->assertDatabaseMissing('cursos',['id'=> $curso->id]);
    }
}
