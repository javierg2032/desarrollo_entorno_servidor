<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja 5 Arrays 2</title>
</head>

<body>
    <div>
        <h3>1. Dado el array:</h3>
        <p>$array = array(</p>
        <p>'k3' => 'JUAN',</p>
        <p> 'k5' => 'Álvaro',</p>
        <p> 'k0' => 'Maite',</p>
        <p> 'k2' => 'ÁLVARO',</p>
        <p>'k1' => 'Juan',</p>
        <p>'k4' => 'Martina');</p>
        <br>

        <?php
        $array = array(
            'k3' => 'JUAN',
            'k5' => 'Álvaro',
            'k0' => 'Maite',
            'k2' => 'ÁLVARO',
            'k1' => 'Juan',
            'k4' => 'Martina'
        );
        echo "<p>a) Ordenarlo por los valores de mayor a menor sin mantener las asociaciones clave-valor</p>";
        $valores = array_values($array);
        rsort($valores);
        print_r($valores);

        echo "<p>b) Ordenarlo por los valores de mayor a menor manteniendo las asociaciones</p>";
        arsort($array);
        print_r($array);

        echo "<p>c) Ordenarlo por las claves de menor a mayor</p>";
        ksort($array);
        print_r($array);

        echo "<p>d) Mezclar el array aleatoriamente</p>";
        $mezclado = $array;
        shuffle($mezclado);
        print_r($mezclado);

        echo "<p>e) Obtén un array con las claves de dos valores seleccionados aleatoriamente</p>";
        $claves = array_rand($array, 2);
        print_r($claves);

        echo "<p>f) Ordenarlo por los valores de mayor a menor sin diferenciar mayúsculas y minúsculas</p>";
        uasort($array, 'strcasecmp');
        print_r($array);
        ?>

    </div>
    <div>
    <h3>2. Realiza el mismo ejercicio anterior para el array:</h3>
        <p>$ciudades[5]='Madrid';</p>
        <p>$ciudades[7]='Oviedo';</p>
        <p>$ciudades[]='Cáceres';</p>
        <p>$ciudades[]='ALICANTE';</p>
        <p>$ciudades[]='Almería';</p>
        <p>$ciudades[]='Zaragoza';</p>
        <br>

    </div>
    <div>
        <h3>3. Ordena el siguiente array:</h3>
        <p>$array1=array("imagen12.png", "imagen10.png", "imagen2.png",
        "img1.png");</p>
        
    </div>
</body>

</html>