<?php

//Estructura de password_hash:
//password_hash(string $password, integer $algo, array $options = ?): string

//Ejemplo #1 Ejemplo de password_hash()

//Queremos crear un hash de nuestra contraseña uando el algoritmo DEFAULT actual.
//Actualmente es BCRYPT, y producirá un resultado de 60 caracteres.
//Hay que tener en cuenta que DEFAULT puede cambiar con el tiempo, por lo que debería prepararse
//para permitir que el almacenamento se amplíe a más de 60 caracteres (255 estaría bien)*/

echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT) . "<br>";


//Ejemplo #2 Ejemplo de password_hash() estableciendo el coste manualmente

//En este caso, queremos aumentar el coste predeterminado de BCRYPT a 12.
//Observe que también cambiamos a BCRYPT, que tendrá siempre 60 caracteres.

$opciones = [
    'cost' => 12,
];
echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $opciones) . "<br>";

