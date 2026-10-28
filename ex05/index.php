<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Jogo;
use App\Missao;

function tentarExecutarMissao(Jogo $game, Missao $missaoInformada){
    if($game->executarMissao($missaoInformada)){
        echo "Missão '{$missaoInformada->getTitulo()}' finalizada com sucesso." . PHP_EOL;
    } else{
        echo "Missão '{$missaoInformada->getTitulo()}' já finalizada ou não encotrada no jogo" . PHP_EOL;
    }
}

$m1 = new Missao("Escalando a mana!","Criar um Cristal de Mana e equipar um Gancho de Escalada", 355); 
$m2 = new Missao("Quase profissa!","Derrotar chefes iniciais como o Olho de Cthulhu, Skeletron e a Abelha Rainha.", 1200); 
$m3 = new Missao("Chefãonato","Enfrentar novos inimigos e chefes como Plantera, Golem e Duke Fishron.", 3000); 

$game = new Jogo("Terraria", [$m1, $m2, $m3]);

tentarExecutarMissao($game, $m1);
tentarExecutarMissao($game, $m1);
tentarExecutarMissao($game, $m3);

echo "\n";
$game->resumirMissoes();

// =============================== CASO ONDE NÃO EXISTE MISSAO ===============================

// $game = new Jogo("Terraria");
// $game->resumirMissoes();

?>