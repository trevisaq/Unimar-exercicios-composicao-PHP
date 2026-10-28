<?php 

require_once __DIR__ . '/vendor/autoload.php';

use App\Estudante;
use App\Turma;

$turma = new Turma("BCC - Turma C", 2);

$a1 = new Estudante("João", 123, 9);
$a2 = new Estudante("Maria", 456, 6.0);
$a3 = new Estudante("Pedro", 789, 9.0);

$turma->matricularAluno($a1);
$turma->matricularAluno($a2);
$turma->matricularAluno($a3);   // Teste de tentar incluir alunos acima da capacidade 

$turma->removerAluno($a2);      // Remoção de um aluno 

$turma->matricularAluno($a3);   

echo "Alunos: " . $turma->countAlunos() . PHP_EOL;
echo "Média: " . $turma->calcularMedia() . PHP_EOL;
echo "Aprovados: " . $turma->contarAprovados() . PHP_EOL;

?>