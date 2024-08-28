<?php
require 'conexao.php';
$pdo = null;
try {
$pdo = criarConexao();
$codigo = readline('Digite o código do atleta: ');
$ps = $pdo->prepare('SELECT id FROM atleta WHERE codigo = :codigo');
$ps->execute(['codigo' => $codigo]);
if ($ps->rowCount() == 0) {
die('Atleta não encontrado');
}
$nome = readline('Digite o nome: ');
if ($nome == '' || mb_strlen($nome) > 100) {
  die('Nome não atende aos requisitos');
}
$altura = readline('Digite a altura: ');
if (! is_numeric($altura) || $altura > 2.99) {
  die('Altura deve ser um valor númerico e deve ser no maximo 2.99 metros');
}
$peso = readline('Digite o peso: ');
if (! is_numeric($peso) || $peso > 299.9) {
  die('Peso deve ser um valor númerico e deve ser no maximo 299.9 quilos');
}
$ps = $pdo->prepare('UPDATE atleta SET nome = :nome, peso = :peso, altura = :altura WHERE codigo = :codigo');
$ps->execute(['codigo' => $codigo, 'nome' => $nome, 'peso' => $peso, 'altura' => $altura]);
echo 'Atleta atualizado com sucesso';
}
catch (PDOException $e) {
  echo 'Erro: '. $e->getMessage();
}