<?php

namespace App;
use invalidargumentexception;
class Jogo
{
    public function __construct(
        private string $nome,
        private array $missoes = []
    ) 
    {
        if($this->nome == null || $this->nome == ''){
            throw new invalidargumentexception ("O jogo precisa de um nome.");
        }
    }
    public function encontrarDuplicata(int $nomeMissao): bool
    {
        foreach($this->missoes as $missao){
            if($missao->getTitulo() == $nomeMissao){
                return true;
            }
        }
        return false; 
        // Aqui estou usando da logica reversa pra verificar se tem duplicada, no caso de ter, eu bloqueio depois
    }

    public function executarMissao(Missao $missaoExecutada): bool
    {   
        for($i = 0; $i != count($this->missoes); $i++){
            if($this->missoes[$i]->getTitulo() == $missaoExecutada->getTitulo()){
                if($this->missoes[$i]->getPendencia() == true){
                    $this->missoes[$i]->finalizar();
                    return true;
                }
            }
        }
        return false;
    }

    public function resumirMissoes(): void
    {
        if(count($this->missoes) > 0){
            for($i = 0; $i != count($this->missoes); $i++){
                $numeroMissao = $i+1;
                if($this->missoes[$i]->getPendencia() == true){
                    echo "{$numeroMissao}ª Missão '{$this->missoes[$i]->getTitulo()}' (PENDENTE) [RECOMPENSA DE {$this->missoes[$i]->getRecompensa()} MOEDAS]\n";
                } else {
                    echo "{$numeroMissao}ª Missão '{$this->missoes[$i]->getTitulo()}' (EXECUTADA) [RECOMPENSA DE {$this->missoes[$i]->getRecompensa()} MOEDAS]\n";
                }
            }

        } else{
            echo "Nenhum missão foi incluida no jogo ainda.";
        }
    }


    public function getNome(): string
    {   
        return $this->nome;
    }

}
?>