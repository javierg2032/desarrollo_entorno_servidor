<?php
session_start(); // Iniciar la sesión

$err = false; // Inicializar la variable de error
$vacio = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (!empty($usuario) && !empty($contrasena)) {
        // Conectar a la base de datos usando PDO con try-catch
        try {
            $mbd = new PDO('mysql:host=localhost;dbname=prueba1', 'prueba1', 'prueba1');
            // Establecer el modo de error de PDO
            $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Si hay un error en la conexión, muestra el mensaje y termina el script
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        // Construir la consulta sin sentencias preparadas
        $sql = "SELECT * FROM usuario WHERE nombreUsuario = '$usuario' AND contrasena = '$contrasena'";

        // Ejecutar la consulta
        $result = $mbd->query($sql);

        // Verificar si la consulta devuelve algún resultado
        if ($result && $result->rowCount() > 0) {
            // Si existe un usuario con esas credenciales
            $_SESSION['usuario'] = $usuario; // Guardar el usuario en la sesión
            header("Location: bienvenido.php"); // Redirigir a la página de bienvenida
            exit();
        } else {
            $err = true;  // Marcar el error si las credenciales son incorrectas
        }

        // Cerrar la conexión
        $mbd = null;
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