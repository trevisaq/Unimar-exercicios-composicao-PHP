<?php

namespace App;
use invalidargumentexception;
class Carrinho
{
    public function __construct(
        private array $produtos = [],
        public float $valorAcumulado = 0
    ) 
    {
        if($this->valorAcumulado != 0 || count($this->produtos) != 0){
            throw new invalidargumentexception ("O carrinho deve começar vazio e sem valor acumulado!");
        }
    }

    public function encontrarDuplicata(string $codigoIdentificacao): bool
    {
        foreach($this->produtos as $produto){
            if($produto->getCodigo() == $codigoIdentificacao){
                return true;
            }
        }
        return false; 
        // Aqui estou usando da logica reversa pra verificar se tem duplicada, no caso de ter, eu bloqueio depois
    }

    public function adicionarProduto(Produto $novoProduto): bool
    {   
        if(!$this->encontrarDuplicata($novoProduto->getCodigo())){
            $this->produtos[] = $novoProduto;
            $this->valorAcumulado += $novoProduto->getPreco();
            return true;
        }
        return false;
    }


    public function removerProduto(Produto $produtoRemovido): bool
    {   
        for($i = 0; $i != count($this->produtos); $i++){
            if($this->produtos[$i]->getCodigo() == $produtoRemovido->getCodigo()){
                $this->valorAcumulado -= $produtoRemovido->getPreco();
                unset($this->produtos[$i]);
                return true;
            }
        }
        return false;
    }


    public function countProdutos(): int
    {   
        return count($this->produtos);
    }

    public function getValorAcumulado(): float
    {   
        return $this->valorAcumulado;
    }
    

}
?>