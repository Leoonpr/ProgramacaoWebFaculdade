<?php
require_once'Produto.php';
require_once'Categoria.php';
class repositorioProduto {
  private PDO $pdo;

  public function __construct( PDO $pdo ) {
      $this->pdo = $pdo;
  }

  public function produtos(): array {
    $sql = <<<'SQL'
    SELECT
        p.id, codigo, p.nome, preco,
        categoria_id, c.nome AS 'nome_categoria'
    FROM produto p
    JOIN categoria c ON c.id = p.categoria_id
    SQL;
    $ps = $this->pdo->prepare( $sql );
    $ps->setFetchMode( PDO::FETCH_ASSOC );
    $ps->execute();
    $produtos = [];
    foreach ($ps as $r) {
      $produtos []= $this->registroParaProduto( $r );
    }
    return $produtos;
  }
  private function registroParaProduto( $r ): Produto {
    $c = new Categoria( $r[ 'categoria_id' ], $r[ 'nome_categoria' ] );
    $e = new Produto(
      $r[ 'id' ], $r[ 'codigo' ], $r[ 'nome'], $r[ 'preco' ],
      $c
    );
    return $e;
  }
  public function adicionar( Produto &$p ): void {
    $sql = <<<'SQL'
    INSERT INTO produto
    ( codigo, nome, preco, categoria_id )
    VALUES
    ( :codigo, :nome, :preco, :categoria_id )
    SQL;
    $ps = $this->pdo->prepare( $sql );
    $ps->execute( [
        'codigo' => $p->codigo,
        'nome' => $p->nome,
        'preco' => $p->preco,
        'categoria_id' => $p->categoria->id
    ] );

    $p->id = intval( $this->pdo->lastInsertId() );
}

}
?>