<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // TEXT
    if (isset($_POST['cadena'])) {
        $cadena = $_POST['cadena'];
        echo "<p>Cadena introducida: " . htmlspecialchars($cadena) . "</p>";
    }

    // RADIO
    if (isset($_POST['genero'])) {
        $genero = $_POST['genero'];
        echo "<p>Genero seleccionado: " . htmlspecialchars($genero) . "</p>";
    }

    // BUTTON
    if (isset($_POST['actualizar'])) {
        echo "<p>Se han actualizado los datos</p>";
    }

    // HIDDEN
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        echo "<p>Nombre de usuario oculto: " . htmlspecialchars($username) . "</p>";
    }

    // PASSWORD
    if (isset($_POST['clave'])) {
        $clave = $_POST['clave'];
        echo "<p>Contraseña ingresada: " . htmlspecialchars($clave) . "</p>";
    }

    // SUBMIT
    if (isset($_POST['enviar'])) {
        echo "<p>Se ha pulsado el botón de enviar</p>";
    }

    // SELECT simple
    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        echo "<p>Color seleccionado: " . htmlspecialchars($color) . "</p>";
    }

    // SELECT múltiple
    if (isset($_POST['idiomas'])) {
        $idiomas = $_POST['idiomas'];
        echo "<p>Idiomas seleccionados:</p>";
        foreach ($idiomas as $idioma) {
            echo htmlspecialchars($idioma) . "<br>\n";
        }
    }

    // CHECKBOX
    if (isset($_POST['extras'])) {
        $extras = $_POST['extras'];
        echo "<p>Extras seleccionados:</p>";
        foreach ($extras as $extra) {
            echo htmlspecialchars($extra) . "<br>\n";
        }
    }

    // TEXTAREA
    if (isset($_POST['comentario'])) {
        $comentario = $_POST['comentario'];
        echo "<p>Comentario recibido: " . htmlspecialchars($comentario) . "</p>";
    }
}
