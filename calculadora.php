<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora.php</title>
</head>

<body>
    <?php
    //para mostrar la variable de un html a través de _GET["variable"]
    echo $_GET["operando1"] . "<br>";
    echo $_GET["operando2"] . "<br>";;
    echo "Se va a realizar una " . $_GET["operador"] . "<br>";

    //para utilizar las variables de un html estas se han de guardar en el php en una variables locales, dentro de estas variables locales se guardan los elementos con _GET["variable"]
    $var1 = (float) $_GET["operando1"];
    $var2 = (float) $_GET["operando2"];
    $op = $_GET["operador"];

    switch ($op) {
        case 'suma':
            echo "la suma es: " . ($var1 + $var2);
            break;
        case 'resta':
            echo "la resta es: " . ($var1 - $var2);
            break;
        case 'multiplicación':
            echo "la multiplicación es: " . ($var1 * $var2);
            break;
        case 'división':
            if ($var2 != 0) {
                echo "la división es: " . round($var1 / $var2, 2);
            } else {
                echo "La división no es posible";
            }
            break;
        default:
            echo "Operador no válido.";
            break;
    }
    ?>
</body>

</html>