<?php
include 'db.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre    = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $email     = $_POST['email'];
    $pass      = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $telefono  = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO clientes (nombre, apellido, email, contraseña, telefono, direccion)
            VALUES ('$nombre', '$apellido', '$email', '$pass', '$telefono', '$direccion')";

    if ($conn->query($sql)) {
        $mensaje = "<div class='alert alert-success text-center'>Registro exitoso. <a href='login.php'>Inicia sesión aquí</a></div>";
    } else {
        $mensaje = "<div class='alert alert-danger text-center'>Error: " . $conn->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 mx-auto borde-negro" style="max-width: 500px;">
        <h2 class="text-center mb-4 titulo-naranja">Crear cuenta</h2>

        <!-- Mensaje -->
        <?php if ($mensaje): ?>
            <?php echo $mensaje; ?>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input name="apellido" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input name="email" type="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input name="contraseña" type="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input name="telefono" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input name="direccion" class="form-control">
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-naranja w-50 me-2">Registrarse</button>
                <a href="index.php" class="btn btn-outline-dark w-50">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
