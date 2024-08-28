<?php

class Cliente {

    public $id = 0;
    public $nome = '';
    public $telefones = [];
    public function __construct( $id = 0, $nome = '', $telefones = [] ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefones = $telefones;
    }

    public function validar() {
        $problemas = [];

        $tamNome = mb_strlen( $this->nome );
        if (  $tamNome < 2 || $tamNome > 100 ) {
            $problemas []= 'O nome deve ter entre 2 e 100 caracteres.';
        }

        foreach ( $this->telefones as $tel ) {
            $problemasTelefone = $tel->validar();
            foreach ( $problemasTelefone as $prob ) {
                $problemas []= $prob;
            }
        }

        return $problemas;
    }
}
