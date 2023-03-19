<?php
session_start();

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['loginOK'])) {
    header("Location: index.php?error=2");
    exit();
}

// Definimos la pregunta y las opciones de respuesta
$pregunta = "¿Cuál es el nombre del personaje principal en el videojuego 'The Legend of Zelda'?";
$opcionA = "Mario";
$opcionB = "Sonic";
$opcionC = "Link";
$opcionD = "Kirby";
$respuestaCorrecta = "C";

// Comprobamos si el usuario ha enviado una respuesta
if (isset($_POST['respuesta'])) {
    $respuesta = $_POST['respuesta'];
    if ($respuesta == $respuestaCorrecta) {
        // Si la respuesta es correcta, redireccionamos a la siguiente página
        header("Location: p4.php");
        exit();
    } else {
        // Si la respuesta es incorrecta, mostramos una pista
        $pista = "El personaje lleva una espada legendaria llamada la Espada Maestra";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pregunta sobre videojuegos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
<h1>Pregunta sobre videojuegos</h1>
<form method="post">
    <p><?php echo $pregunta; ?></p>
    <input type="radio" name="respuesta" value="A" id="opcionA">
    <label for="opcionA"><?php echo $opcionA; ?></label><br>
    <input type="radio" name="respuesta" value="B" id="opcionB">
    <label for="opcionB"><?php echo $opcionB; ?></label><br>
    <input type="radio" name="respuesta" value="C" id="opcionC">
    <label for="opcionC"><?php echo $opcionC; ?></label><br>
    <input type="radio" name="respuesta" value="D" id="opcionD">
    <label for="opcionD"><?php echo $opcionD; ?></label><br>
    <button type="submit">Enviar respuesta</button>
</form>
</div>
<?php
// Si el usuario ha enviado una respuesta incorrecta, mostramos la pista
if (isset($pista)) {
    echo "<p>Pista: $pista</p>";
}
?>
<script src="script.js"></script>
</body>
</html>
<style type="text/css">
	body {
		background-image: url('./zelda.jpg');
		background-size: cover;
	}
</style>
