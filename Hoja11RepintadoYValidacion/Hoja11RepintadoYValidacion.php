<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Subida de Noticias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 500px;
            border: 1px dashed #ccc;
            padding: 20px;
            margin: 0 auto;
        }

        h1 {
            color: #0066cc;
        }

        h2 {
            font-style: italic;
            font-size: 1.1em;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="file"] {
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #ccc;
            border: none;
            cursor: pointer;
        }

        .required {
            color: red;
        }

        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Subida de Noticias</h1>
        <h2>Insertar nueva noticia</h2>

        <?php
        $titulo = $_POST['titulo'] ?? '';
        $texto = $_POST['texto'] ?? '';
        $categorias = $_POST['categoria'] ?? [];
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validación del Título
            if (empty($titulo) || !preg_match('/^[A-Z]{15,25}$/', $titulo)) {
                $errors[] = "El título debe tener entre 15 y 25 caracteres en mayúsculas.";
            }

            // Validación del Texto
            if (empty($texto) || strlen($texto) < 50) {
                $errors[] = "El texto debe contener al menos 50 caracteres.";
            }

            // Validación de Categoría
            $categorias_validas = ['promociones', 'locales comerciales', 'nueva construcción', 'pisos', 'naves industriales', 'terrenos'];
            foreach ($categorias as $categoria) {
                if (!in_array($categoria, $categorias_validas)) {
                    $errors[] = "La categoría seleccionada no es válida.";
                    break;
                }
            }

            // Validación de Imágenes
            if (empty($_FILES['imagen']['name'][0])) {
                $errors[] = "Debe subir al menos una imagen.";
            } else {
                foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['imagen']['error'][$key] == 0 && !getimagesize($tmp_name)) {
                        $errors[] = "El archivo seleccionado no es una imagen válida.";
                        break;
                    }
                }
            }

            if (empty($errors)) {
                // Guardar imágenes en la carpeta 'img'
                $img_dir = 'img/';
                if (!file_exists($img_dir)) {
                    mkdir($img_dir, 0777, true);
                }

                foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
                    $filename = basename($_FILES['imagen']['name'][$key]);
                    move_uploaded_file($tmp_name, $img_dir . $filename);
                }

                echo "<p>Noticia subida correctamente.</p>";
                exit;
            }
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <?php if (!empty($errors)) : ?>
                <div class="error">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <label for="titulo">Título: <span class="required">*</span></label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" required>

            <label for="texto">Texto: <span class="required">*</span></label>
            <textarea id="texto" name="texto" rows="5" required><?php echo htmlspecialchars($texto); ?></textarea>

            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria[]" multiple>
                <option value="promociones" <?php echo in_array("promociones", $categorias) ? 'selected' : ''; ?>>Promociones</option>
                <option value="locales comerciales" <?php echo in_array("locales comerciales", $categorias) ? 'selected' : ''; ?>>Locales Comerciales</option>
                <option value="nueva construcción" <?php echo in_array("nueva construcción", $categorias) ? 'selected' : ''; ?>>Nueva Construcción</option>
                <option value="pisos" <?php echo in_array("pisos", $categorias) ? 'selected' : ''; ?>>Pisos</option>
                <option value="naves industriales" <?php echo in_array("naves industriales", $categorias) ? 'selected' : ''; ?>>Naves Industriales</option>
                <option value="terrenos" <?php echo in_array("terrenos", $categorias) ? 'selected' : ''; ?>>Terrenos</option>
            </select>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen[]" accept="image/*" multiple required>

            <input type="submit" value="Insertar noticia">
        </form>
    </div>

</body>

</html>