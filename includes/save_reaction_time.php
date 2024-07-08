<?php
session_start();
require 'conexion.php';

// Verificar si la solicitud es POST y si existe el parámetro 'tiempo'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tiempo'])) {
    // Obtener el tiempo de reacción enviado desde JavaScript
    $tiempo = $_POST['tiempo'];

    // Verificar si el usuario está logueado
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo "No autorizado";
        exit();
    }

    // Obtener el ID del usuario desde la sesión
    $usuario_id = $_SESSION['user_id'];

    // Insertar el tiempo de reacción en la base de datos
    $sql = "INSERT INTO tiempos (usuario_id, tiempo) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        http_response_code(500);
        echo "Error al preparar la consulta: " . $conn->error;
        exit();
    }
    
    $stmt->bind_param('ii', $usuario_id, $tiempo);
    
    if ($stmt->execute()) {
        http_response_code(200);
        echo "Tiempo de reacción guardado.";
    } else {
        http_response_code(500);
        echo "Error al guardar el tiempo de reacción: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(400);
    echo "Bad Request";
}
?>
