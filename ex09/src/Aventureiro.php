<?php

namespace App;

class Aventureiro
{
    public function __construct(
        private string $nome,
        private int $vida,
        private Mochila $mochila,
    ) {}

    public function coletarEquipamento(Equipamento $item): void
    {
        $this->mochila->adicionarEquipamento($item);
    }

    public function descartarEquipamento(string $nomeItem): bool
    {
        if ($this->mochila->removerEquipamento($nomeItem)){
            return true;
        } else {
            return false;
        }
    }

    public function getMochila(): Mochila
    {
        return $this->mochila;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getVida(): int
    {
        return $this->vida;
    }
}