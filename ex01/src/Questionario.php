<?php

namespace App;
class Questionario
{
    public function __construct(
        public string $titulo,
        private array $perguntas = []
    ) 
    {
        if($this->titulo == null || $this->titulo == ''){
            echo 'O questionário deve possuir um titulo.' . PHP_EOL;
            return false;
        }
        if($this->perguntas != null){
            echo 'A lista de perguntas deve começar vazia!' . PHP_EOL;
            return false;
        } 
        return true;
    }

    public function adicionarPergunta(Pergunta $pergunta): bool
    { 
        $this->perguntas[] = $pergunta;
        return true;
    }

    public function contarPerguntas(): int
    {
        return count($this->perguntas);
    }

    public function retornarPerguntas(): array
    {
        if($this->contarPerguntas() > 0){
            return $this->perguntas;
        }
        return [];

    }

    public function getTituloQuestionario(): string
    {
        return $this->titulo;
    }

    public function resumo(): string
    {
        return "O questionário '{$this->titulo}' possui um total de {$this->contarPerguntas()} perguntas";
    }
}
?>