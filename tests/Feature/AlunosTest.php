<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Aluno;
use Tests\TestCase;

class AlunosTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_the_alunos_table_be_read(): void
    {
        $aluno = Aluno::factory()->create();

        $response = $this->get('/aluno');

        $response->assertSee($aluno->name);
    }

    public function test_can_create_an_aluno(): void
    {
        $aluno = Aluno::factory()->make();

        $this->post('/aluno', $aluno->toArray());

        $this->assertDatabaseHas('alunos', ['RA' => $aluno->RA]);

    }

    public function test_an_aluno_requires_a_name(): void
    {
        $aluno = Aluno::factory()->make(['name' => null]);

        $this->post('/aluno', $aluno->toArray())->assertSessionHasErrors('name');
    }

    public function test_an_aluno_requires_a_RA(): void
    {
        $aluno = Aluno::factory()->make(['RA' => null]);

        $this->post('/aluno', $aluno->toArray())->assertSessionHasErrors('RA');
    }

    public function test_can_update_an_aluno(): void
    {
        $aluno = Aluno::factory()->create();
        $aluno->name = "update name";

        $this->patch('/aluno', $aluno->toArray());

        $this->assertDatabaseHas('alunos',['id'=> $aluno->id, 'name' => 'update name']);
    }

    public function test_can_delete_an_aluno(): void
    {
        $aluno = Aluno::factory()->create();
        
        $this->delete('/aluno', $aluno->toArray());

        $this->assertDatabaseMissing('alunos',['id'=> $aluno->id]);
    }
}
