<?php

$first  = new DateTime();

sleep(10);
$second = new DateTime( );

$diff = $first->diff( $second );

echo $diff->format( '%H:%I:%S' ); // -> 00:25:25
?>
