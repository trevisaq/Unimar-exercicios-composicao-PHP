<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Questionario;
use App\Pergunta;

$Q1 = new Questionario("Perguntas de matemática");
$P1 = new Pergunta("Quanto é 10 vezes 2", "20");
$P2 = new Pergunta("Quanto é 90 divido por 5", "18");

$Q2 = new Questionario("Perguntas geek");
$P3= new Pergunta("Qual o nome do bruxo mais poderoso de Harry Potter?", "Valdemort");
$P4 = new Pergunta("Quem é o vingador mais forte?", "Hulk");

$Q1->adicionarPergunta($P1);
$Q1->adicionarPergunta($P2);

$Q2->adicionarPergunta($P3);
$Q2->adicionarPergunta($P4);

function printarPerguntas($perguntasQuestionario, $nomeQuestionario){
    if(!$perguntasQuestionario) {
        echo "Não foram encontradas perguntas no questionário referente.";
        return false;
    }
    $c = 1;
    echo "Listando perguntas cadastradas no questionário '$nomeQuestionario'" . PHP_EOL;
    foreach($perguntasQuestionario as $pergunta){
        echo "-------------------------------------------------------------------------------"   . PHP_EOL;
        echo "{$c}ª Pergunta..............'{$pergunta->getEnunciado()}'"               . PHP_EOL;
        echo "Respota correta..........'{$pergunta->getResposta()}'"                   . PHP_EOL;
        echo "-------------------------------------------------------------------------------"   . PHP_EOL;
        $c++;
    }
}

printarPerguntas($Q2->retornarPerguntas(), $Q2->getTituloQuestionario());

echo "\n";
echo $Q2->resumo();
echo "\n";
echo $Q1->resumo();
echo "\n";


    
?>