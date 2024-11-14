<?php
session_start(); // Iniciar la sesión
include 'Alumnos.php'; // Le asociamos el documento

try {
    // Conectar a la base de datos usando PDO
    $mbd = new PDO('mysql:host=localhost;dbname=prueba1', 'prueba1', 'prueba1');
    $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta de inserción
    $stmt = $mbd->query("SELECT * FROM alumno");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "Nombre: {$row["nombre"]} <br>";
        echo "Código de alumno: {$row["codAlumno"]} <br>";
        echo "DNI: {$row["dni"]} <br>";
        echo "Dirección: {$row["direccion"]} <br>";
        echo "Localidad: {$row["localidad"]} <br>";
        echo "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
