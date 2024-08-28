<?php
try {
    $pdo = new PDO(
        'mysql:dbname=exerciciosphpbd;host=localhost;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $preco = readline('Digite um preco: ');
    buscaPreco($preco, $pdo);
} catch(PDOException $e) {
    die('Erro: ' . $e->getMessage());
}

function buscaPreco($preco, $pdo) {
$ps = $pdo->prepare('SELECT id, nome, preco FROM produto WHERE preco LIKE :preco');
$ps->execute(['preco' => $preco]);
$produtos = $ps->fetchAll();
if (empty($produtos)) {
    echo "Nenhum produto encontrado com preço igual a $preco.\n";
} else {
    echo "Produtos com preço igual ou superior a $preco:\n";
    foreach ($produtos as $produto) {
        echo "ID: {$produto['id']}, Nome: {$produto['nome']}, Preço: {$produto['preco']}\n";
    }
} }
?>
