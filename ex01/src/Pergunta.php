<?php 

namespace App;
class Pergunta
{
    public function __construct(
        private string $enunciado,
        private string $respostaEsperada,
    ) 
    {
        if($this->enunciado == null || $this->enunciado == ""){
            echo 'A pergunta deve possuir um enunciado.' . PHP_EOL;
            return false;
        }
        if($this->respostaEsperada == null || $this->respostaEsperada == ""){
            echo 'A pergunta deve possuir uma resposta padrão.' . PHP_EOL;
            return false;
        }
        return true;
    }

    public function getEnunciado(): string
    {
        return $this->enunciado;
    }

    public function getResposta(): string
    {
        return $this->respostaEsperada;
    }
}