<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reaction Time</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container text-center d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="semaforo mb-4">
            <div class="light red" id="light1"></div>
            <div class="light red" id="light2"></div>
            <div class="light red" id="light3"></div>
            <div class="light red" id="light4"></div>
            <div class="light red" id="light5"></div>
        </div>
        <button id="reactionButton" class="btn btn-primary mb-2">Soltar embrague</button>
        <button id="resetButton" class="btn btn-secondary mb-2" style="display: none;">Volver a jugar</button>
        <div id="result" class="mt-4"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>
