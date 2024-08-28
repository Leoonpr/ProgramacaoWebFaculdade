<?php
class Calculadora { // Model
    function somar( string $x, string $y ) {
        if ( ! is_numeric( $x ) ) {
            throw new RuntimeException( 'O primeiro valor precisa ser numérico.' );
        }
        if ( ! is_numeric( $y ) ) {
            throw new RuntimeException( 'O segundo valor precisa ser numérico.' );
        }
        return $x + $y;
    }
}