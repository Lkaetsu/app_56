<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Aluno;
use Tests\TestCase;

class AlunosTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_the_alunos_table_can_be_read(): void
    {
        $aluno = Aluno::factory()->create();

        $response = $this->get('/aluno');

        $response->assertSee($aluno->name);
    }

    public function test_that_create_aluno_works(): void
    {
        $aluno = Aluno::factory()->make();

        $this->post('/aluno', $aluno->toArray());

        $this->assertEquals(1, Aluno::all()->count());

    }
}
