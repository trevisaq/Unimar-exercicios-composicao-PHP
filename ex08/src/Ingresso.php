<?php 

namespace App;
use invalidargumentexception;
class Ingresso
{
    public function __construct(
        private string $nomeEspectador,
        private int $numeroPoltrona,
        private float $valorPago
    ) 
    {
        if($this->nomeEspectador == null || $this->nomeEspectador == ''){
            throw new invalidargumentexception ("O ingresso precisa de um nome do espectador.");
        }
        if($this->numeroPoltrona == null){
            throw new invalidargumentexception ("O ingresso precisa de uma poltrona reservada.");
        }
        if($this->valorPago == null){
            throw new invalidargumentexception ("O ingresso precisa de um valor pago.");
        }
    }

    public function getNomeEspectador(): string
    {
        return $this->nomeEspectador;
    }

    public function getNumeroPoltrona(): string
    {
        return $this->numeroPoltrona;
    }

    public function getValorPago(): string
    {
        return $this->valorPago;
    }
}

?>