<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirigir al login si no hay sesión
    exit();
}

echo "Bienvenid@ " . $_SESSION['usuario'];
?>

