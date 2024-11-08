<?php

$mysqli = new mysqli("localhost", "prueba1", "prueba1", "prueba1");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//Otra opción:
/*$mysqli = new mysqli("127.0.0.1", "prueba1", "prueba1", "prueba1");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}*/
echo $mysqli->host_info . "\n";


/*$query = "SELECT * FROM alumno WHERE nombre LIKE 'A%'";
$resultado = $mysqli->query($query) or die($mysqli->error . " en la linea " . (__LINE__ - 1));
$numregistros = $resultado->num_rows;
echo "<p>El número de alumnos cuyo nombre empieza por la letra A es: ", $numregistros, ".</p>";

echo "<table border=2><tr><th>NIF</th> <th>Nombre</th> <th>DNI</th> <th>Dirección</th> <th>Localidad</th></tr>";
while ($registro = $resultado->fetch_assoc()) {
    echo "<tr>";
    foreach ($registro as $campo)
        echo "<td>", $campo, "</td>";
    echo "</tr>";
}
echo "</table>";*/

/*$query = "INSERT INTO `alumno`(`codAlumno`, `nombre`, `dni`, `direccion`, `localidad`) VALUES (4,'Elena Martín','DDDDDDDD4','C/Mediterraneo','Valencia')";
if ($mysqli->query($query) === TRUE) {
    echo "Nuevo registro insertado correctamente.<br>";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error . "<br>";
}

$query = "UPDATE `alumno` SET `localidad` = 'Alicante' WHERE `codAlumno` = 4 AND `localidad`=`Valencia`";
if ($mysqli->query($query) === TRUE) {
    echo "Nuevo registro insertado correctamente.<br>";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error . "<br>";
}*/

$query = "SELECT * FROM alumno";
$resultado = $mysqli->query($query) or die($mysqli->error . " en la linea " . (__LINE__ - 1));
echo "<table border=2><tr><th>NIF</th> <th>Nombre</th> <th>DNI</th> <th>Dirección</th> <th>Localidad</th></tr>";
while ($registro = $resultado->fetch_assoc()) {
    echo "<tr>";
    foreach ($registro as $campo)
        echo "<td>", $campo, "</td>";
    echo "</tr>";
}
echo "</table>";



$stmt = $mysqli->prepare("INSERT INTO alumno (codalumno, Nombre, Direccion,Localidad,DNI) VALUES (?,?,?,?,?)");
$stmt->bind_param('issss', $codalumno, $Nombre, $Direccion, $Localidad, $DNI);
// Establecer parámetros y ejecutar
$codalumno = 7;
$Nombre = "Erik";
$Direccion = "C/Tomasa 12";
$Localidad = "Sevilla";
$DNI = "53312579K";
$stmt->execute();
$codalumno = 8;
$Nombre = "Pedro";
$Direccion = "C/Asturias 9";
$Localidad = "Arriondas";
$DNI = "45712689Ñ";
$stmt->execute();
// Mensaje de éxito en la inserción
echo "Se han creado las entradas exitosamente";





// Cerrar conexiones
$stmt->close();
$resultado->free();
$mysqli->close();
