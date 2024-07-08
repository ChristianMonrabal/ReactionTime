<?php
require './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
    $stmt->bind_param('ss', $usuario, $password_hash);

    if ($stmt->execute()) {
        $message = 'Usuario registrado exitosamente.';
        header("Location: ../index.php");
        exit();
    } else {
        $message = 'Hubo un problema al registrar el usuario.';
    }

    $stmt->close();
    $conn->close();
}
?>