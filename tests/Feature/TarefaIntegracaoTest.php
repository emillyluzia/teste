<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaIntegracaoTest extends TestCase
{
    use RefreshDatabase;

   public function test_criar_tarefa_por_meio_da_api()
   {
    $response = $this->postJson('/api/tarefas',[
        'titulo' => 'Nova Tarefa',
        'descricao' => 'Descricao da nova Tarefa',
        'concluida' => false,
    ]);

    $response->assertStatus(201)
         ->assertJson([
        'titulo' => 'Nova Tarefa',
        'descricao' => 'Descricao da nova Tarefa',
        'concluida' => false,
         ]);

   }

   public function test_criar_tarefa_validar_required()
   {
    $response = $this->postJson('/api/tarefas', [
        'descricao' => 'Descricao da nova tarefa',
        'concluida' => false,
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['titulo']);
   }

}
