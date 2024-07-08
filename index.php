<?php
session_start();
// Verificar si el usuario está loggeado
if (!isset($_SESSION['usuario'])) {
    header("Location: ./forms/signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reaction Time</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="./img/icon.jpeg" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Reaction Time</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="views/personal.php">Mis tiempos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="views/global.php">Tiempos globales</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <span class="nav-link"><?= htmlspecialchars($_SESSION['usuario']) ?></span>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./forms/signin.php">Iniciar sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container text-center d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="semaforo mb-4">
            <div class="light red" id="light1"></div>
            <div class="light red" id="light2"></div>
            <div class="light red" id="light3"></div>
            <div class="light red" id="light4"></div>
            <div class="light red" id="light5"></div>
        </div>
        <button id="reactionButton" class="btn btn-primary mb-2">Soltar embrague</button>
        <div id="result" class="mt-4"></div>
        <button id="resetButton" class="btn btn-secondary mb-2">Volver a jugar</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>
