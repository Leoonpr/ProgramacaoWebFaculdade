<?php

class Usuario {

    private $id = 0;
    private $nome = '';
    private $anotacoes = [];
    public function __construct( $id = 0, $nome = '', $anotacoes = [] ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->anotacoes = $anotacoes;
    }

    

    public function validar() {
        $problemas = [];

        $tamNome = mb_strlen( $this->nome );
        if (  $tamNome < 2 || $tamNome > 100 ) {
            $problemas []= 'O nome deve ter entre 2 e 100 caracteres.';
        }

        foreach ( $this->anotacoes as $notes ) {
            $problemasAnotacao = $notes->validar();
            foreach ( $problemasAnotacao as $prob ) {
                $problemas []= $prob;
            }
        }

        return $problemas;
    }
}
