<?php
declare(strict_types=1);

$a = array( 'one','two','three' );
$b = array( '1st' => 'four', 'five', '3rd' => 'six' );

echo implode( ',', $a ),'/', implode( ',', $b );
?>