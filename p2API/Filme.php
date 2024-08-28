<?php
class Filme {
  public function __construct(
    public int $id = 0,
    public string $nome = '',
    public string $genero = '',
  ){
    
  }
}
?>