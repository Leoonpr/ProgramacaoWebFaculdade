<?php
$dados = [ 'carro', 'carro', 'caminhão', 'caminhão', 'bicicleta',
'caminhada', 'carro', 'van', 'bicicleta', 'caminhada', 'carro',
'van', 'carro', 'caminhão' ];

function contarPalavras($dados) {
  $contagem = [];
  
  foreach ($dados as $dado) {
      if (($contagem[$dado])) {
          $contagem[$dado]++;
      } else {
          $contagem[$dado] = 1;
      }
  }
  return $contagem;
}

$contagemPalavras = contarPalavras($dados);
print_r($contagemPalavras);

?>