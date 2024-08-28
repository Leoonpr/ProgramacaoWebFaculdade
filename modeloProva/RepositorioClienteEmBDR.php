<?php

class RepositorioClienteEmBDR{
  
    private $pdo;
    public function __construct( PDO $pdo ) {
      $this->pdo = $pdo;
  }
}