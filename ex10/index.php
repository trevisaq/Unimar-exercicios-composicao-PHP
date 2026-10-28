<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Estudante;
use App\RegistroIndividual;
use App\Atividade;

function tentarAdicionarAtividade(RegistroIndividual $registro, Atividade $atividade): void
{
    if($registro->adicionarAtividade($atividade)){
        echo "'{$atividade->getTitulo()}' adicionada com sucesso!" . PHP_EOL;
    } else{
        echo "'{$atividade->getTitulo()}' não adicionada (título duplicado)." . PHP_EOL;
    }
}

function tentarRegistrarNota(RegistroIndividual $registro, Atividade $atividade, float $nota): void
{
    echo $registro->registrarNotaAtividade($atividade, $nota);
}

function consultarDesempenho(RegistroIndividual $registro): void
{
    echo "Desempenho: " . ($registro->calcularDesempenho() * 100) . "%" . PHP_EOL;
}

$atv1 = new Atividade("Observação das fases lunares", 4);
$atv2 = new Atividade("Criação de mapa mental ilustrativo / representativo das fases lunares", 6);
$atv3 = new Atividade("Ficha de exercicios complementares", 10);                // Atividade que ficará pendente
$atv4 = new Atividade("Observação das fases lunares", 8);                       // Atividade com título duplicado
$atv5 = new Atividade("Atividade falsa / fora do registro", 10);                // Atividade que nao vou aplicar no registro

$registrolucas = new RegistroIndividual("Astronomia", 72);
$lucas = new Estudante("Lucas Martins", 52431, $registrolucas);

tentarAdicionarAtividade($registrolucas, $atv1);
tentarAdicionarAtividade($registrolucas, $atv2);

echo "\n------ Registro de notas ------\n";
tentarRegistrarNota($registrolucas, $atv1, 3.4);
tentarRegistrarNota($registrolucas, $atv2, 5);

echo "\n------ Consulta das atividades ------\n";
$registrolucas->consultarAtividades();

echo "\n------ Desempenho do lucas com 2 atividades ------\n";
consultarDesempenho($registrolucas);

echo "\n------ Atividades pendentes ------\n";
tentarAdicionarAtividade($registrolucas, $atv3);
$registrolucas->consultarAtividadesPendentes();

echo "\n------ Testes de erro ------\n";
tentarAdicionarAtividade($registrolucas, $atv4); // Adiciono a atividade
tentarRegistrarNota($registrolucas, $atv1, 5);
tentarRegistrarNota($registrolucas, $atv5, 8);

echo "\n------ Desempenho do lucas com 1 atividade pendente / sem nota ------\n";
consultarDesempenho($registrolucas);

echo "\n------ Registro vazio ------\n";
$registroVazio = new RegistroIndividual("Matemática", 60);
$registroVazio->consultarAtividades();
$registroVazio->consultarAtividadesPendentes();
consultarDesempenho($registroVazio);

?>