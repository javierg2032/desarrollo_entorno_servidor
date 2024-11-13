<?php
session_start(); // Iniciar la sesión

$err = false; // Inicializar la variable de error
$vacio = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (!empty($usuario) && !empty($contrasena)) {
        // Conectar a la base de datos usando mysqli
        $conexion = new mysqli('localhost', 'prueba1', 'prueba1', 'prueba1');

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("¡Error en la conexión!: " . $conexion->connect_error);
        }

        // Preparar la consulta para evitar inyecciones SQL
        $sql = "SELECT * FROM usuario WHERE nombreUsuario = ? AND contrasena = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $usuario, $contrasena);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $resultado = $stmt->get_result();

        // Verificar si la consulta devuelve algún resultado
        if ($resultado->num_rows > 0) {
            // Si existe un usuario con esas credenciales
            $_SESSION['usuario'] = $usuario; // Guardar el usuario en la sesión
            header("Location: bienvenido.php"); // Redirigir a la página de bienvenida
            exit();
        } else {
            $err = true;  // Marcar el error si las credenciales son incorrectas
        }

        // Cerrar la conexión
        $stmt->close();
        $conexion->close();
    } else {
        $vacio = true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php if ($err) {
        echo "<p>Revise usuario y contraseña</p>";
    }
    if ($vacio) {
        echo "<p>Algún campo está vacío</p>";
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="usuario">Usuario</label>
        <input value="<?php if (isset($usuario)) echo htmlspecialchars($usuario); ?>" id="usuario" name="usuario" type="text">

        <label for="contrasena">Contraseña</label>
        <input id="contrasena" name="contrasena" type="password">

        <input type="submit">
    </form>
</body>

</html>