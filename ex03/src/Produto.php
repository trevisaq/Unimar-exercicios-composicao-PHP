<?php 

namespace App;
use invalidargumentexception;
class Produto
{
    public function __construct(
        private string $nome,
        private string $codigoIdentificacao,
        private float $preco,
    ) 
    {
        if($this->preco < 0 || $this->preco == null){
            throw new invalidargumentexception ("O preço não pode ser negativo nem nulo");
        }
        
        if($this->nome == null || $this->nome == '' || $this->codigoIdentificacao == null || $this->codigoIdentificacao == ''){
            throw new invalidargumentexception ("O produto precisa de um nome e codigo de identificação no minimo.");
        }
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getCodigo(): string
    {
        return $this->codigoIdentificacao;
    }
}