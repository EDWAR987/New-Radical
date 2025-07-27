<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión Cerrada</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 mx-auto text-center borde-negro" style="max-width: 500px;">
        <h2 class="titulo-naranja mb-3">Sesión cerrada</h2>
        <p class="mb-4">Has cerrado sesión correctamente.</p>
        <a href="index.php" class="btn btn-naranja">Volver al inicio</a>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
