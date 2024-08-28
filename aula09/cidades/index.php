<?php
require_once('RepositorioCidadeEmBDR.php');
$pdo = null;
$cidades = [];

try {
  $pdo = new PDO(
    'mysql:dbname=http;host=localhost;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
  );
  $repo = new RepositorioCidadeEmBDR($pdo);
  if (isset($_GET['nome'])) {
    $cidades = $repo->consultar($_GET['nome']);
  }else {
    $cidades = $repo->consultar();
  }
} catch(PDOException $e) {
  http_response_code(500);
  die('Erro processando a operação' . $e->getMessage());
}



function desenharcCidades($cidades) {
  foreach($cidades as $cidade) {
    $linha = <<<HTML
    <tr>
      <td>$cidade->id</td>
      <td>$cidade->nome</td>
    </tr>
    HTML;
    echo $linha, PHP_EOL;
    //echo '<tr><td>' . $cidade->id . '</td><td>' . 
    //$cidade->nome . '</td></tr>';
  }
}

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Cidades</title>
</head>
<body>
  <h1>Cidades</h1>

  <form>
    <label for="pesquisa">Pesquisa:</label>
    <input type="text" name="nome" id="pesquisa" value="<?php echo isset ($_GET['nome']) ? $_GET['nome'] : '' ?>"/>
    <button type="submit">Pesquisar</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
      </tr>
    </thead>
    <tbody>
      <?php
      desenharcCidades($cidades)
      ?>
    </tbody>

</body>
</html>

