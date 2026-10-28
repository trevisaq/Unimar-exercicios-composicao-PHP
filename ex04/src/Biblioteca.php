<?php

namespace App;
use invalidargumentexception;
class Biblioteca
{
    public function __construct(
        private string $nome,
        private array $catalogo = []
    ) 
    {
        if($this->nome == null || $this->nome == ''){
            throw new invalidargumentexception ("A biblioteca precisa de um nome.");
        }
    }
    public function encontrarDuplicata(int $isbn): bool
    {
        foreach($this->catalogo as $livro){
            if($livro->getISBN() == $isbn){
                return true;
            }
        }
        return false; 
        // Aqui estou usando da logica reversa pra verificar se tem duplicada, no caso de ter, eu bloqueio depois
    }

    public function adicionarLivro(Livro $livroAdicionado): bool
    {   
        if(!$this->encontrarDuplicata($livroAdicionado->getISBN())){
            $this->catalogo[] = $livroAdicionado;
            return true;
        }
        return false;
    }

    public function removerLivro(Livro $livroRemovido): bool
    {   
        for($i = 0; $i != count($this->catalogo); $i++){
            if($this->catalogo[$i]->getISBN() == $livroRemovido->getISBN()){
                unset($this->catalogo[$i]);
                return true;
            }
        }
        return false;
    }

    public function emprestarLivro(Livro $livroEmprestado): bool
    {   
        for($i = 0; $i != count($this->catalogo); $i++){
            if($this->catalogo[$i]->getISBN() == $livroEmprestado->getISBN()){
                if($this->catalogo[$i]->getDisponibilidade() == true){
                    $this->catalogo[$i]->emprestar();
                    return true;
                }
            }
        }
        return false;
    }

    public function devolverLivro(Livro $livroEmprestado): bool
    {   
        for($i = 0; $i != count($this->catalogo); $i++){
            if($this->catalogo[$i]->getISBN() == $livroEmprestado->getISBN()){
                if($this->catalogo[$i]->getDisponibilidade() == false){
                    $this->catalogo[$i]->devolver();
                    return true;
                }
            }
        }
        return false;
    }

    public function countLivros(): int
    {   
        return count($this->catalogo);
    }

    public function getNome(): string
    {   
        return $this->nome;
    }

}
?>