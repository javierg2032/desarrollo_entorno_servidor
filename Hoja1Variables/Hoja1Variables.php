<?php
if (isset($_GET['ejercicio'])) {
    $ejercicio = $_GET['ejercicio'];

    switch ($ejercicio) {
        case 1:
            // Ejercicio 1
            $a = 7;
            $b = &$a;
            $c = &$b;
            echo $a, $b, $c;
            $b = 8;
            echo $a, $b, $c;
            break;

        case 2:
            // Ejercicio 2
            $a = 7;
            $b = &$a;
            $c = &$b;
            echo $a, $b, $c;
            unset($a);
            $b = 8;
            echo $b;
            break;

        case 4:
            // Ejercicio 4
            echo "<b>Javier</b>", " Alcorcón";
            break;

        case 5:
            // Ejercicio 5
            $x = -1;
            $y = 9;
            $suma = $x + $y; // Faltaba el signo de dólar en $x y en $y
            print("El valor de x es <i>$x</i>;"); // La etiqueta <i> no estaba cerrada y faltaba el punto y coma al final
            echo "<br />"; // La instrucción <br /> no era válida en PHP. Ahora está dentro de echo
            print("El valor de y es <i>$y</i><br />"); //Faltaba un ')' antes del ;
            print("La suma es <b><i>$suma</i></b><br />");
            break;

        case 7:
            // Ejercicio 7
            $dato = "prueba";
            echo "El contenido de la variable $dato es $dato";
            echo "<br />";
            echo 'El contenido de la variable $dato es $dato';
            break;

        case 8:
            // Ejercicio 8
            echo "Escapando las comillas <br />";
            echo "Aquí se pueden añadir comillas \"dobles\"<br />";
            echo "Aquí se pueden añadir comillas \'simples\'<br />";
            echo "<br />Sin escapando las comillas <br />";
            echo 'Aquí se pueden añadir comillas "dobles"<br />';
            echo 'Aquí se pueden añadir comillas "simples"';
            break;

        case 9:
            // Ejercicio 9
            $variable = NULL;
            if ($variable)  echo "La variable tiene un valor.";
            else echo "La variable es NULL o false.";
            break;

        case 10:
            // Ejercicio 10
            $variable = 3.14;
            echo "Contenido: $variable<br />";
            echo "Tipo: " . gettype($variable) . "<br />";
            $variable = (bool)$variable;
            echo "Contenido: $variable<br />";
            echo "Tipo: " . gettype($variable) . "<br />";
            break;

        default:
            echo "Ejercicio no encontrado.";
            break;
    }
}
?>
