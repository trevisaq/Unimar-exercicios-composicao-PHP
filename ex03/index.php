<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Produto;
use App\Carrinho;

$meuCarrinho = new Carrinho();

$capacete = new Produto("Capacete", "EF324", 38.99); // 38.99
$espada = new Produto("Espada", "EJ685", 56);        // 94.99
$amuleto = new Produto("Amuleto", "EJ777", 35);      // 129.99

function tentarIncluirCarrinho(Carrinho $carrinho, Produto $produto){
    if($carrinho->adicionarProduto($produto)){
        echo "'{$produto->getNome()}' adicionado ao carrinho" . PHP_EOL;
    } else{
        echo "'{$produto->getNome()}' não incluido, duplicata encontrada" . PHP_EOL;
    }
}

function tentarExcluirCarrinho(Carrinho $carrinho, Produto $produto){
    if($carrinho->removerProduto($produto)){
        echo "'{$produto->getNome()}' removido do carrinho" . PHP_EOL;
    } else{
        echo "'{$produto->getNome()}' não removido (Produto não encontrado)" . PHP_EOL;
    }
}

tentarIncluirCarrinho($meuCarrinho, $capacete);
tentarIncluirCarrinho($meuCarrinho, $espada);
tentarIncluirCarrinho($meuCarrinho, $espada);                      // Tentativa de incluir duplicata
tentarIncluirCarrinho($meuCarrinho, $amuleto);                     

tentarExcluirCarrinho($meuCarrinho, $capacete);                    // 91

echo "\nO total no carrinho deu: R$ {$meuCarrinho->getValorAcumulado()}";


?>