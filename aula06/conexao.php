<?php
function criarConexao() {
    $pdo = new PDO(
        'mysql:dbname=pw-aula06;host=localhost;charset=utf8',
        'root',
        '',
        [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
    );
    return $pdo;
}

