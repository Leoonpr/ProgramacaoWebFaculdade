<?php

class Telefone {

    public $id = 0;
    public $numero = '';

    public function __construct($id = 0, $numero = '') {
        $this->id = $id;
        $this->numero = $numero;
    }

    public function validar() {
        $problemas = [];
        if ( mb_strlen( $this->numero ) != 11 ) {
            $problemas []= "O telefone \"{$this->numero}\" deve ter 11 caracteres.";
        } else if ( ! is_numeric( $this->numero ) ) {
            $problemas []= "O telefone \"{$this->numero}\" deve ter todos os caracteres numéricos.";
        }        
        return $problemas;
    }
}

// $t = new Telefone( 0, '1234567890' );
// print_r( $t->validar() );

?>
