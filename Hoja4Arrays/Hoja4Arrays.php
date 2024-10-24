<?php
if (isset($_GET['ejercicio'])) {
    $ejercicio = $_GET['ejercicio'];

    switch ($ejercicio) {
        case 1:
            // Obtener valores e índices del array
            $alumno = array(
                "nombre" => "José",
                "apellidos" => "Martínez Roca",
                "telefono" => "96 361 66 54",
                "direccion" => "C/ Arco del triunfo 13",
                "dni" => "22 111 055",
                "num_matricula" => "6666",
                "facultad" => "Facultad Informática",
                "curso" => "5"
            );

            $valores = array_values($alumno);
            echo "Valores: <br>";
            print_r($valores);
            echo "<br><br>";

            $indices = array_keys($alumno);
            echo "Índices: <br>";
            print_r($indices);
            break;

        case 2:
            // Array de colores
            $colores = array(
                "Colores fuertes" => array(
                    "rojo" => "#FF0000",
                    "verde" => "#00FF00",
                    "azul" => "#0000FF"
                ),
                "Colores suaves" => array(
                    "cielo" => "#b3ffff",
                    "rosa" => "#ffabff",
                    "vainilla" => "#fcfcae"
                )
            );

            echo "<table border='1' cellpadding='10'>";
            foreach ($colores as $tipo => $lista_colores) {
                echo "<tr>";
                echo "<td><b>$tipo:</b></td>";
                foreach ($lista_colores as $nombre => $codigo) {
                    echo "<td style='background-color:$codigo; color: #000; text-align: center;'>
                            $nombre:$codigo
                        </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            break;

        case '3a':
            // Array de fechas
            $miFecha = array(
                array(
                    array("13 de enero de 2015", "11 de febrero de 2018"),
                    array("13 de enero de 2020", "11 de febrero de 2015"),
                ),
                array(
                    array("3 de agosto de 2017", "1 de octubre de 2016"),
                    array("3 de agosto de 2013", "1 de octubre de 2019"),
                ),
                array(
                    array("10 de junio de 2020", "11 de marzo de 2019"),
                ),
                array(
                    array("22 de marzo de 2020", "28 de mayo de 2019"),
                    array("22 de marzo de 2019", "28 de mayo de 2018"),
                    array("22 de marzo de 2018", "28 de mayo de 2017"),
                    array("22 de marzo de 2017", "28 de mayo de 2016"),
                )
            );

            foreach ($miFecha as $fechasPorGrupo) {
                foreach ($fechasPorGrupo as $fechas) {
                    echo "<p>";
                    foreach ($fechas as $fecha) {
                        echo $fecha . "<br>";
                    }
                    echo "</p>";
                }
            }
            break;

        case '3b':
            // Array de equipo de fútbol
            $equipo_futbol = array(
                array("Rooney", "Chicharito", "Gigs"),
                array("Suarez"),
                array("Torres", "Terry", "Etoo")
            );

            foreach ($equipo_futbol as $jugadores) {
                echo "<p>";
                foreach ($jugadores as $jugador) {
                    echo $jugador . "<br>";
                }
                echo "</p>";
            }
            break;

        case '3c':
            // Array de datos
            $datos = array(
                array(
                    array(0, 0, 0),
                    array(0, 0, 1),
                    array(0, 0, 2)
                ),
                array(
                    array(0, 1, 0),
                    array(0, 1, 1),
                    array(0, 1, 2)
                ),
                array(
                    array(0, 2, 0),
                    array(0, 2, 1),
                    array(0, 2, 2)
                )
            );

            foreach ($datos as $grupo) {
                echo "<p>";
                foreach ($grupo as $subgrupo) {
                    echo implode(", ", $subgrupo) . "<br>";
                }
                echo "</p>";
            }
            break;

        case '3d':
            // Array de supermercado
            $supermercado = array(
                "Electrodomesticos" => array("Televisor", "Heladera"),
                "Alimentos" => array("Carne", "Leche", "Verduras")
            );

            foreach ($supermercado as $categoria => $productos) {
                echo "<p><strong>" . $categoria . ":</strong><br>";
                foreach ($productos as $producto) {
                    echo $producto . "<br>";
                }
                echo "</p>";
            }
            break;

        case '3e':
            // Array de productos
            $productos = array(
                "procesador" => array(
                    "AMD" => "K7 XP 1800",
                    "PENTIUM" => "IV 2,5 Ghz"
                ),
                "disco_duro" => array(
                    "SEAGATE" => "40GB 10000 rpm",
                    "SAMSUNG" => "40GB 7200 rpm",
                    "WESTERN_DIGITAL" => "60GB 7200 rpm 8MB caché"
                )
            );

            foreach ($productos as $tipo => $detalleProducto) {
                echo "<p><strong>" . ucfirst($tipo) . ":</strong><br>";
                foreach ($detalleProducto as $marca => $descripcion) {
                    echo $marca . ": " . $descripcion . "<br>";
                }
                echo "</p>";
            }
            break;

        case '3f':
            // Array de productos actualizado
            $productos["procesador"]["AMD"] = array("K7 XP 1900", "K7 XP 1800", "K7 XP 1700");
            $productos["procesador"]["PENTIUM"] = array("IV 2,5 Ghz", "IV 2,4 Ghz", "IV 2,3 Ghz", "IV 2,2 Ghz");
            $productos["disco_duro"]["SEAGATE"] = array("40GB 10000 rpm", "80GB 7200 rpm", "160GB 7200 rpm");
            $productos["disco_duro"]["SAMSUNG"] = array("40GB 7200 rpm");
            $productos["disco_duro"]["WESTERN_DIGITAL"] = array("60GB 7200 rpm 8MB caché", "80GB 10000 rpm 16MB caché");

            foreach ($productos as $tipo => $detalleProducto) {
                echo "<p><strong>" . ucfirst($tipo) . ":</strong><br>";
                foreach ($detalleProducto as $marca => $descripcion) {
                    if (is_array($descripcion)) {
                        echo $marca . ": " . implode(", ", $descripcion) . "<br>";
                    } else {
                        echo $marca . ": " . $descripcion . "<br>";
                    }
                }
                echo "</p>";
            }
            break;

        default:
            echo "Ejercicio no encontrado.";
            break;
    }
} else {
    echo "No se ha recibido ningún ejercicio.";
}
