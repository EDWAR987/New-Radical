<?php
session_start();
if (!isset($_SESSION['cliente'])) {
    header("Location: login.php");
    exit;
}
$cliente = $_SESSION['cliente'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Cliente</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css"> <!-- Tus estilos personalizados -->
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">NEW RADICAL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Categorías</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Mi cuenta</a></li>
            </ul>
            <span class="navbar-text me-3">Hola, <?php echo $cliente['nombre']; ?> 👋</span>
            <a href="carrito.php" class="btn btn-carrito me-2">🛒 Carrito</a>
            <a href="logout.php" class="btn btn-outline-light">Cerrar sesión</a>
        </div>
    </div>
</nav>

<!-- CONTENIDO PRINCIPAL -->
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">Bienvenido a tu panel, <?php echo $cliente['nombre']; ?>!</h1>
        <p class="lead">Desde aquí podrás ver tus productos, acceder al carrito y explorar nuestras categorías.</p>
        <a href="index.php" class="btn btn-primary mt-3">Explorar Productos</a>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
