<?php

function removerDiacriticos($texto) {
  $mapeamento = array(
    'á' => 'a',
    'à' => 'a',
    'ã' => 'a',
    'â' => 'a',
    'é' => 'e',
    'è' => 'e',
    'ê' => 'e',
    'í' => 'i',
    'ì' => 'i',
    'î' => 'i',
    'ó' => 'o',
    'ò' => 'o',
    'ô' => 'o',
    'õ' => 'o',
    'ú' => 'u',
    'ù' => 'u',
    'û' => 'u',
    'ç' => 'c',
  );

  return strtr($texto, $mapeamento);
}

// Exemplo de uso
$textoComDiacriticos = "áéíóúàèìòùãõç";
$textoSemDiacriticos = removerDiacriticos($textoComDiacriticos);

echo "Texto original: $textoComDiacriticos\n";
echo "Texto sem diacríticos: $textoSemDiacriticos\n";

?>
