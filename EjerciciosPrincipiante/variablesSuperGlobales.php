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
echo "<br>";
echo "<br>";
?>

<?php
echo "<br>";
echo "<br>Ruta dentro de htdocs: " . $_SERVER['PHP_SELF'];
echo "<br>Nombre del servidor: " . $_SERVER['SERVER_NAME'];
echo "<br>Software del servidor: " . $_SERVER['SERVER_SOFTWARE'];
echo "<br>Protocolo: " . $_SERVER['SERVER_PROTOCOL'];
echo "<br>Método de la petición: " . $_SERVER['REQUEST_METHOD'];
echo "<br>";
print_r($_COOKIE)
?>
