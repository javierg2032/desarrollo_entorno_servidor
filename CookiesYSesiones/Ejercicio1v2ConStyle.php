<?php
session_start(); // Crear una sesión 
$errores = ""; // Variable para concatenar los errores
$buscar_class = "";
$busqueda_class = "";
$genero_class = "";
$radio_class = ""; // Clase para los radio buttons

// Inicializar las variables
$buscar = "";
$busqueda = "";
$genero = "";

// Si va bien redirige a principal.php si va mal, mensaje de error 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : ""; // Mantener el valor de buscar
    $busqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : ""; // Mantener el valor del radio
    $genero = isset($_POST['genero']) ? $_POST['genero'] : ""; // Mantener el valor del select

    // Validar campos y añadir clases CSS para campos vacíos
    if (empty($buscar)) {
        $errores .= "<p>El texto a buscar está vacío</p>";
        $buscar_class = "error-input"; // Añadir clase de error
    }
    if (empty($busqueda)) {
        $errores .= "<p>La sección de búsqueda está vacía</p>";
        $radio_class = "error-input-radio"; // Añadir clase de error a los radios
    }
    if (empty($genero) || trim($genero) == "") {
        $errores .= "<p>No has seleccionado ningún género musical</p>";
        $genero_class = "error-input"; // Añadir clase de error
    }

    // Si no hay errores, procesar el formulario
    if (empty($errores)) {
        // Obtener los valores del formulario
        $_SESSION['buscar'] = $buscar;
        $_SESSION['busqueda'] = $busqueda;
        $_SESSION['genero'] = $genero;

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
    <style>
        .error {
            color: red;
            font-weight: bold;
        }

        .error-input {
            border: 2px solid red;
            background-color: #ffe6e6;
        }

        .error-input-radio {
            border: 2px solid red;
            padding: 10px;
            background-color: #ffe6e6;
            display: inline-block;
        }
    </style>
</head>

<body>
    <?php
    // Mostrar los errores concatenados, si los hay
    if (!empty($errores)) {
        echo "<div class='error'>$errores</div>";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h1 style="font-size:3em; color:blue">Formulario simple</h1>
        <p style="font-size:2em"><i>
                <n>Búsqueda de canciones</n>
            </i></p>
        <div>
            <div class="<?php echo $buscar_class; ?>">
                Texto a buscar:
                <input type="text" name='buscar' value="<?php echo htmlspecialchars($buscar); ?>">
            </div>
            <br><br>

            <div class="<?php echo $radio_class; ?>"> <!-- Contenedor para los radio buttons -->
                Buscar en:
                <input type="radio" name="busqueda" value="titulo" <?php if ($busqueda == "titulo") echo "checked"; ?>>Títulos de canción
                <input type="radio" name="busqueda" value="album" <?php if ($busqueda == "album") echo "checked"; ?>>Nombre de álbum
                <input type="radio" name="busqueda" value="ambos" <?php if ($busqueda == "ambos") echo "checked"; ?>>Ambos campos
            </div>

            <br><br>

            Género musical:
            <select name="genero" class="<?php echo $genero_class; ?>">
                <option value=" "></option>
                <option value="acustica" <?php if ($genero == "acustica") echo "selected"; ?>>Acústica</option>
                <option value="banda" <?php if ($genero == "banda") echo "selected"; ?>>Banda Sonora</option>
                <option value="blues" <?php if ($genero == "blues") echo "selected"; ?>>Blues</option>
                <option value="electronica" <?php if ($genero == "electronica") echo "selected"; ?>>Electrónica</option>
                <option value="folk" <?php if ($genero == "folk") echo "selected"; ?>>Folk</option>
                <option value="jazz" <?php if ($genero == "jazz") echo "selected"; ?>>Jazz</option>
                <option value="new" <?php if ($genero == "new") echo "selected"; ?>>New Age</option>
                <option value="pop" <?php if ($genero == "pop") echo "selected"; ?>>Pop</option>
                <option value="rock" <?php if ($genero == "rock") echo "selected"; ?>>Rock</option>
            </select>

            <br><br>

            <input type="submit" value="Buscar">
        </div>
    </form>
</body>

</html>
