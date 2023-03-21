<?php
session_start();

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['loginOK'])) {
    header("location: index.php?error=2");
}

// Definimos la pregunta y las opciones de respuesta
$pregunta = "¿Qué lenguaje de programación se utiliza para desarrollar aplicaciones móviles nativas en iOS?";
$opcionA = "Java";
$opcionB = "C#";
$opcionC = "Swift";
$opcionD = "Python";
$respuestaCorrecta = "C";

// Comprobamos si el usuario ha enviado una respuesta
if (isset($_POST['respuesta'])) {
    $respuesta = $_POST['respuesta'];
    if ($respuesta == $respuestaCorrecta) {
        // Si la respuesta es correcta, redireccionamos a la siguiente página
        header("Location: p5.php");
        exit();
    } else {
        // Si la respuesta es incorrecta, mostramos una pista
        $pista = "Este lenguaje de programación fue desarrollado por Apple Inc. en 2014";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pregunta sobre programación</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<div class="container">
    <div class='texto'>
        <h1>¿Ahora un visual? ¡Esto debe ser una broma!</h1>
        </br>
        <form method="post">
            <p><?php echo $pregunta; ?></p>
            </br>
            <input type="radio" name="respuesta" value="A" id="opcionA">
            <label for="opcionA"><?php echo $opcionA; ?></label><br>
            <input type="radio" name="respuesta" value="B" id="opcionB">
            <label for="opcionB"><?php echo $opcionB; ?></label><br>
            <input type="radio" name="respuesta" value="C" id="opcionC">
            <label for="opcionC"><?php echo $opcionC; ?></label><br>
            <input type="radio" name="respuesta" value="D" id="opcionD">
            <label for="opcionD"><?php echo $opcionD; ?></label><br>
            </br>   
            <button type="submit">Enviar respuesta</button>
        </form>
    </div>
</div>
<?php
// Si el usuario ha enviado una respuesta incorrecta, mostramos la pista
if (isset($pista)) {
    echo "<p>Pista: $pista</p>";
}
?>
</body>
<script src="./js/script.js"></script>
</html>
<style type="text/css">
	body {
		background-image: url('./img/visual.jpg');
		background-size: cover;
	}
</style>
