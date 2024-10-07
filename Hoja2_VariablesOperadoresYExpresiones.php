<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja 2. Variables, operadores y expresiones</title>
</head>
<body>
    <div>
        <H3>Ejemplo de operadores de comparacion en PHP</H3>
        <p>1. Indica la salida:</p>
        
        <?php 
            $a=8;
            $b=3;
            $C=3;
            $c=&$b;
            echo $a==$b,"<br>";
            echo $a!=$b,"<br>";
            echo $a<$b,"<br>";
            echo $a>$b,"<br>";
            echo $a>=$c,"<br>";
            echo $a<=$c,"<br>";
        ?>
    </div>

    <div>
        <H3>Ejemplo de operaciones logicas en PHP</H3>
        <p>2. Indica la salida:</p>
       
        <?php 
            $a=8;
            $b=3;
            $C=3;
            $c=&$b;
            echo ($a==$b) && ($c>$b),"<br>";
            echo ($a==$b) || ($b==$c),"<br>";
            echo !($b<=$c), "<br>";
        ?>
    </div>

    <div>
        <H3>Calculos, redondeo y formato</H3>
        <p>3. Indica la salida:</p>
        <?php
            /* Primero declaramos las variables */
            $precioneto = 101.98;
            $iva = 0.196;
            $resultado = $precioneto * $iva;
            echo "El precio es de ";
            echo $precioneto;
            echo " y el IVA el ";
            echo $iva;
            echo "% <br>";
            echo "Resultado: " ;
            echo round($resultado,2);
            echo " con ROUND() <br>";
            echo $resultado;
            echo " normal \n";
            echo "<br><br>";
            $resultado2= sprintf("%01.2f", $resultado);
            echo "Usando la funcion SPRINTF se ve asi: ";
            echo $resultado2
        ?>
    </div>

    <div>
        <p>4.1. La función RAND nos retorna un valor aleatorio entre un rango de dos enteros: $num = rand(1,100). Hacer un programa que almacene en la variable $num un valor entero generado en forma aleatoria entre 1 y 100 y lo muestre por pantalla. Mostrar además si es menor o igual a 50 o si es mayor. Utilizar para ello el operador condición ? acción1 : acción2 como estructura alternativa.</p>
        <?php
            
            $num = rand(1, 100);
            echo "Número generado: $num<br />";
            $resultado = ($num <= 50) ? "Es menor o igual a 50." : "Es mayor que 50.";
            echo $resultado;
            ?>
    </div>

    <div>
        <p>4.2. La función RAND nos retorna un valor aleatorio entre un rango de dos enteros: $num = rand(1,1000). Hacer un programa que almacene en la variable $num un valor entero generado en forma aleatoria entre 1 y 1000 y lo muestre por pantalla. Mostrar además si es menor o igual a 500 o si es mayor. Utilizar para ello el operador condición ? acción1 : acción2 como estructura alternativa.</p>
        <?php
            
            $num = rand(1, 1000);
            echo "Número generado: $num<br />";
            $resultado = ($num <= 500) ? "Es menor o igual a 500." : "Es mayor que 500.";
            echo $resultado;
            ?>
    </div>

    <div>
        <p>5. Completa el siguiente código:</p>
        <?php
            $var = "prueba";
            if (isset($var)) echo "La variable está definida.<br />";
            if (empty($var)) echo "La variable está vacía.<br />";
    
            unset($var);
    
            if (isset($var)) echo "La variable está definida.<br />";
            if (empty($var)) echo "La variable está vacía.<br />";
    
            $var = "foo";
    
            if ((bool) $var) echo "La variable es verdadera.<br />";
            if (!empty($var)) echo "La variable no está vacía.<br />";
    ?>
</div>

</body>
</html>