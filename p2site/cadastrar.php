<?php
declare(strict_types=1); // Verificação rigorosa de tipos

require_once 'src/conexao.php';
require_once 'src/repositorioProduto.php';
require_once 'src/repositorioCategoria.php';

if (!isset(
    $_POST['codigo'],
    $_POST['nome'],
    $_POST['preco'],
    $_POST['categoria']
)) {
    die('Por favor, informe todos os campos.');
}

// Validar e limpar os dados recebidos
$codigo = htmlspecialchars($_POST['codigo']);
$nome = htmlspecialchars($_POST['nome']);
$preco = $_POST['preco'];
$idCategoria = intval($_POST['categoria']);

// Verificar se o preço é um número válido
if (!is_numeric($preco)) {
    die('Preço inválido.');
}

// Converter o preço para float, substituindo vírgulas por pontos
$precoFloat = (float)str_replace(',', '.', $preco);

try {
    $pdo = conectar();

    $repoProduto = new repositorioProduto($pdo);
    $repoCategoria = new repositorioCategoria($pdo);

    $categoria = $repoCategoria->categoriaComId($idCategoria);
    if ($categoria === null) {
        throw new Exception('Categoria inexistente.');
    }

    $produto = new Produto(
        0,
        $codigo,
        $nome,
        $precoFloat,
        $categoria
    );

    $repoProduto->adicionar($produto);

    // Redireciona após adicionar o produto
    header('Location: listagemProdutos.php');
    exit; // Adicione exit para garantir que o script pare após o redirecionamento
} catch (Exception $e) {
    die('Erro: ' . $e->getMessage());
}
