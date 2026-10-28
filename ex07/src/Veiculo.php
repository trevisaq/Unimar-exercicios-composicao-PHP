<?php 

namespace App;
use invalidargumentexception;
class Veiculo
{
    public function __construct(
        private string $placa,
        private string $modelo,
        private string $nomeProprietario
    ) 
    {
        if($this->placa == null || $this->placa == ''){
            throw new invalidargumentexception ("O veículo precisa de uma placa.");
        }
        if($this->modelo == null || $this->modelo == ''){
            throw new invalidargumentexception ("O veículo precisa de um modelo.");
        }
        if($this->nomeProprietario == null || $this->nomeProprietario == ''){
            throw new invalidargumentexception ("O veículo precisa de um proprietario.");
        }
    }

    public function getPlaca(): string
    {
        return $this->placa;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getProprietario(): string
    {
        return $this->nomeProprietario;
    }
}

?>