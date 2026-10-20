<?php

namespace App;
class Time
{
    public function __construct(
        public string $nome,
        private array $jogadores = []
    ) 
    {
        if($this->nome == null || $this->nome == ''){
            echo 'O time precisa de um nome.' . PHP_EOL;
            return false;
        }
        return true;
    }

    public function verificarDisponibilidade($numero): bool
    {
        foreach($this->jogadores as $jogador){
            if($jogador->getNumero() == $numero){
                return false;
            }
        }
        return true;
    }

    public function cadastrarJogador(Jogador $jogador): bool
    {   
        if($this->verificarDisponibilidade($jogador->getNumero())){
            $this->jogadores[] = $jogador;
            return true;
        }
        return false;
    }

    public function getNome(): string
    {   
        return $this->nome;
    }

    public function countJogadores(): int
    {   
        return count($this->jogadores);
    }
    
    public function localizarJogador($numero): string
    {   
        foreach($this->jogadores as $jogador){
            if($jogador->getNumero() == $numero){
                return $jogador->getNome();
            } else{
                continue;
            }
            return "";
        }
    }

    public function getJogadores(): array
    {
        return $this->jogadores;
    }

}
?>