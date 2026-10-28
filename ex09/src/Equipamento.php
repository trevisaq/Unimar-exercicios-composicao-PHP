<?php

namespace App;

use InvalidArgumentException;

class Equipamento
{
    public function __construct(
        private string $nomeItem,
        private int $peso,
        private float $valor,
    ) {
        if($this->peso <= 0) {
            throw new InvalidArgumentException("O Peso do equipamento nao pode ser negativo");
        }

        if ($this->valor <= 0) {
            return new InvalidArgumentException("O valor do equipamento nao pode ser negativo");
        }
    }

    function getNome(): string {
        return $this->nomeItem;
    }

    function getPeso(): int { 
        return $this->peso;
    }

    function getValor(): float {
        return $this->valor;
    }
}