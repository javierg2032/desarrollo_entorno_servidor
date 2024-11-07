<?php
/* Encontrar un patrón al principio de un string
Si queremos comprobar si un string empieza con unos caracteres concretos, 
podemos hacerlo de la siguiente forma:
*/

$direccion = "Calle Cuéllar";
if (preg_match("/^Calle/", $direccion)) {
    echo "Es una calle";
} else {
    echo "No es una calle";
}

/* En este caso, la regex busca el patrón "Calle" al principio de la cadena. 
La barra oblicua (/) delimita el patrón y el signo de intercalación (^) indica 
que la coincidencia debe estar al principio del string. */

/* Coinciden porque ambas empiezan con "Calle", pero si la "C" fuera minúscula, 
la búsqueda no funcionaría. Para hacerla insensible a mayúsculas y minúsculas, 
se puede usar el modificador 'i', que se coloca al final de la expresión regular. */

$direccion = "Calle Cuéllar";
if (preg_match("/^calle/i", $direccion)) {
    echo "Es una calle";
} else {
    echo "No es una calle";
}

/* Encontrar un patrón al final de un string
Se hace de forma similar a encontrar un patrón al principio de un string. 
En lugar de usar ^ se usa el símbolo de dólar $ al final:*/

$cadena = "Esto es un saludo: hola";
echo preg_match("/hola$/", $cadena); // Devuelve: 1

/* Usar ^ y $ o \A y \Z para indicar el inicio y final de un string 
Si se trabaja con un string con múltiples líneas (primera línea\nsegunda línea) 
y se quiere saber si el patrón coincide en el principio y el final de éstas, 
se pueden utilizar los símbolos ^ y $ para indicar, respectivamente, 
el principio y el final de cada línea de un string. Para ello es necesario utilizar 
también el modificador de patrón m:*/

$direccion = "Calle Cuéllar\nCalle Augusta";
// preg_match_all devuelve el número de matches
// Hemos incluido dos modificadores de patrón, i y m:
echo preg_match_all("/^calle/im", $direccion); // Devuelve: 2

/* Si no importan las líneas dentro de un string y se quiere saber exactamente el 
principio y el final de un string sin importar saltos de línea se usan \A y \Z:*/

$texto = "esto\nes\ntexto\nmultilinea\nlinea";
// Da igual que se incluya el modificador multilínea con \A y \Z:
echo preg_match_all('/linea\Z/im', $texto); // Devuelve: 1
echo preg_match_all('/linea$/im', $texto); // Devuelve: 2
echo preg_match_all('/\Aes/im', $texto); // Devuelve: 1
echo preg_match_all('/^es/im', $texto); // Devuelve: 2
