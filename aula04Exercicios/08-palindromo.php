<?php
$texto = 'A base do teto desaba';
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
$texto = removerDiacriticos($texto);
$texto = str_replace(['.', '-', ',', ';', '/'], '', $texto);
$texto = strrev($texto);
$texto = strtolower($texto);
echo $texto;
?>