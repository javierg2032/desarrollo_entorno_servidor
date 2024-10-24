<?php
if (isset($_GET['ejercicio'])) {
    $ejercicio = $_GET['ejercicio'];

    switch ($ejercicio) {
        case 1:
            // Ejemplo de salida
            $a = 5;
            $b = 10;
            $resultado = $a + $b;
            echo "El resultado de $a + $b es: $resultado";
            break;

        case 2:
            // Ejemplo de operadores lógicos
            $a = true;
            $b = false;
            if ($a && !$b) {
                echo "La condición es verdadera.";
            } else {
                echo "La condición es falsa.";
            }
            break;

        case 3:
            // Cálculos, redondeo y formato
            $numero = 7.567;
            $redondeado = round($numero, 2);
            echo "Número original: $numero. Redondeado: $redondeado.";
            break;

        case '4_1':
            // Número aleatorio entre 1 y 100
            $numeroAleatorio1 = rand(1, 100);
            echo "Número aleatorio entre 1 y 100: $numeroAleatorio1.";
            break;

        case '4_2':
            // Número aleatorio entre 1 y 1000
            $numeroAleatorio2 = rand(1, 1000);
            echo "Número aleatorio entre 1 y 1000: $numeroAleatorio2.";
            break;

        case 5:
            // Completa el siguiente código
            // Ejemplo simple para mostrar
            $nombre = "Javier";
            $ciudad = "Madrid";
            echo "Tu nombre es: $nombre y vives en: $ciudad.";
            break;

        default:
            echo "Ejercicio no válido.";
            break;
    }
}
