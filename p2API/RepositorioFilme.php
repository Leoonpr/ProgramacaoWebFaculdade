<?php
class RepositorioFIlme {
  public function __construct( private readonly PDO $pdo ) {
  }
  public function adicionar( Filme $f ): void {
    $sql = <<<'SQL'
        INSERT INTO filme ( nome, genero )
        VALUES ( :nome, :genero )
    SQL;
    $ps = $this->pdo->prepare( $sql );
    $ps->execute( [ 'nome' => $f->nome, 'genero' => $f->genero ] );
    $f->id = intval( $this->pdo->lastInsertId() );
}

public function obterTodos() {
  $ps = $this->pdo->prepare("SELECT id, nome, genero FROM filme");
  $ps->execute();
  return $ps->fetchAll(PDO::FETCH_ASSOC); // Retorna os filmes como um array associativo
}

public function obterPorID(int $id) {
  $stmt = $this->pdo->prepare("SELECT id, nome, genero FROM filme WHERE id = :id");
  $stmt->execute(['id' => $id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function deletarPorID(int $id): void {
  $stmt = $this->pdo->prepare("DELETE FROM filme WHERE id = :id");
  $stmt->execute(['id' => $id]);
}

public function atualizarPorID(int $id, array $dados): void {
  $sql = "UPDATE conta SET nome = :nome, email = :email WHERE id = :id";
  $stmt = $this->pdo->prepare($sql);
  $stmt->execute([
      'id' => $id,
      'nome' => $dados['nome'],
      'email' => $dados['email']
  ]);
}
}
?>