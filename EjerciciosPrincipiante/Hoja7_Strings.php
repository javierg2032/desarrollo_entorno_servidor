<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja 7 Strings</title>
</head>

<body>
    <div>
        <h2>A partir de las variables:</h2>

        <p>$cad="defjvb/n"</p>
        <p>$cad1= " fp.informatica.iessanjuandelacruz@educa.madrid.org "</p>
        <p>$cad2= "educa.madrid.org"</p>
        <p>$cad3="defghijk/n"</p>
        <p>$cad4="defghi"</p>
        <p>$cad5= 'path=["\usr\$usuario"]|\usr'</p>
        <p>$cad6= "C/ Claveles 23,20D,28033,Madrid"</p>
        <p>$cad7=" juan rodríguez Hernández"</p>
        <p>$long=15</p>
        <p>$car1='.'</p>
        <p>$car2='*'</p>
        <br>

        <h3>Indica la salida de las siguientes funciones o realiza los scripts que se indiqu</h3>

        <p>1. addslashes($cad5)</p>
        <?php
        $cad = "defjvb/n";
        $cad1 = " fp.informatica.iessanjuandelacruz@educa.madrid.org ";
        $cad2 = "educa.madrid.org";
        $cad3 = "defghijk/n";
        $cad4 = "defghi";
        $cad5 = 'path=["\usr\$usuario"]|\usr';
        $cad6 = "C/ Claveles 23,20D,28033,Madrid";
        $cad7 = " juan rodríguez Hernández";
        $long = 15;
        $car1 = '.';
        $car2 = '*';

        echo addslashes($cad5);
        ?>
        <p>2. quotemeta($cad3)</p>
        <?php

        ?>
        <p>3. trim($cad1)
        </p>
        <?php

        ?>
        <p>4. chop($cad3)
        </p>
        <?php

        ?>
        <p>5. chr(45)</p>
        <?php

        ?>
        <p>6. strlen($cad6)</p>
        <?php

        ?>
        <p>7. strchr($cad1,$car1)</p>
        <?php

        ?>
        <p>8. str_pad($cad4,$long,$car1,STR_PAD_RIGHT)</p>
        <?php

        ?>
        <p>str_pad($cad3,-2,$car2,STR_PAD_BOTH)</p>
        <?php

        ?>
    </div>
</body>

</html>