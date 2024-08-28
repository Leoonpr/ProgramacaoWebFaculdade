<?php
require_once 'api-filmes.php';
$metodo = $_SERVER[ 'REQUEST_METHOD' ];
$url = mb_strtolower( $_SERVER[ 'REQUEST_URI' ] );

if ($metodo == 'GET' && $url == '/api-filmes') {
obterFilmes();
} else if ( $metodo === 'GET' && mb_strpos( $url, '/api-filmes' ) !== false ) {
    obterFilmePeloId( $url );
} else if ( $metodo === 'POST' && $url === '/api-filmes' ) {
  cadastrarFilme();
}  else if ( $metodo === 'DELETE' ) { // TODO: terminar
 deletarFilmePeloID($url);
}  else {
  http_response_code( 404 );
  die( 'Não achei 🤷‍♂️' );
}
?>