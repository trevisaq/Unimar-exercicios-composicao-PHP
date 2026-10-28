<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Livro;
use App\Biblioteca;

$biblioteca = new Biblioteca("Biblioteca Mario de Andrade");

$harryPotter = new Livro("Harry Potter e o cálice de fogo", "J. K. Rowling", 9786584721029); 
$coraline = new Livro("Coraline", "Neil Gaiman", 97865847213219);
$hobbit = new Livro("O Hobbit", "John Ronald Reuel", 9791090636070);

function tentarIncluirCatalogo(Biblioteca $biblioteca, Livro $livro){
    if($biblioteca->adicionarLivro($livro)){
        echo "'{$livro->getTitulo()}' adicionado ao catálogo" . PHP_EOL;
    } else{
        echo "'{$livro->getTitulo()}' não incluido, duplicata encontrada" . PHP_EOL;
    }
}

function tentarRemoverCatalogo(Biblioteca $biblioteca, Livro $livro){
    if($biblioteca->removerLivro($livro)){
        echo "'{$livro->getTitulo()}' removido do catálogo" . PHP_EOL;
    } else{
        echo "'{$livro->getTitulo()}' não removido (livro não encontrado)" . PHP_EOL;
    }
}

function tentarEmprestarLivro(Biblioteca $biblioteca, Livro $livro){
    if($biblioteca->emprestarLivro($livro)){
        echo "'{$livro->getTitulo()}' emprestado com sucesso." . PHP_EOL;
    } else{
        echo "'{$livro->getTitulo()}' não disponível ou não encotrado no catálogo" . PHP_EOL;
    }
}

function tentarDevolverLivro(Biblioteca $biblioteca, Livro $livro){
    if($biblioteca->devolverLivro($livro)){
        echo "'{$livro->getTitulo()}' devolvido com sucesso." . PHP_EOL;
    } else{
        echo "'{$livro->getTitulo()}' não devolvido com sucesso. (Ou não existe no catalogo, ou já esta disponível)" . PHP_EOL;
    }
}

tentarIncluirCatalogo($biblioteca, $harryPotter);
tentarIncluirCatalogo($biblioteca, $coraline);
tentarIncluirCatalogo($biblioteca, $hobbit);

tentarEmprestarLivro($biblioteca, $coraline);
tentarEmprestarLivro($biblioteca, $coraline); // teste de emprestar um livro duas vezes

tentarDevolverLivro($biblioteca, $coraline); // teste de emprestar um livro duas vezes

?>