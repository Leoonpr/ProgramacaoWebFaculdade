<?php
function media($array) {
    $soma = array_sum($array);
    $quantidade = count($array);
    return $soma / $quantidade;
}

$random_numbers = [];
for ($i = 0; $i < 10; $i++) {
    $random_numbers[] = rand(1, 100);
}

echo "Valores do array: " . implode(", ", $random_numbers) . PHP_EOL;
echo "Média: " . media($random_numbers);
?>
