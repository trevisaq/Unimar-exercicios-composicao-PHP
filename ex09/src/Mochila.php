<?php

namespace App;
use InvalidArgumentException;
class Mochila
{
    private array $equipamentos = [];

    public function __construct(
        private int $capacidadeMaxima
    ) {
        if ($this->capacidadeMaxima <= 0) {
            throw new InvalidArgumentException("A capacidade máxima deve ser maior que zero.");
        }
    }

    public function getPesoOcupado(): int
    {
        $pesoTotal = 0;
        foreach ($this->equipamentos as $item) {
            $pesoTotal += $item->getPeso();
        }
        return $pesoTotal;
    }

    public function getEspacoRestante(): int
    {
        return $this->capacidadeMaxima - $this->getPesoOcupado();
    }

    public function getValorTotal(): float
    {
        $valorTotal = 0.0;
        foreach ($this->equipamentos as $item) {
            $valorTotal += $item->getValor();
        }
        return $valorTotal;
    }

    public function adicionarEquipamento(Equipamento $equipamento): void
    {
        if ($equipamento->getPeso() > $this->getEspacoRestante()) {
            throw new InvalidArgumentException("Espaço insuficiente na mochila para este equipamento.");
        }

        $this->equipamentos[] = $equipamento;
    }

    public function removerEquipamento(string $nomeItem): bool
    {
        foreach ($this->equipamentos as $indice => $item) {
            if ($item->getNome() === $nomeItem) {
                unset($this->equipamentos[$indice]);
                return true;
            }
        }

        return false;
    }

    public function getEquipamentos(): array
    {
        return $this->equipamentos;
    }
}