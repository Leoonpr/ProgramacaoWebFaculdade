<?php
declare(strict_types=1);
require_once 'geracao-categoria.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/novoProduto.css">
    <title>Novo Equipamento</title>
</head>
<body>
    <h1>Equipamento</h1>
    <a href="listagemProdutos.php" >Voltar</a>
    <form action="cadastrar.php" method="POST" >
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" >
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" >
        <label for="preco">Preço:</label>
        <input type="number" step="any" id="preco" name="preco" >
        <label for="categoria" accesskey="C" >Categoria:</label>
        <select name="categoria" id="categoria" >
            <?php
            gerarCategorias();
            ?>
        </select>
        <button type="submit" >Enviar</button>
    </form>
</body>
</html>