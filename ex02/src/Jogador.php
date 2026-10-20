<?php 

namespace App;
class Jogador
{
    public function __construct(
        private string $nome,
        private int $numeroCamisa,
        private string $posicaoCampo,
    ) 
    {}

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getNumero(): int
    {
        return $this->numeroCamisa;
    }

    public function getPosicao(): string
    {
        return $this->posicaoCampo;
    }
}