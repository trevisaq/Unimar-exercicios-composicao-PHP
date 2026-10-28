<?php

namespace App;
use InvalidArgumentException;
class RegistroIndividual
{
    public function __construct(
        private string $diciplina,
        private int $cargaHoraria,
        private array $atividades = []
    )
    {
        if($this->diciplina == ''){
            throw new InvalidArgumentException("O registro precisa de um nome pra disciplina.");
        }
        if($this->cargaHoraria <= 0){
            throw new InvalidArgumentException("O registro precisa de uma carga horária mínima.");
        }
    }

    public function getDiciplina(): string
    {
        return $this->diciplina;
    }

    public function getCargaHoraria(): int
    {
        return $this->cargaHoraria;
    }

    public function adicionarAtividade(Atividade $atividade): bool
    {
        foreach($this->atividades as $atv){
            if($atv->getTitulo() == $atividade->getTitulo()){
                return false;
            }
        }
        $this->atividades[] = $atividade;
        return true;
    }

    public function registrarNotaAtividade(Atividade $atividadeSelecionada, float $nota): string
    {
        foreach($this->atividades as $atv){
            if($atv->getTitulo() == $atividadeSelecionada->getTitulo()){
                if($atv->atribuirNota($nota)){
                    return "Nota atribuída com sucesso!" . PHP_EOL;
                }
                return "Falha ao atribuir a nota, a nota deve estar dentro do limite!" . PHP_EOL;
            }
        }
        return "Falha ao atribuir a nota, a atividade não existe neste registro!" . PHP_EOL;
    }

    public function consultarAtividades(): void
    {
        if(count($this->atividades) == 0){
            echo "Nenhuma atividade registrada para consultar." . PHP_EOL;
            return;
        }

        $contador = 1;
        foreach($this->atividades as $atv){
            echo "{$contador}ª atividade - '{$atv->getTitulo()}'\n {$atv->getNotaBarraValorMax()}\n\n";
            $contador++;
        }
    }

    public function consultarAtividadesPendentes(): void
    {
        $contador = 1;
        foreach($this->atividades as $atv){
            if($atv->getNotaAtribuida() == null){
                echo "{$contador}ª atividade pendente - '{$atv->getTitulo()}'" . PHP_EOL;
                $contador++;
            }
        }
        if($contador == 1){
            echo "Nenhuma atividade pendente." . PHP_EOL;
        }
    }

    public function calcularDesempenho(): float
    {
        $totalNotas = 0;
        $totalValores = 0;

        foreach($this->atividades as $atv){
            $totalValores += $atv->getValorMaximo();

            if($atv->getNotaAtribuida() !== null){
                $totalNotas += $atv->getNotaAtribuida();
            }
        }
        if($totalValores == 0){
            return 0;
        }
        return $totalNotas / $totalValores;
    }

    public function getAtividades(): array
    {
        return $this->atividades;
    }
}
