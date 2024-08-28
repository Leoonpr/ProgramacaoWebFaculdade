<?php
require_once 'Filme.php';
require_once 'conexao.php';
require_once 'RepositorioFilme.php';

$filmes = [
  [ "id" => 1, "nome" => "Deadpool & Wolverine", "genero" => "Comédia"],
  [ "id" => 2, "nome" => "Divertidamente 2", "genero" => "Animação"],
];

/*function obterFilmes() {
  global $filmes;
  $json = json_encode( $filmes );
  header( 'Content-Type: application/json' );
  die( $json );
}*/

function obterFilmes() {
  try {
      $pdo = criarPDO(); // Cria uma conexão com o banco de dados
      $repo = new RepositorioFilme($pdo); // Instancia o repositório de filmes
      $filmes = $repo->obterTodos(); // Obtém todos os filmes do banco de dados

      $json = json_encode($filmes); // Converte o array de filmes para JSON
      header('Content-Type: application/json');
      die($json); // Envia a resposta JSON
  } catch(Exception $e) {
      http_response_code(500); // Internal Server Error
      die('Erro ao obter filmes do banco de dados');
  }
}

function obterFilmePeloID($url) {
  global $filmes;
  $pedacosURL  = explode('/', $url);
  $ultimoIndice = count( $pedacosURL ) - 1;
  $id = $pedacosURL[ $ultimoIndice ];
  // Checa o ID
  if ( ! is_numeric( $id ) ) {
    http_response_code( 400 ); // Bad Content
    die( 'Por favor, informe um id numérico' );
}
  // Checa se a URL está correta
  if ( '/api-filmes/' . $id != $url ) {
    http_response_code( 404 );
    die( 'URL não encontrada.' );
}
  // Procura o filme pelo ID
  $filme = null;
  foreach ($filmes as $f) {
    if ($f['id'] == $id) {
      $filme = $f;
      break;
    }
  }
   // Não achou ?
   if ( $filme === null ) {
    http_response_code( 404 );
    die( 'Filme não encontrada. 🤷‍♂️' );
} 
header( 'Content-Type: application/json' );
die( json_encode( $filme ) );
  }

  function cadastrarFilme() {
    $json = file_get_contents('php://input');
    $dados = (array) json_decode( $json );
    $filme = new Filme(0, $dados['nome'], $dados['genero']);
    try {
      $pdo = criarPDO();
      $repo = new RepositorioFilme( $pdo );
      $repo->adicionar( $filme );
      http_response_code( 201 ); // Created
    } catch(Exception $e) {
      http_response_code( 500 ); // Internal Server Error
      die('Erro ao criar um filme');
    }
  }

  function obterFilmePeloID2($url) {
    $pedacosURL  = explode('/', $url);
    $ultimoIndice = count($pedacosURL) - 1;
    $id = $pedacosURL[$ultimoIndice];

    // Checa o ID
    if (!is_numeric($id)) {
        http_response_code(400); // Bad Request
        die('Por favor, informe um id numérico');
    }

    try {
        $pdo = criarPDO(); // Cria uma conexão com o banco de dados
        $repo = new RepositorioFilme($pdo); // Instancia o repositório de filmes
        $filme = $repo->obterPorID(intval($id)); // Obtém o filme pelo ID

        // Não achou o filme?
        if ($filme === false) {
            http_response_code(404); // Not Found
            die('Filme não encontrado.');
        }
        header('Content-Type: application/json');
        die(json_encode($filme)); // Envia o filme como JSON
    } catch (Exception $e) {
        http_response_code(500); // Internal Server Error
        die('Erro ao obter filme do banco de dados');
    }
}

function deletarFilmePeloID($url) {
  $pedacosURL = explode('/', $url);
  $ultimoIndice = count($pedacosURL) - 1;
  $id = $pedacosURL[$ultimoIndice];

  // Checa o ID
  if (!is_numeric($id)) {
      http_response_code(400); // Bad Request
      die('Por favor, informe um id numérico');
  }

  if ('/api-filmes/' . $id != $url) {
    http_response_code(404); // Not Found
    die('URL não encontrada.');
}

  try {
      $pdo = criarPDO(); // Cria uma conexão com o banco de dados
      $repo = new RepositorioFilme($pdo); // Instancia o repositório de filmes
      $repo->deletarPorID(intval($id)); // Deleta o filme pelo ID

      http_response_code(204); // No Content, operação bem-sucedida sem conteúdo de retorno
  } catch (Exception $e) {
      http_response_code(500); // Internal Server Error
      die('Erro ao deletar filme do banco de dados');
  }
}

function atualizarContaPeloId($url) {
  $pedacosURL = explode('/', $url);
  $ultimoIndice = count($pedacosURL) - 1;
  $id = $pedacosURL[$ultimoIndice];

  // Checa o id
  if (!is_numeric($id)) {
      http_response_code(400); // Bad Request
      die('Por favor, informe um id numérico');
  }

  // URL correta?
  if ('/api-filmes/' . $id != $url) {
      http_response_code(404); // Not Found
      die('URL não encontrada.');
  }

  // Obtém os dados enviados na requisição
  $json = file_get_contents('php://input');
  $dados = (array) json_decode($json, true);

  // Checa se os dados necessários estão presentes
  if (!isset($dados['nome']) || !isset($dados['genero'])) {
      http_response_code(400); // Bad Request
      die('Os dados "nome" e "email" são obrigatórios.');
  }

  try {
      $pdo = criarPDO(); // Cria uma conexão com o banco de dados
      $repo = new RepositorioFilme($pdo); // Instancia o repositório de contas

      $repo->atualizarPorID(intval($id), $dados); // Atualiza a conta pelo ID

      http_response_code(200); // OK
      die('Filme atualizado com sucesso');
  } catch (Exception $e) {
      http_response_code(500); // Internal Server Error
      die('Erro ao atualizar o filme no banco de dados');
  }
}




  
?>