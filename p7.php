<?php
// INICIAMOS SESION
session_start();
if (!isset($_SESSION['loginOK'])) {
    header("location: index.php?error=2");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Escape Room - ¡Felicidades, has salido del ordenador!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>¡Felicidades, has salido del ordenador!</h1>
    <p>Enhorabuena, has conseguido escapar del ordenador y completar nuestro escape room. Esperamos que hayas disfrutado de la experiencia y hayas aprendido algo nuevo sobre la informática. ¡Gracias por jugar!</p>
    <button onclick="window.location.href='index.php'">Volver al inicio</button>
</body>
</html>
