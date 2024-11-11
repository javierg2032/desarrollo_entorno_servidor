<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=prueba1', 'prueba1', 'prueba1');

    // Preparar
    $stmt = $mbd->prepare("INSERT INTO alumno (codalumno, Nombre, Direccion, Localidad, DNI) 
                           VALUES (:codalumno, :Nombre, :Direccion, :Localidad, :DNI)");
    $stmt->bindParam(':codalumno', $codalumno);
    $stmt->bindParam(':Nombre', $nombre);
    $stmt->bindParam(':Direccion', $direccion);
    $stmt->bindParam(':Localidad', $localidad);
    $stmt->bindParam(':DNI', $dni);

    // Establecer parámetros y ejecutar
    /*$codalumno = "10";
    $nombre = "Manuel Trujillo";
    $direccion = "C/Ave de la isla";
    $localidad = "Madrid";
    $dni = "88888888H";
    $stmt->execute();

    $codalumno = "11";
    $nombre = "Belén Trujillo";
    $direccion = "C/Ave de la isla";
    $localidad = "Madrid";
    $dni = "99999999I";
    $stmt->execute();

    // Mensaje de éxito en la inserción
    echo "Se han creado las entradas exitosamente";*/



    //Los parámetros también pueden enlazarse sin utilizar bindParam(), directamente con un array en execute():


    // Establecer parámetros y ejecutar
    $codalumno = "10";
    $nombre = "Carlos Gómez";
    $direccion = "C/Gran Vía, 45";
    $localidad = "Barcelona";
    $dni = "10101010J";
    $stmt->execute(array(':codalumno' => $codalumno, ':Nombre' => $nombre, ':Direccion' => $direccion, ':Localidad' => $localidad, ':DNI' => $dni));

    $codalumno = "11";
    $nombre = "Ana Pérez";
    $direccion = "C/Príncipe, 12";
    $localidad = "Sevilla";
    $dni = "11111111K";
    $stmt->execute(array(':codalumno' => $codalumno, ':Nombre' => $nombre, ':Direccion' => $direccion, ':Localidad' => $localidad, ':DNI' => $dni));
    // Mensaje de éxito en la inserción
    echo "Se han creado las entradas exitosamente";





    foreach ($mbd->query('SELECT * from alumno') as $fila) {
        print_r($fila);
    }
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
