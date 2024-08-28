<?php
require_once 'Produto.php';
class TelaProduto {
    public function obterProduto() {
        echo "Por favor, insira os dados do produto:\n";
        
        $codigo = readline("Código: ");
        $descricao = readline("Descrição: ");
        $estoque = readline("Estoque: ");
        $preco = readline("Preço: ");

        $produto = new Produto($codigo, $descricao, $estoque, $preco);
        return $produto;
    }
    public function mostrarProdutos(array $produtos) {
      echo "Produtos disponíveis:\n";
      foreach ($produtos as $produto) {
          echo "Código: {$produto->codigo}, Descrição: {$produto->descricao}, Estoque: {$produto->estoque}, Preço: {$produto->preco}\n";
      }
  }
}

$telaProduto = new TelaProduto();
$produtos = [
  new Produto(123456, "Produto 1", 10, 9.99),
  new Produto(789012, "Produto 2", 20, 19.99),
  new Produto(345678, "Produto 3", 15, 14.99)
];
$novoProduto = $telaProduto->mostrarProdutos($produtos);
print_r($novoProduto);
?>