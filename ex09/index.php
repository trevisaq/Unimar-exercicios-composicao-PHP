<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Equipamento;
use App\Mochila;
use App\Aventureiro;

$mochila = new Mochila(15);
$hero = new Aventureiro("Tomas", 100, $mochila);

$espada = new Equipamento("Katana rios de sangue", 5, 150.0);
$escudo = new Equipamento("Escudo de Madeira", 8, 80.0);
$machado = new Equipamento("Machado Pesado", 10, 200.0);

$hero->coletarEquipamento($espada);
$hero->coletarEquipamento($escudo);


echo "Peso ocupado: {$hero->getMochila()->getPesoOcupado()} kg" . PHP_EOL;
echo "Espaço restante: {$hero->getMochila()->getEspacoRestante()} kg" . PHP_EOL;
echo "Valor total: {$hero->getMochila()->getValorTotal()} moedas" . PHP_EOL . PHP_EOL;

$hero->descartarEquipamento("Escudo de Madeira");
echo "Novo espaço restante: {$hero->getMochila()->getEspacoRestante()} kg" . PHP_EOL;

$hero->coletarEquipamento($machado);

if(!$hero->descartarEquipamento("Poção de Cura")){
    echo "Não foi possível descartar o equipamento, pois ele não existe na mochila" . PHP_EOL;
}

if(!$hero->descartarEquipamento("Poção de Cura")){
    echo "Não foi possível descartar o equipamento, pois ele não existe na mochila" . PHP_EOL;
} 

// $itemInvalido = new Equipamento("Anel Amaldiçoado", -2, 50.0) // Teste de criar um equipamento com espaço inválido


?>