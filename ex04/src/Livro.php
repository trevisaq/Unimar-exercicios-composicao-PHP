<?php 

namespace App;
use invalidargumentexception;
class Livro
{
    public function __construct(
        private string $titulo,
        private string $nomeAutor,
        private int $isbn,
        private bool $disponivel = true
    ) 
    {
        if($this->titulo == null || $this->titulo == ''){
            throw new invalidargumentexception ("O produto precisa de um titulo.");
        }
        if($this->nomeAutor == null || $this->nomeAutor == ''){
            throw new invalidargumentexception ("O produto precisa de um autor.");
        }
        if($this->isbn == null || $this->isbn == ''){
            throw new invalidargumentexception ("O produto precisa de um ISBN.");
        }
        if($this->disponivel != true){
            throw new invalidargumentexception ("O produto precisa começar disponível.");
        }
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAutor(): string
    {
        return $this->nomeAutor;
    }

    public function getISBN(): int
    {
        return $this->isbn;
    }

    public function getDisponibilidade(): bool
    {
        return $this->disponivel;
    }

    public function emprestar(): void
    {
        $this->disponivel = false;
    }

    public function devolver(): void
    {
        $this->disponivel = true;
    }
}