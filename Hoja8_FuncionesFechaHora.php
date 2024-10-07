<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja 8 Funciones Fecha y Hora</title>
    <?php
    // Establecer la zona horaria
    date_default_timezone_set('Europe/Madrid');

    // Obtener el día de la semana actual (0 = domingo, 1 = lunes, ..., 6 = sábado)
    $dia_semana = date('w');

    // Definir colores de fondo para cada día de la semana
    $colores = [
        0 => '#FFCCCB', // Domingo (rojo claro)
        1 => '#FFEBCC', // Lunes (naranja claro)
        2 => '#FFFFCC', // Martes (amarillo claro)
        3 => '#CCFFCC', // Miércoles (verde claro)
        4 => '#CCFFFF', // Jueves (cian claro)
        5 => '#CCCCFF', // Viernes (azul claro)
        6 => '#E0CCFF', // Sábado (morado claro)
    ];

    // Establecer el color de fondo según el día de la semana
    $color_fondo = $colores[$dia_semana];

    // Establecer la localización para español
    setlocale(LC_TIME, 'es_ES.UTF-8');
    ?>
</head>

<body style="background-color: <?php echo $color_fondo; ?>;">
    <div>
        <h3>1. Realiza fechactual.php que muestre la fecha actual de estas formas:</h3>
        <p>Domingo</p>
        <p>Domingo 03rd de Mayo 2024 08:22:51 PM</p>
        <p>Domingo, 03 de Mayo de 2024 08:22:51 PM</p>
        <p>Mayo 3, 2024, 8:22 pm</p>
        <p>03.05.24</p>
        <p>3, 5, 2024</p>
        <p>20240503</p>
        <p>Hoy es el 3rd día.</p>
        <p>Sun May 3 20:22:51 CEST 2024</p>
        <p>20:05:51 pm</p>
        <p>20:22:51</p>
        <br>
        <?php
        // Obtener la fecha actual
        $timestamp = time();

        // Formatos de fecha y hora
        echo strftime('%A') . "<br>"; // Día en español
        echo strftime('%A %d de %B de %Y %I:%M:%S %p', $timestamp) . "<br>";
        echo strftime('%A, %d de %B de %Y %I:%M:%S %p', $timestamp) . "<br>";
        echo strftime('%B %e, %Y, %I:%M %p', $timestamp) . "<br>";
        echo strftime('%d.%m.%y') . "<br>";
        echo strftime('%e, %n, %Y') . "<br>";
        echo strftime('%Y%m%d') . "<br>";
        echo "Hoy es el " . strftime('%e', $timestamp) . " día." . "<br>";
        echo strftime('%a %b %e %H:%M:%S %Z %Y', $timestamp) . "<br>";
        echo date('H:i:s a') . "<br>";
        echo date('H:i:s') . "<br>";
        ?>
    </div>
    <div>
        <h3>2. Realiza fechas.php en la que se muestre la fecha actual y la fecha dentro de una semana en el formato 2024-10-11. Muestra lo mismo pero en el formato:</h3>
        <p>"viernes, 11 de octubre de 2024. A las 18:35" (si es posible en español)</p>
        <br>
        <?php
        // Obtener la fecha actual
        $fecha_actual = date('Y-m-d');

        // Calcular la fecha dentro de una semana
        $fecha_futura = date('Y-m-d', strtotime('+1 week'));

        // Mostrar fechas en formato "viernes, 11 de octubre de 2024. A las 18:35"
        $fecha_actual_formato_es = strftime("%A, %d de %B de %Y. A las %H:%M", time());
        $fecha_futura_formato_es = strftime("%A, %d de %B de %Y. A las %H:%M", strtotime('+1 week'));

        echo "Fecha actual en español: " . ucfirst($fecha_actual_formato_es) . "<br>";
        echo "Fecha dentro de una semana en español: " . ucfirst($fecha_futura_formato_es) . "<br>";
        ?>
    </div>
    <div>
        <h3>3. Realiza checkdate.php que se compruebe si el año 2023 fue bisiesto y si lo fue el año 2022.</h3>
        <br>
        <?php
        // Función para comprobar si un año es bisiesto
        function es_bisiesto($year)
        {
            return checkdate(2, 29, $year);
        }
        // Comprobar si 2023 fue bisiesto
        if (es_bisiesto(2023)) {
            echo "El año 2023 fue bisiesto.<br>";
        } else {
            echo "El año 2023 no fue bisiesto.<br>";
        }
        // Comprobar si 2022 fue bisiesto
        if (es_bisiesto(2022)) {
            echo "El año 2022 fue bisiesto.<br>";
        } else {
            echo "El año 2022 no fue bisiesto.<br>";
        }
        ?>
    </div>
    <div>
        <h3>4. Realiza diassemana.php que escriba “Hoy es Viernes”</h3>
        <br>
        <?php
        // Obtener el día de la semana actual en español
        $dia_semana = strftime("%A");
        echo "Hoy es " . ucfirst($dia_semana) . ".";
        ?>
    </div>
    <div>
        <h3>5. Escribe una página php que muestre diferente bgcolor en función del día de la semana.</h3>
        <br>
        <h3>Hoy es <?php echo strftime('%A'); ?></h3>
        <p>El color de fondo cambia según el día de la semana.</p>
    </div>
    <div>
        <h3>6. Escribe una página php que guarde en una variable la fecha '1978-12-01 13:45:00' y muestre que día de la semana fue.</h3>
        <br>
        <?php
        $fecha_especifica = '1978-12-01 13:45:00';
        $día_de_la_semana = strftime('%A', strtotime($fecha_especifica)); // Obtiene el día de la semana
        echo "La fecha $fecha_especifica fue un $día_de_la_semana.<br>";
        ?>
    </div>
    <div>
        <h3>7. Escribe una página php que cuente cuántos días faltan para el 01 de noviembre de 2024</h3>
        <br>
        <?php
        $fecha_inicio = strtotime('2024-10-01');
        $fecha_fin = strtotime('2024-11-01');
        $hoy = time();

        $dif = $fecha_fin - $hoy; // Diferencia en segundos
        $días_restantes = ceil($dif / (60 * 60 * 24)); // Convertir a días

        echo "Oferta válida del 01 de octubre de 2024 al 01 de noviembre de 2024<br>";
        echo "Esta oferta es válida durante 1 mes, comenzó el 01/10/2024, finaliza en $días_restantes días, el 01/11/2024.<br>";
        ?>
    </div>
</body>

</html>
