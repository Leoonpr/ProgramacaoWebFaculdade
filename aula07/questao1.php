<?php
$array = ['a'=> 3, 0=>1, 'b'=>5, 1=>3, 'c' => 4, 2=>3];
function somaSeparada($array) {
  $somaString = 0;
  $somaInteiro = 0;
  foreach ($array as $chave => $valor) {
      if (is_numeric($chave)) {
          $somaString += $valor;
      } else {
          $somaInteiro += $valor;
      }
  }
  return ['strings' => $somaString, 'inteiros' => $somaInteiro];
}
$resultado = somaSeparada($array);
echo "Soma das chaves strings: " . $resultado['strings'] . PHP_EOL;
echo "Soma das chaves inteiros: " . $resultado['inteiros'] . PHP_EOL;