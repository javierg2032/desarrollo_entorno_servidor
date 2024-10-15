<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .section-container {
            background-color: lightcoral;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 0;
        }

        label, input, select, textarea {
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"], input[type="button"] {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <div class="section-container">
            <h2>TEXT</h2>
            <label>Introduzca la cadena a buscar:</label>
            <input type="text" name="cadena" value="valor por defecto" size="20">
            <?php
            if (isset($_REQUEST['cadena'])) {
                $cadena = $_REQUEST['cadena'];
                echo "<p>Cadena introducida: " . htmlspecialchars($cadena) . "</p>";
            }
            ?>
        </div>

        <div class="section-container">
            <h2>RADIO</h2>
            <label>Genero:</label>
            Hombre<input type="radio" name="genero" value="H">
            Mujer<input type="radio" name="genero" value="M">
            Otro<input type="radio" name="genero" value="O">
            <?php
            if (isset($_REQUEST['genero'])) {
                $genero = $_REQUEST['genero'];
                echo "<p>Genero seleccionado: " . htmlspecialchars($genero) . "</p>";
            }
            ?>
        </div>

        <div class="section-container">
            <h2>BUTTON</h2>
            <input type="submit" name="actualizar" value="Actualizar datos">
            <?php
            if (isset($_REQUEST['actualizar'])) {
                echo "<p>Se han actualizado los datos</p>";
            }
            ?>
        </div>

        <div class="section-container">
            <h2>HIDDEN</h2>
            <input type="hidden" name="username" value="usuario_defecto">
            <?php
            if (isset($_REQUEST['username'])) {
                $username = $_REQUEST['username'];
                echo "<p>Nombre de usuario oculto: " . htmlspecialchars($username) . "</p>";
            }
            ?>
        </div>

        <div class="section-container">
            <h2>PASSWORD</h2>
            <label>Contraseña:</label>
            <input type="password" name="clave">
            <?php
            if (isset($_REQUEST['clave'])) {
                $clave = $_REQUEST['clave'];
                echo "<p>Contraseña ingresada: " . htmlspecialchars($clave) . "</p>";
            }
            ?>
        </div>

        <div class="section-container">
            <h2>SUBMIT</h2>
            <input type="submit" name="enviar" value="Enviar datos">
            <?php
            if (isset($_REQUEST['enviar'])) {
                echo "<p>Se ha pulsado el botón de enviar</p>";
            }
            ?>
        </div>

        <div class="section-container">
            <h2>SELECT simple</h2>
            <label>Color:</label>
            <select name="color">
                <option value="rojo" selected>Rojo</option>
                <option value="verde">Verde</option>
                <option value="azul">Azul</option>
            </select>
            <?php
            if (isset($_REQUEST['color'])) {
                $color = $_REQUEST['color'];
                echo "<p>Color seleccionado: " . htmlspecialchars($color) . "</p>";
            }
            ?>
        </div>

        <div class="section-container">
            <h2>SELECT múltiple</h2>
            <label>Idiomas:</label>
            <select multiple size="3" name="idiomas[]">
                <option value="ingles" selected>Inglés</option>
                <option value="frances">Francés</option>
                <option value="aleman">Alemán</option>
                <option value="holandes">Holandés</option>
            </select>
            <?php
            if (isset($_REQUEST['idiomas'])) {
                $idiomas = $_REQUEST['idiomas'];
                echo "<p>Idiomas seleccionados:</p>";
                foreach ($idiomas as $idioma) {
                    echo htmlspecialchars($idioma) . "<br>\n";
                }
            }
            ?>
        </div>

        <div class="section-container">
            <h2>CHECKBOX</h2>
            <label>Extras:</label>
            <input type="checkbox" name="extras[]" value="garaje" checked>Garaje
            <input type="checkbox" name="extras[]" value="piscina">Piscina
            <input type="checkbox" name="extras[]" value="jardin">Jardín
            <?php
            if (isset($_REQUEST['extras'])) {
                $extras = $_REQUEST['extras'];
                echo "<p>Extras seleccionados:</p>";
                foreach ($extras as $extra) {
                    echo htmlspecialchars($extra) . "<br>\n";
                }
            }
            ?>
        </div>

        <div class="section-container">
            <h2>TEXTAREA</h2>
            <label>Comentario:</label>
            <textarea cols="50" rows="4" name="comentario">Este libro me parece ...</textarea>
            <?php
            if (isset($_REQUEST['comentario'])) {
                $comentario = $_REQUEST['comentario'];
                echo "<p>Comentario recibido: " . htmlspecialchars($comentario) . "</p>";
            }
            ?>
        </div>

        <input type="submit" value="Enviar formulario">
    </form>
</body>

</html>
