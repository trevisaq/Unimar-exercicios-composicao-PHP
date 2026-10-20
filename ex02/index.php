<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Jogador;
use App\Time;

$corintimeiras = new Time("Corintimeiras");
$memphis = new Jogador("Memphis", 12, "Goleiro");
$newymar = new Jogador("Newymar", 8, "Ponta");
$brunao = new Jogador("Bruno Henrique", 4, "Lateral");
$mercelinho = new Jogador("Mercelinho pé de anjo", 1, "Centro avante");
$cloneDoMarcelinho = new Jogador("Mercelinho pé de anjo", 12, "Centro avante");

$corintimeiras->cadastrarJogador($memphis);
$corintimeiras->cadastrarJogador($newymar);
$corintimeiras->cadastrarJogador($brunao);
$corintimeiras->cadastrarJogador($mercelinho);
$corintimeiras->cadastrarJogador($cloneDoMarcelinho); // Teste de cadastro de jogador com mesmo nome.

$corintimeiras->resumo();
    
?>