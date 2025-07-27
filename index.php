<?php
include 'db.php';
session_start();

$result = $conn->query("SELECT * FROM productos LIMIT 10");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>New Radical</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>


<!-- NAVBAR COMPLETA -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand titulo-naranja fw-bold" href="#">NEW RADICAL</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContenido">
      <!-- Enlaces -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
        <li class="nav-item">
          <a class="nav-link active" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Categorías</a>
        </li>
      </ul>

      <!-- Buscador -->
      <form class="d-flex mx-auto" method="GET" action="buscar.php" style="max-width: 400px;">
        <input class="form-control me-2" type="search" name="q" placeholder="Buscar productos">
        <button class="btn btn-naranja" type="submit">Buscar</button>
      </form>

      <!-- Botones de usuario -->
      <div class="d-flex align-items-center">
        <a href="login.php" class="btn btn-outline-light me-3">Iniciar Sesión</a>
        <a href="registro.php" class="btn btn-outline-light me-2">Registrarse</a>
        <a href="carrito.php" class="btn btn-light position-relative">
          🛒
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            0
          </span>
        </a>
      </div>
    </div>
  </div>
</nav>

<!-- CONTENIDO PRINCIPAL -->
<div class="container mt-5">
    <h2 class="mb-4 titulo-naranja text-center">Productos disponibles</h2>

    <div class="row">
        <?php while($producto = $result->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow borde-negro">
                <div class="card-body">
                    <h5 class="card-title text-dark"><?php echo $producto['nombre']; ?></h5>
                    <p class="card-text">S/ <?php echo number_format($producto['precio'], 2); ?></p>
                    <button class="btn btn-naranja w-100">Agregar al carrito</button>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
