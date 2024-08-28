<?php
$string = readline('Digite alguma coisa: ');
$string = str_replace(['.', '-', ',', ';', '/'], '', $string);
echo $string;
?>