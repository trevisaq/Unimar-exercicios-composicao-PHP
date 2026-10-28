<?php 

namespace App;
use invalidargumentexception;
class Estudante
{
    public function __construct(
        private string $nome,
        private int $RA,
        private RegistroIndividual $RI
    ) 
    {
        if($this->nome == null || $this->nome == ''){
            throw new invalidargumentexception ("O aluno precisa de um nome.");
        }
        if($this->RA <= 0){
            throw new invalidargumentexception ("O aluno precisa de um RA válido.");
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

    public function getRI(): RegistroIndividual
    {
        return $this->RI;
    }
}

?>