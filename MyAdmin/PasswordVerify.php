<?php

//Estructura de password_hash:
//password_verify(string $password, string $hash): bool

//Ejemplo #1 Ejemplo de password_verify()

// Ver el ejemplo de password_hash() para ver de dónde viene este hash.
$hash = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);

echo $hash . "<br>";

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}
