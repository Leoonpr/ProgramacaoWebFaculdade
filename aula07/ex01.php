<?php
try {
$pdo = new PDO(
  'mysql:dbname=exerciciosphpbd;host=localhost;charset=utf8',
  'root',
  '',
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
}
catch(PDOException $e ) {
  die( 'Erro: ' . $e->getMessage() );
}
$ps = $pdo->query('SELECT * FROM produto');
$produtos = $ps->fetchAll();
foreach ($produtos as $p) {
  echo $p['nome'], ' R$', $p['preco'] ,PHP_EOL;
}