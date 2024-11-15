<?php
session_start(); // Iniciar la sesión

try {
    // Conectar a la base de datos usando PDO
    $mbd = new PDO('mysql:host=localhost;dbname=prueba1', 'prueba1', 'prueba1');
    $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $contrasena1 = password_hash('ContrasenaPrueba1', PASSWORD_DEFAULT);
    $contrasena2 = password_hash('ContrasenaPrueba2', PASSWORD_DEFAULT);
    $contrasena3 = password_hash('ContrasenaPrueba3', PASSWORD_DEFAULT);
    $contrasena4 = password_hash('ContrasenaPrueba4', PASSWORD_DEFAULT);


    $insercion1 = "INSERT INTO usuario (nombreUsuario, contrasena) VALUES ('ali.ramos', '$contrasena1')";
    $insercion2 = "INSERT INTO usuario (nombreUsuario, contrasena) VALUES ('ped.alia', '$contrasena2')";
    $insercion3 = "INSERT INTO usuario (nombreUsuario, contrasena) VALUES ('man.parido', '$contrasena3')";
    $insercion4 = "INSERT INTO usuario (nombreUsuario, contrasena) VALUES ('ele.martin', '$contrasena4')";


    $mbd->exec($insercion1);
    $mbd->exec($insercion2);
    $mbd->exec($insercion3);
    $mbd->exec($insercion4);

    echo "Usuarios insertados correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
