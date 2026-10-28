<?php

namespace App;
use InvalidArgumentException;
class Turma

{
    public function __construct(
        private string $nome,
        private int $capacidade,
        private array $alunos = []
    ) {
        if ($this->nome === '') {
            throw new InvalidArgumentException("A turma precisa de um nome.");
        }
        if ($this->capacidade <= 0) {
            throw new InvalidArgumentException("A capacidade da turma deve ser maior que zero.");
        }
        if (count($this->alunos) > $this->capacidade) {
            throw new InvalidArgumentException("A quantidade de alunos excede a capacidade da turma.");
        }
    }
    public function encontrarDuplicata(int $ra): bool
    {
        foreach ($this->alunos as $aluno) {
            if ($aluno->getRA() === $ra) {
                return true;
            }
        }

        return false;
    }

    public function matricularAluno(Estudante $aluno): bool
    {
        if (count($this->alunos) >= $this->capacidade) {
            return false;
        }

        if ($this->encontrarDuplicata($aluno->getRA())) {
            return false;
        }

        $this->alunos[] = $aluno;

        return true;
    }

    public function removerAluno(Estudante $alunoRemovido): bool
    {
        foreach ($this->alunos as $i => $aluno) {
            if ($aluno->getRA() === $alunoRemovido->getRA()) {
                unset($this->alunos[$i]);
                return true;
            }
        }
        return false;
    }

    public function listarAlunos(): array
    {
        return $this->alunos;
    }

    public function calcularMedia(): float
    {
        if (count($this->alunos) === 0) {
            return 0.0;
        }

        $soma = 0;

        foreach ($this->alunos as $aluno) {
            $soma += $aluno->getNotaFinal();
        }

        return $soma / count($this->alunos);
    }

    public function contarAprovados(): int
    {
        $aprovados = 0;

        foreach ($this->alunos as $aluno) {
            if ($aluno->getNotaFinal() >= 6.0) {
                $aprovados++;
            }
        }

        return $aprovados;
    }

    public function countAlunos(): int
    {
        return count($this->alunos);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCapacidade(): int
    {
        return $this->capacidade;
    }
}
