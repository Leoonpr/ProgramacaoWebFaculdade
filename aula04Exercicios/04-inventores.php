<?php
$inventores = [
[ "nome" => 'Albert', "sobrenome" => 'Einstein', "nasc" => 1879,
"morte" => 1955 ],
[ "nome" => 'Isaac', "sobrenome" => 'Newton', "nasc" => 1643,
"morte" => 1727 ],
[ "nome" => 'Galileo', "sobrenome" => 'Galilei', "nasc" => 1564,
"morte" => 1642 ],
[ "nome" => 'Nicolaus', "sobrenome" => 'Copernicus', "nasc" => 1473,
"morte" => 1543 ],
[ "nome" => 'Ada', "sobrenome" => 'Lovelace', "nasc" => 1815,
"morte" => 1852 ]
];

function calcularIdade($inventores) {
  $resultado = [];
  foreach ($inventores as $inventor) {
      $idade = $inventor['morte'] - $inventor['nasc'];
      $resultado[$inventor['sobrenome']] = $idade;
  }
  return $resultado;
}
$resultado = calcularIdade($inventores);
print_r($resultado);

function mediaIdade($inventores) {
  $resultadoMedia = 0;
  foreach ($inventores as $inventor ) {
    $idade = $inventor['morte'] - $inventor['nasc'];
    $resultadoMedia += $idade;
  }
  return $resultadoMedia / count($inventores);
}
echo 'A media de idades é de ' . mediaIdade($inventores) . ' anos' . PHP_EOL;

function inventoresPorSeculo($inventores, $seculo) {
  $inicioSeculo = ($seculo - 1) * 100;
  $fimSeculo = $seculo * 100 - 1;
  
  $inventoresSeculo = array_filter($inventores, function($inventor) use ($inicioSeculo, $fimSeculo) {
      return ($inventor['nasc'] >= $inicioSeculo && $inventor['nasc'] <= $fimSeculo) ||
             ($inventor['morte'] >= $inicioSeculo && $inventor['morte'] <= $fimSeculo);
  });

  return $inventoresSeculo;
}
$seculo = 16;
$inventoresSeculo = inventoresPorSeculo($inventores, $seculo);
echo "Inventores que viveram no século $seculo:\n";
foreach ($inventoresSeculo as $inventor) {
  echo $inventor['nome'] . " " . $inventor['sobrenome'] . "\n";
}

function ordenarPorSobrenome($inventores) {
  usort($inventores, function($a, $b) {
      return strcmp($a['sobrenome'], $b['sobrenome']);
  });
  return $inventores;
}

$inventoresOrdenados = ordenarPorSobrenome($inventores);

echo "Inventores ordenados pelo sobrenome:\n";
foreach ($inventoresOrdenados as $inventor) {
  echo $inventor['nome'] . " " . $inventor['sobrenome'] . "\n";
}
?>