<?php
session_start(); // Crear una sesión 
$errores = ""; // Variable para concatenar los errores

// Si va bien redirige a principal.php si va mal, mensaje de error 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se debe hacer un análisis de todos los campos que están dentro del formulario
    if (empty($_POST['buscar'])) {
        $errores .= "<p>El texto a buscar está vacío</p>";
    }
    if (empty($_POST['busqueda'])) {
        $errores .= "<p>La sección de búsqueda está vacía</p>";
    }
    if (empty($_POST['genero'])) {
        $errores .= "<p>No has seleccionado ningún género musical</p>";
    }

    // Si no hay errores, procesar el formulario
    if (empty($errores)) {
        // Obtener los valores del formulario
        $_SESSION['buscar'] = $_POST['buscar'];
        $_SESSION['busqueda'] = $_POST['busqueda'];
        $_SESSION['genero'] = $_POST['genero'];

        header("Location: Resultado.php?valor1={$_SESSION['buscar']}&valor2={$_SESSION['busqueda']}&valor3={$_SESSION['genero']}");
        exit(); // Es importante usar exit después de redirigir
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulario simple</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    // Mostrar los errores concatenados, si los hay
    if (!empty($errores)) {
        echo $errores;
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h1 style="font-size:3em; color:blue">Formulario simple</h1>
        <p style="font-size:2em"><i>
                <n>Búsqueda de canciones</n>
            </i></p>
        <div>
            Texto a buscar:
            <input type="text" name='buscar'>

            <br><br>

            Buscar en:
            <input type="radio" name="busqueda" value="titulo">Títulos de canción
            <input type="radio" name="busqueda" value="album">Nombre de álbum
            <input type="radio" name="busqueda" value="ambos">Ambos campos

            <br><br>

            Género musical:
            <select name="genero">
                <option value=" "></option>
                <option value="acustica">Acústica</option>
                <option value="banda">Banda Sonora</option>
                <option value="blues">Blues</option>
                <option value="electronica">Electrónica</option>
                <option value="folk">Folk</option>
                <option value="jazz">Jazz</option>
                <option value="new">New Age</option>
                <option value="pop">Pop</option>
                <option value="rock">Rock</option>
            </select>

            <br><br>

            <input type="submit" value="Buscar">
        </div>
    </form>
</body>

</html>
