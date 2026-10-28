<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Veiculo;
use App\Estacionamento;

$estacionamento = new Estacionamento(2);

$carro1 = new Veiculo("ABC1234", "Civic", "João");
$carro2 = new Veiculo("DEF5678", "Corolla", "Maria");
$carro3 = new Veiculo("GHI9012", "Onix", "Pedro");

function tentarReceberVeiculo(Estacionamento $estacionamento, Veiculo $veiculo){
    if($estacionamento->receberVeiculo($veiculo)){
        echo "'{$veiculo->getModelo()}' recebido no estacionamento" . PHP_EOL;
    } else{
        echo "'{$veiculo->getModelo()}' não recebido (Estacionamento lotado ou placa duplicada)" . PHP_EOL;
    }
}

function tentarRemoverVeiculo(Estacionamento $estacionamento, Veiculo $veiculo){
    if($estacionamento->removerVeiculo($veiculo->getPlaca())){
        echo "'{$veiculo->getModelo()}' removido do estacionamento" . PHP_EOL;
    } else{
        echo "'{$veiculo->getModelo()}' não removido (Veículo não encontrado)" . PHP_EOL;
    }
}

function tentarLocalizarVeiculo(Estacionamento $estacionamento, string $placa){
    $veiculo = $estacionamento->localizarVeiculo($placa);

    if($veiculo !== null){
        echo "Veículo encontrado: '{$veiculo->getModelo()}', placa {$veiculo->getPlaca()}, proprietário {$veiculo->getProprietario()}" . PHP_EOL;
    } else{
        echo "Veículo de placa '{$placa}' não encontrado" . PHP_EOL;
    }
}

function consultarVagas(Estacionamento $estacionamento){
    echo "Vagas livres: {$estacionamento->getVagasRestantes()}" . PHP_EOL;
}

tentarReceberVeiculo($estacionamento, $carro1);
tentarReceberVeiculo($estacionamento, $carro2);
tentarReceberVeiculo($estacionamento, $carro3);
tentarReceberVeiculo($estacionamento, $carro1);

echo "\n";
consultarVagas($estacionamento);
echo "\n";


tentarLocalizarVeiculo($estacionamento, "DEF5678"); // Teste de procurar veículo existente
tentarLocalizarVeiculo($estacionamento, "ZZZ9999"); // Teste de procurar veículo inexistente

tentarRemoverVeiculo($estacionamento, $carro1);
tentarRemoverVeiculo($estacionamento, $carro1);     // Teste de remover veículo duas vezes

echo "\n";
consultarVagas($estacionamento);

?>