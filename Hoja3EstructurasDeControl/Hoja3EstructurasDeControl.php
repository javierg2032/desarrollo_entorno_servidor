<?php
if (isset($_GET['ejercicio'])) {
    $ejercicio = $_GET['ejercicio'];

    switch ($ejercicio) {
        case 1:
            $a = 5;
            $b = 10;
            $c = 7;
            if ($a > $b && $a > $c) {
                echo "La mayor es: $a";
            } elseif ($b > $c) {
                echo "La mayor es: $b";
            } else {
                echo "La mayor es: $c";
            }
            break;

        case 2:
            $a = "cadena corta";
            $b = "cadena mucho más larga";
            $c = "media cadena";
            $longest = strlen($a) >= strlen($b) ? ($a >= strlen($c) ? $a : $c) : (strlen($b) >= strlen($c) ? $b : $c);
            echo "La cadena de mayor longitud es: $longest";
            break;

        case 3:
            $num = rand(1, 100);
            $paridad = ($num % 2 == 0) ? "par" : "impar";
            echo "Número generado: $num, que es $paridad.";
            break;

        case 4:
            $dia = date("D");
            switch ($dia) {
                case "Mon": $nombreDia = "Lunes"; break;
                case "Tue": $nombreDia = "Martes"; break;
                case "Wed": $nombreDia = "Miércoles"; break;
                case "Thu": $nombreDia = "Jueves"; break;
                case "Fri": $nombreDia = "Viernes"; break;
                case "Sat": $nombreDia = "Sábado"; break;
                case "Sun": $nombreDia = "Domingo"; break;
            }
            echo "Hoy es: $nombreDia.";
            break;

        case 5:
            $a = "corto";
            $b = "medio";
            $c = "cadena muy larga";
            $strings = [$a, $b, $c];
            sort($strings);
            echo "Cadenas ordenadas por longitud: " . implode(", ", $strings);
            break;

        case 6:
            echo "Números impares del 1 al 99: ";
            for ($i = 1; $i < 100; $i += 2) {
                if ($i != 5 && $i % 5 != 0) {
                    echo "$i ";
                }
            }
            break;

        case 7:
            $n = 5; // Puedes cambiar este número para calcular su factorial.
            $factorial = 1;

            // Con while
            $i = 1;
            while ($i <= $n) {
                $factorial *= $i;
                $i++;
            }
            echo "El factorial de $n es: $factorial<br>";

            // Con do-while
            $factorial = 1;
            $i = 1;
            do {
                $factorial *= $i;
                $i++;
            } while ($i <= $n);
            echo "El factorial de $n es: $factorial (usando do-while)";
            break;

        case 8:
            $nif_nombres = [
                "12345678A" => "Juan",
                "87654321B" => "Maria",
                "11223344C" => "Luis",
                "22334455D" => "Ana",
                "33445566E" => "Pedro"
            ];
            echo "<pre>";
            print_r($nif_nombres);
            echo "</pre>";
            break;

        case 9:
            $primos = [];
            $num = 2;
            while (count($primos) < 10) {
                $esPrimo = true;
                for ($i = 2; $i <= sqrt($num); $i++) {
                    if ($num % $i == 0) {
                        $esPrimo = false;
                        break;
                    }
                }
                if ($esPrimo) {
                    $primos[] = $num;
                }
                $num++;
            }
            echo "Los primeros diez números primos son: " . implode(", ", $primos);
            break;

        default:
            echo "Ejercicio no válido.";
            break;
    }
}
?>