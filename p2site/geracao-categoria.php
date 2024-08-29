<?php

require_once 'src/repositorioCategoria.php';
require_once 'src/conexao.php';
function gerarCategorias( $id = 0 ) {
    $categorias = [];
    try {
        $pdo = conectar();
        $repo = new repositorioCategoria( $pdo );
        $categorias = $repo->categorias();

    } catch ( Exception $e ) {
        die( 'Erro: ' . $e->getMessage() );
    }

    foreach ( $categorias as $c ) {
        if ( $id > 0 && $c->id === $id ) {
            echo "<option value=\"{$c->id}\" selected >{$c->nome}</option>", PHP_EOL;
        } else {
            echo "<option value=\"{$c->id}\" >{$c->nome}</option>", PHP_EOL;
        }
    }
}

?>