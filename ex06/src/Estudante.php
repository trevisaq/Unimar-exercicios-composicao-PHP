<?php 

namespace App;
use invalidargumentexception;
class Estudante
{
    public function __construct(
        private string $nome,
        private int $RA,
        private float $notaFinal
    ) 
    {
        if($this->nome == null || $this->nome == ''){
            throw new invalidargumentexception ("O aluno precisa de um nome.");
        }
        if($this->RA == null || $this->RA == ''){
            throw new invalidargumentexception ("O aluno precisa de um RA.");
        }
        if($this->notaFinal < 0 || $this->notaFinal > 10){
            throw new invalidargumentexception ("A nota final do aluno precisa estar entre 0 e 10.");
        }
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getRA(): int
    {
        return $this->RA;
    }

    public function getNotaFinal(): float
    {
        return $this->notaFinal;
    }
}

?>