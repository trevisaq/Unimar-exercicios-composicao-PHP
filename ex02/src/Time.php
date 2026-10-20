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
    
    public function resumo(): void
    {
        if($this->countJogadores() > 0){
            echo "O time '{$this->getNome()}' possui os seguintes jogadores: \n";
            $contador = 1;
            foreach($this->jogadores as $jogador){
                echo "$contador. " . $jogador->getNome() . " - camisa {$jogador->getNumero()} " . "({$jogador->getPosicao()})" . PHP_EOL;
                $contador++;
            }
        } else {
            echo "O time '{$this->getNome()}' ainda não possui jogadores.";
        }
    }
}
?>