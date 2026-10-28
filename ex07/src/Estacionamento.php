<?php

namespace App;
use InvalidArgumentException;

class Estacionamento
{
    private int $vagasRestantes;

    public function __construct(
        private int $capacidadeMaxima,
        private array $carros = []
    ) 
    {
        if ($this->capacidadeMaxima <= 0) {
            throw new InvalidArgumentException("A capacidade deve ser maior que zero.");
        }
        if (count($this->carros) > $this->capacidadeMaxima) {
            throw new InvalidArgumentException("A quantidade de veículos excede a capacidade.");
        }

        $this->vagasRestantes = $this->capacidadeMaxima - count($this->carros);
    }

    public function encontrarDuplicata(string $placa): bool
    {
        foreach ($this->carros as $carro) {
            if ($carro->getPlaca() === $placa) {
                return true;
            }
        }
        return false;
    }

    public function receberVeiculo(Veiculo $carro): bool
    {
        if ($this->vagasRestantes <= 0) {
            return false;
        }
        if ($this->encontrarDuplicata($carro->getPlaca())) {
            return false;
        }

        $this->carros[] = $carro;
        $this->vagasRestantes--;
        return true;
    }

    public function removerVeiculo(string $placa): bool
    {
        foreach ($this->carros as $i => $carro) {
            if ($carro->getPlaca() === $placa) {
                unset($this->carros[$i]);
                $this->carros = array_values($this->carros);
                $this->vagasRestantes++;
                return true;
            }
        }
        return false;
    }

    public function localizarVeiculo(string $placa): ?Veiculo
    {
        foreach ($this->carros as $carro) {
            if ($carro->getPlaca() === $placa) {
                return $carro;
            }
        }
        return null;
    }

    public function listarVeiculos(): array
    {
        return $this->carros;
    }

    public function countVeiculos(): int
    {
        return count($this->carros);
    }

    public function getVagasRestantes(): int
    {
        return $this->vagasRestantes;
    }

    public function getCapacidadeMaxima(): int
    {
        return $this->capacidadeMaxima;
    }
}