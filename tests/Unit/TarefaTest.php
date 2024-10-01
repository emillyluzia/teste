<?php

namespace Tests\Unit;

use App\Models\Tarefa;
use Tests\TestCase;

class TarefaTest extends TestCase
{
     public function test_criar_tarefa_de_teste()
     {
        $tarefa = Tarefa::create([
            'titulo' => 'Tarefa de teste',
            'descricao' => 'Criando uma tarefa de teste',
            'concluida' => false
        ]);

        $this->assertEquals('Tarefa de teste', $tarefa->titulo);
        $this->assertEquals('Criando uma Tarefa de Teste', $tarefa->descricao);
        $this->assertFalse($tarefa->concluida);
     }
}
