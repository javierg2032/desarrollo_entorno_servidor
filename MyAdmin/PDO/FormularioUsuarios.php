<?php
/* si va bien redirige a principal.php si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos con MySQLi
    $conn = new mysqli('localhost', 'prueba1', 'prueba1', 'prueba1'); // Usar los parámetros correctos

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Variable para saber si las credenciales son válidas
    $valida = false;

    // Preparar la consulta para evitar inyecciones SQL
    $sql = "SELECT * FROM usuario WHERE nombreUsuario = ? AND contrasena = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contrasena); // "ss" indica que ambos parámetros son cadenas (strings)

    // Ejecutar la consulta
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si la consulta devuelve algún resultado
    if ($resultado->num_rows > 0) {
        // Si existe un usuario con esas credenciales
        $valida = true;
    }

    // Redirigir dependiendo de si las credenciales son correctas o no
    if ($valida) {
        header("Location: bienvenido.php");
        exit();
    } else {
        $err = true;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php if (isset($err)) {
        echo "<p> Revise usuario y contraseña</p>";
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="usuario">Usuario</label>
        <input value="<?php if (isset($usuario)) echo $usuario; ?>"
            id="usuario" name="usuario" type="text">

        <label for="clave">Clave</label>
        <input id="clave" name="contrasena" type="password">

        <input type="submit">
    </form>
</body>

</html>
