<?php
class Produto {
  public function __construct(
    public int $id,
    public string $codigo,
    public string $nome,
    public float $preco,
    public Categoria $categoria,
  )
  {
  }
}

?>