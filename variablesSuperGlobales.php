<?php
$x = 10;
$y = 20;

function ambito()
{
    $x = 1;
    $y = 2;
    echo "Variables locales a la función: <br>";
    echo "x=$x <br>";
    echo "y=$y <br>";
    echo "x=$GLOBALS[x] y=$GLOBALS[y] <br>";
}
ambito();
print_r($GLOBALS);

?>
