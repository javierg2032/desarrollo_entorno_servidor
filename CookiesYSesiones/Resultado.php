<?php
session_start();
$buscar = $_SESSION['buscar'];
$busqueda = $_SESSION['busqueda'];
$genero = $_SESSION['genero'];

/*$buscar = $_GET['valor1'];
$busqueda = $_GET['valor2'];
$genero = $_GET['valor3'];
*/


echo"<h1>Resultados de la busqueda</h1>";
echo"<p><strong>Texto a buscar: </strong> $buscar</p>";
echo"<p><strong>Buscar en: </strong> $busqueda</p>";
echo"<p><strong>Genero musical: </strong> $genero</p>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulario simple</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <a href="Ejercicio1v2ConStyle.php">Volver</a>
    </body>
</html>
