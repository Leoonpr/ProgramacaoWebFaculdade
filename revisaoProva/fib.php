<?php
// Função para gerar um array contendo os elementos da sequência de Fibonacci
function fibArray($n) {
    $fib = [1, 1]; // Inicializa o array com os dois primeiros elementos da sequência

    for ($i = 2; $i < $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2]; // Calcula o próximo elemento da sequência
    }

    return $fib;
}

// Função para gerar um número aleatório entre 1 e 100 e chamar a função fibArray
function gerarFibonacci() {
    $numero_aleatorio = rand(1, 100); // Gera um número aleatório entre 1 e 100
    echo "Número aleatório: $numero_aleatorio\n";

    // Chama a função fibArray com o número aleatório gerado
    $fibonacci_array = fibArray($numero_aleatorio);
    
    // Imprime o array retornado pela função fibArray
    echo "Sequência de Fibonacci para $numero_aleatorio elementos: " . implode(", ", $fibonacci_array) . "\n";
}

// Chama a função para gerar a sequência de Fibonacci
gerarFibonacci();
?>
