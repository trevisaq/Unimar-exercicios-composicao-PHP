<?php 

namespace App;
use invalidargumentexception;
class Atividade
{
    public function __construct(
        private string $titulo,
        private int $valorMaximo,
        private ?float $notaAtribuida = null
    ) 
    {
        if($this->titulo == null || $this->titulo == ''){
            throw new invalidargumentexception ("A atividade precisa de um titulo.");
        }
        if($this->valorMaximo <= 0 ){
            throw new invalidargumentexception ("A atividade precisa de um valor máximo maior que zero");
        }
        if($this->notaAtribuida != null ){
            throw new invalidargumentexception ("A atividade não pode começar com uma nota já atribuída");
        }
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getValorMaximo(): int
    {
        return $this->valorMaximo;
    }

    public function getNotaAtribuida(): ?float
    {
        return $this->notaAtribuida;
    }

    public function getNotaBarraValorMax(): string
    {
        if ($this->notaAtribuida != null){
            return "(Nota do aluno: [$this->notaAtribuida/$this->valorMaximo])";
        }
        return "(Nota não atribuída ainda)";
    }

    public function atribuirNota(float $nota): bool
    {
        if($nota < 0 || $nota > $this->valorMaximo){
            return false;
        }
        $this->notaAtribuida = $nota;
        return true;
    }
}

?>