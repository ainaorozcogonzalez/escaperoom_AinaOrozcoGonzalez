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
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container">
        <h1>¡Felicidades, has salido del ordenador!</h1>
        </br>
        <p>Enhorabuena, has conseguido escapar del ordenador y completar nuestro escape room. </p>
        <p>Esperamos que hayas disfrutado de la experiencia y hayas aprendido algo nuevo sobre la informática. </p>
        <p>¡Gracias por jugar!</p>
        </br>
        <button onclick="window.location.href='index.php'">Volver al inicio</button>
        <?php
        session_destroy();
        ?>
    </div>
</body>
<script src="./js/script.js"></script>
</html>
<style type="text/css">
	body {
		background-image: url('./img/apagado.jpg');
		background-size: cover;
	}
</style>
