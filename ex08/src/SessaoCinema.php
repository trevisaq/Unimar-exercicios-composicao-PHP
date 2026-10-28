<?php

namespace App;
use InvalidArgumentException;
class SessaoCinema
{
    
    public function __construct(
        private string $nomeFilme,
        private int $poltronasRestantes,
        private array $ingressosVendidos = []
    ) 
    {
        if ($this->nomeFilme == null || $this->nomeFilme == '') {
            throw new InvalidArgumentException("A sessão precisa de um nome pro filme.");
        }
        if ($this->poltronasRestantes <= 0) {
            throw new InvalidArgumentException("A quantidade de poltronas é muito baixa.");
        }
        if (count($this->ingressosVendidos) > 0) {
            throw new InvalidArgumentException("Uma sessão recém-criada não pode possuir ingressos vendidos.");
        }
    }

    public function encontrarDuplicata(int $poltronaValidada): bool
    {
        foreach ($this->ingressosVendidos as $ingresso) {
            if ($ingresso->getNumeroPoltrona() == $poltronaValidada) {
                return true;
            }
        }
        return false;
    }

    public function venderIngresso(Ingresso $ingresso): bool
    {
        if ($this->poltronasRestantes <= 0) {
            return false;
        }
        if ($this->encontrarDuplicata($ingresso->getNumeroPoltrona())) {
            return false;
        }
        $this->ingressosVendidos[] = $ingresso;
        $this->poltronasRestantes--;
        return true;
    }

    public function listarPoltronas(): int
    {
        $contadorPoltronas = 0;
        foreach($this->ingressosVendidos as $ingresso){
            echo "Poltrona {$ingresso->getNumeroPoltrona()} (RESERVADA)" . PHP_EOL;
            $contadorPoltronas++;
        }
        return $contadorPoltronas;
    }

    public function getQuantidadeDisponivel(): int
    {
        return $this->poltronasRestantes;
    }

    public function getArrecadacaoTotal(): float
    {
        $arrecadado = 0;
        foreach($this->ingressosVendidos as $ingresso){
            $arrecadado += $ingresso->getValorPago();
        }
        return $arrecadado;
    }

    public function getNomeFilme(): string
    {
        return $this->nomeFilme;
    }
}