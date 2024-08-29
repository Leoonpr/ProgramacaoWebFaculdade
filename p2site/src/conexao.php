<?php
function conectar(): PDO {
    return new PDO( 'mysql:dbname=p2php;charset=utf8;host=localhost',
        'root', '1234', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ] );
}
?>