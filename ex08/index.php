<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Ingresso;
use App\SessaoCinema;

function tentarVenderIngresso(SessaoCinema $sessao, Ingresso $ingresso){
    if($sessao->venderIngresso($ingresso)){
        echo "Ingresso vendido com sucesso para '{$ingresso->getNomeEspectador()}'! o numero da poltrona é {$ingresso->getNumeroPoltrona()}" . PHP_EOL;
    } else{
        echo "Sentimos muito senhor {$ingresso->getNomeEspectador()}, não foi possível vender este ingresso (Ou sessão esgotada, ou poltrona ocupada.)" . PHP_EOL;
    }
}

$sessao45 = new SessaoCinema("Vingadores Doomsday", 12);

$i1 = new Ingresso("João", 23, 21.90);
$i2 = new Ingresso("Cláudio", 21, 7.50);    // Amigo do dono do cinema.
$i3 = new Ingresso("Valdir", 14, 21.90);
$i4 = new Ingresso("Lucas", 14, 21.90);     // Lucas tenta comprar um ingresso numa poltrona ocupada

tentarVenderIngresso($sessao45, $i1);
tentarVenderIngresso($sessao45, $i2);
tentarVenderIngresso($sessao45, $i3);
tentarVenderIngresso($sessao45, $i4);

echo "\nDeseja saber quantas e quais poltronas já foram ocupadas?\n" . PHP_EOL;
$ocupadas = $sessao45->listarPoltronas();
echo "\nIsso significa que foram ocupadas $ocupadas (sobraram {$sessao45->getQuantidadeDisponivel()})" . PHP_EOL;
echo "No total, foram arrecadados {$sessao45->getArrecadacaoTotal()} na sessão do filme '{$sessao45->getNomeFilme()}' ";


?>