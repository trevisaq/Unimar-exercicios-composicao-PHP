<?php 

namespace App;
use invalidargumentexception;
class Missao
{
    public function __construct(
        private string $titulo,
        private string $descricao,
        private int $recompensaMoedas,
        private bool $pendente = true
    ) 
    {
        if($this->titulo == null || $this->titulo == ''){
            throw new invalidargumentexception ("A missão precisa de um titulo.");
        }
        if($this->descricao == null || $this->descricao == ''){
            throw new invalidargumentexception ("A missão precisa de uma descrição.");
        }
        if($this->recompensaMoedas <= 0){
            throw new invalidargumentexception ("A missão precisa de uma recompensa justa.");
        }
        if($this->pendente != true){
            throw new invalidargumentexception ("A missão precisa começar pendente.");
        }
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getRecompensa(): int
    {
        return $this->recompensaMoedas;
    }

    public function getPendencia(): bool
    {
        return $this->pendente;
    }

    public function finalizar(): void
    {
        $this->pendente = false;
    }
}