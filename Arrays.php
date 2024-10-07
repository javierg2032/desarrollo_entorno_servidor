<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
<div>
    <?php 
        $arr1 = [
            0=>444,
            1=>222,
            2=>333,
        ];
        print_r($arr1);
        echo "<br>" . "pos 0: " . $arr1[0] . "<br>";

        $arr2 = array (
            "1111A" => "Juan Vera Ochoa",
            "1112A" => "María Mesa Cabeza",
            "1113A" => "Ana Puertas Peral"
        );
        foreach ($arr2 as $nombre){
            echo "$nombre <br>";
        }
        foreach ($arr2 as $codigo => $nombre){
            echo "Código: $codigo Nombre: $nombre <br>";
        }
    ?>

    <?php

    ?>
    </div>
</body>
</html>