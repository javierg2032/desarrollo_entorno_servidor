<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja 1. Variables</title>
</head>
<body>
    <div>
        <p>1. Indica la salida por pantalla del siguiente script:</p>
        <?php 
            $a=7;
            $b=&$a;
            $c=&$b;
            echo $a,$b,$c;
            $b=8;
            echo $a,$b,$c;
        ?>
    </div>
    <div>
        <p>2. Indica la salida por pantalla del siguiente script:</p>
        <?php 
            $a=7;
            $b=&$a;
            $c=&$b;
            echo $a,$b,$c;
            unset($a);
            $b=8;
            echo $a,$b,$c;
        ?>
    </div>
    <div>
        <p>4. Hacer un programa en PHP que escriba tu nombre (en negrita) y la ciudad dónde naciste.</p>
        <?php
          echo "<b>Javier</b>", " Alcorcón";
        ?>
    </div>
    <div>
        <p>5. Detectar siete errores en el siguiente código:</p>
        <?php
            $x = -1;
            $y = 9;
            $suma = $x + $y; // Faltaba el signo de dólar en $x y en $y
            print("El valor de x es <i>$x</i>;"); // La etiqueta <i> no estaba cerrada y faltaba el punto y coma al final
            echo "<br />"; // La instrucción <br /> no era válida en PHP. Ahora está dentro de echo
            print("El valor de y es <i>$y</i><br />"); //Faltaba un ')' antes del ;
            print("La suma es <b><i>$suma</i></b><br />");
           //Había un ';' despues de cerrar el php
        ?>
    </div>
    <div>
        <p>7. Indica la salida del siguiente código:</p>
        <?php 
            $dato="prueba";
            echo "El contenido de la variable $dato es $dato";
            echo "<br />";
            echo 'El contenido de la variable $dato es $dato';
        ?>
    </div>

    <div>
        <p>8. Obtén el script PHP para la siguiente salida por pantalla de dos formas diferentes: escapando las comillas y sin escapar las comillas.</p>
        <?php
            echo "Escapando las comillas <br />";
            echo "Aquí se pueden añadir comillas \"dobles\"<br />";
            echo "Aquí se pueden añadir comillas \'simples\'<br />";
            echo "<br />Sin escapando las comillas <br />";
            echo 'Aquí se pueden añadir comillas "dobles"<br />';
            echo 'Aquí se pueden añadir comillas 'simples'';
        ?>
    </div>
    <div>
        <p>9. Completa el siguiente script:</p>
        <?php
            $variable = NULL;
            if ($variable)  echo "La variable tiene un valor.";
            else echo "La variable es NULL o false.";
        ?>
    </div>
    <div>
        <p>10. Declara en un script una variable de tipo coma flotante con su valor correspondiente mostrando por pantalla su contenido y su tipo. Cambia el tipo de la variable a boolean y muestra su contenido y su tipo.</p>
        <?php
            // Declarar una variable de tipo coma flotante
            $variable = 3.14;

            // Mostrar contenido y tipo de la variable original
            echo "Contenido: $variable<br />";
            echo "Tipo: " . gettype($variable) . "<br />";

            // Cambiar el tipo de la variable a boolean
            $variable = (bool)$variable;

            // Mostrar contenido y tipo de la variable después del cambio
            echo "Contenido: $variable<br />";
            echo "Tipo: " . gettype($variable) . "<br />";
        ?>
    </div>
</body>
</html>