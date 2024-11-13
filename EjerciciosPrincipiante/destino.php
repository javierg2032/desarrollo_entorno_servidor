<?php

// Verificamos si las variables GET existen antes de usarlas
if (isset($_GET["variable1"]) && isset($_GET["variable2"]) && isset($_GET["variable3"])) {

$variable1 = $_GET["variable1"];
$variable2 = $_GET["variable2"];
$variable3 = $_GET["variable3"];

//Realizo operacion dependiendo del valor de la $variable3
switch($variable3){
    case "+":
     $respuesta = $variable1 + $variable2;
        break;
    case "-":
    $respuesta = $variable1 - $variable2;
        break;
    case "*":
    $respuesta = $variable1 * $variable2;
        break;
    case "/":
        //Verifico si no es división entre cero
        if($variable2 !=0){
            $respuesta = $variable1 / $variable2;
        }else{
            $respuesta = "No se puede dividir entre 0";
        }
        break;
    default:
        $respuesta= "El operador no es válido";
    }

    //Mostramos el resultado
    echo "El resultado de la operación es: $respuesta";
}else{
    echo "Falta algún parámetro para realizar la operación, lo sentimos";
}

