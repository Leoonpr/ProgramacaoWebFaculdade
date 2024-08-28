<?php

class Anotacao {

    public $id = 0;
    public $anotacao = '';

    public function __construct($id = 0, $anotacao = '') {
        $this->id = $id;
        $this->anotacao = $anotacao;
    }

    public function validar() {
        $problemas = [];
        if ( mb_strlen( $this->anotacao ) > 200 ) {
            $problemas []= "A anotação deve ter no máximo 200 caracteres.";
        }    
        return $problemas;
    }
}
?>
