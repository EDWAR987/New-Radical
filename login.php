<?php
session_start();
include 'db.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass  = $_POST['contraseña'];

    $sql = "SELECT * FROM clientes WHERE email = '$email'";
    $res = $conn->query($sql);

    if ($res->num_rows === 1) {
        $cliente = $res->fetch_assoc();

        if (password_verify($pass, $cliente['contraseña'])) {
            $_SESSION['cliente'] = $cliente;
            header("Location: dashboard.php");
            exit;
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "Correo no encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 mx-auto borde-negro" style="max-width: 400px;">
        <h2 class="text-center text-naranja mb-4">Iniciar Sesión</h2>

        <?php if ($mensaje): ?>
            <div class="alert alert-danger text-center">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input name="email" type="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input name="contraseña" type="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-naranja">Iniciar sesión</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

        <hr class="my-4">

        <div class="text-center">
            <p class="mb-2">O inicia sesión con:</p>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-dark">Google</button>
                <button class="btn btn-outline-primary">Facebook</button>
                <button class="btn btn-outline-secondary">Apple</button>
            </div>
        </div>

        <div class="mt-3 text-center">
            ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
