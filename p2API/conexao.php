<?php
function criarPDO(): PDO {
    return new PDO( 'mysql:dbname=p2php;host=localhost;charset=utf8',
        'root', '1234', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ] );
}
?>