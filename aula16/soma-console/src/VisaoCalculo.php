<?php
class VisaoCalculo {

    // Entradas

    function numero1(): string {
        return readline( 'Número 1: ' );
    }

    function numero2(): string {
        return readline( 'Número 2: ' );
    }

    // Saídas

    function mostrarResultado( $resultado ): void {
        echo 'Resultado: ', $resultado, PHP_EOL;
    }

    function mostrarExcecao( Exception $e ): void {
        echo 'Erro: ', $e->getMessage(), PHP_EOL;
    }

}