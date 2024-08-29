<?php
require_once 'src/conexao.php';
require_once 'src/repositorioProduto.php';
function gerarProdutos() {
  $produtos = [];
  try {
      $pdo = conectar();
      $repo = new repositorioProduto( $pdo );
      $produtos = $repo->produtos();
  } catch ( Exception $e ) {
      die( 'Erro: ' . $e->getMessage() );
  }
  foreach ( $produtos as $p ) {
    echo <<<HTML
    <tr>
      <td>{$p->id}</td>
      <td>{$p->codigo}</td>
      <td>{$p->nome}</td>
      <td>R$ {$p->preco}</td>
      <td>{$p->categoria->nome}</td>
      <td><a href="#">❌</a></td>
      <td><a href="#">📝</a></td>
    </tr>
    </tr>
    HTML;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./src/css/listagemProdutos.css">
  <title>LIstagem de Produtos</title>
</head>
<body>
  <h1>Listagem de Produtos</h1>
  <a class="link-novo" href="novoProduto.php">Criar um Novo Produto</a>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Remoção</th>
        <th>Alteração</th>
      </tr>
    </thead>
    <tbody>
      <?php
      gerarProdutos();
      ?>
    </tbody>
  </table>
</body>
</html>