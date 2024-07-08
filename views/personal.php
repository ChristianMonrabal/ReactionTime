<?php
session_start();
require '../includes/conexion.php';

// Verificar si el usuario está loggeado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../forms/signin.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];

// Consultar los 10 mejores tiempos del usuario
$sql = "SELECT tiempos.tiempo, tiempos.fecha 
        FROM tiempos 
        INNER JOIN usuarios ON tiempos.usuario_id = usuarios.id 
        WHERE usuarios.id = ? 
        ORDER BY tiempos.tiempo ASC 
        LIMIT 10";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis mejores tiempos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Reaction Time</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="personal.php">Mis tiempos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="global.php">Tiempos globales</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <span class="nav-link"><?= htmlspecialchars($_SESSION['usuario']) ?></span>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../forms/signin.php">Iniciar sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Mis mejores tiempos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tiempo (ms)</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['tiempo']) ?></td>
                        <td><?= htmlspecialchars($row['fecha']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
