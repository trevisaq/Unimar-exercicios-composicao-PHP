<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Jogador;
use App\Time;

$corintimeiras = new Time("Corintimeiras");
$memphis = new Jogador("Memphis", 12, "Goleiro");
$newmar = new Jogador("Newmar", 8, "Ponta");
$brunao = new Jogador("Bruno Henrique", 4, "Lateral");
$mercelinho = new Jogador("Mercelinho pé de anjo", 1, "Centro avante");
$cloneDoMarcelinho = new Jogador("Mercelinho pé de anjo", 1, "Centro avante");

$corintimeiras->cadastrarJogador($memphis);
$corintimeiras->cadastrarJogador($newmar);
$corintimeiras->cadastrarJogador($brunao);
$corintimeiras->cadastrarJogador($mercelinho);

function printarResumo(Time $time)
{
    if($time->countJogadores() > 0){
        echo "O time '{$time->getNome()}' possui os seguintes jogadores: \n";
        $contador = 1;
        foreach($time->getJogadores() as $jogador){
            echo "$contador. " . $jogador->getNome() . " - camisa {$jogador->getNumero()} " . "({$jogador->getPosicao()})" . PHP_EOL;
            $contador++;
        }
    } else {
        echo "O time '{$time->getNome()}' ainda não possui jogadores.";
    }
}

printarResumo($corintimeiras);
$numeroCamisa = 1;
$jogadorProcurado = $corintimeiras->localizarJogador($numeroCamisa);

if($jogadorProcurado){
    echo "\nO nome do jogador encontrado com a camisa $numeroCamisa foi $jogadorProcurado";
} else {
    echo "\nJogador não encontrado.";
}

if (!$corintimeiras->cadastrarJogador($cloneDoMarcelinho)){ // Teste de cadastro de jogador com mesmo número de camisa.
    echo "\nNão foi possível cadastrar o jogador referente no time.\n\n";
} 
    
?>