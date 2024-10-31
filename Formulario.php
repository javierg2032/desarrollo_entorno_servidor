<?php
session_start(); // Crear una sesión
$errores = ""; // Variable para concatenar los errores
$nombre_class = "";
$contraseña_class = "";
$color_class = ""; // Clase para los radio buttons
$genero_class = ""; // Clase para el select simple
$multiple_select_class = ""; // Clase para el select múltiple

// Inicializar variables
$nombre = "";
$contraseña = "";
$color = "";
$opcion1 = "";
$opcion2 = "";
$opcion3 = "";
$simple_select = "";
$multiple_select = [];
$oculto = "";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : "";
    $contraseña = isset($_POST['Contraseña']) ? $_POST['Contraseña'] : "";
    $color = isset($_POST['busqueda']) ? $_POST['busqueda'] : "";
    $opcion1 = isset($_POST['opcion1']) ? $_POST['opcion1'] : "";
    $opcion2 = isset($_POST['opcion2']) ? $_POST['opcion2'] : "";
    $opcion3 = isset($_POST['opcion3']) ? $_POST['opcion3'] : "";
    $simple_select = isset($_POST['simple_select']) ? $_POST['simple_select'] : "";
    $multiple_select = isset($_POST['multiple_select']) ? $_POST['multiple_select'] : [];
    $oculto = isset($_POST['Oculto']) ? $_POST['Oculto'] : "";

    // Validación de campos
    if (empty($nombre)) {
        $errores .= "<p>El campo Nombre está vacío</p>";
        $nombre_class = "error-input";
    }
    if (empty($contraseña)) {
        $errores .= "<p>El campo Contraseña está vacío</p>";
        $contraseña_class = "error-input";
    }
    if (empty($color)) {
        $errores .= "<p>El campo de selección de color está vacío</p>";
        $color_class = "error-input-radio";
    }
    if (empty($simple_select)) {
        $errores .= "<p>No has seleccionado el año de finalización</p>";
        $genero_class = "error-input";
    }
    if (empty($multiple_select)) {
        $errores .= "<p>No has seleccionado ninguna ciudad</p>";
        $multiple_select_class = "error-input";
    }

    // Si no hay errores, redirigir a una página ficticia
    if (empty($errores)) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['contraseña'] = $contraseña;
        $_SESSION['color'] = $color;
        $_SESSION['simple_select'] = $simple_select;
        $_SESSION['multiple_select'] = $multiple_select;

        header("Location: resultado.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Validación</title>
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
    if (!empty($errores)) {
        echo "<div class='error'>$errores</div>";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h1>Formulario con Validación</h1>
        <div class="<?php echo $nombre_class; ?>">
            Nombre:
            <input type="text" name='Nombre' value="<?php echo htmlspecialchars($nombre); ?>">
        </div>
        <br><br>
        <div class="<?php echo $contraseña_class; ?>">
            Contraseña:
            <input type="password" name='Contraseña' value="<?php echo htmlspecialchars($contraseña); ?>">
        </div>
        <br><br>

        <div class="<?php echo $color_class; ?>">
            Selección de color:
            <input type="radio" name="busqueda" value="Rojo" <?php if ($color == "Rojo") echo "checked"; ?>>Rojo
            <input type="radio" name="busqueda" value="Naranja" <?php if ($color == "Naranja") echo "checked"; ?>>Naranja
            <input type="radio" name="busqueda" value="Verde" <?php if ($color == "Verde") echo "checked"; ?>>Verde
        </div>
        <br>

        <div>
            <h3>Checkboxes:</h3>
            Quiero recibir publicidad por:
            <input type="checkbox" name="opcion1" value="Opción 1" <?php if ($opcion1) echo "checked"; ?>>Email
            <input type="checkbox" name="opcion2" value="Opción 2" <?php if ($opcion2) echo "checked"; ?>>SMS
            <input type="checkbox" name="opcion3" value="Opción 3" <?php if ($opcion3) echo "checked"; ?>>Teléfono
        </div>
        <br>

        <div>
            <h3>Selects:</h3>
            Año de finalización:
            <select name="simple_select" class="<?php echo $genero_class; ?>">
                <option value=""></option>
                <option value="Elemento 1" <?php if ($simple_select == "Elemento 1") echo "selected"; ?>>2024</option>
                <option value="Elemento 2" <?php if ($simple_select == "Elemento 2") echo "selected"; ?>>2025</option>
            </select>
            <br><br>
            Ciudades:
            <select name="multiple_select[]" multiple class="<?php echo $multiple_select_class; ?>">
                <option value="Elemento A" <?php if (in_array("Elemento A", $multiple_select)) echo "selected"; ?>>Gerona</option>
                <option value="Elemento B" <?php if (in_array("Elemento B", $multiple_select)) echo "selected"; ?>>Madrid</option>
                <option value="Elemento C" <?php if (in_array("Elemento C", $multiple_select)) echo "selected"; ?>>Zaragoza</option>
            </select>
        </div>
        <br>

        <input type="submit" value="Buscar">
    </form>
</body>

</html>
