<?php
session_start(); //Crear una sesión 
$err1 = false;
$err2 = false;
$err3 = false;
//Si va bien redirige a principal.php si va mal, mensaje de error 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Se debe hacer un analisis de todos los campos que estan dentro del formulario
    if (empty($_POST['buscar'])) {
        $err1 = true;
    }
    if (empty($_POST['busqueda'])) {
        $err2 = true;
    }
    if (empty($_POST['genero'])) {
        $err3 = true;
    }
    if (!$err1 && !$err2 && !$err3) {

        //Obtener los valores del formulario
        $_SESSION['buscar'] = $_POST['buscar'];
        $_SESSION['busqueda'] = $_POST['busqueda'];
        $_SESSION['genero'] = $_POST['genero'];

        /*$buscar = $_POST['buscar'];
        $busqueda = $_POST['busqueda'];
        $genero = $_POST['genero'];*/

        header("Location: Resultado.php?valor1=$buscar&valor2=$busqueda&valor3=$genero");
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
    if (isset($err1)) {
        echo "<p>El texto a buscar está vacío</p>";
    }
    if (isset($err2)) {
        echo "<p>La sección de busqueda está vacía</p>";
    }
    if (isset($err3)) {
        echo "<p>No has seleccionado ningún género musical</p>";
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