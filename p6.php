<?php
session_start();

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['loginOK'])) {
    header("location: index.php?error=2");
}

// Definimos la pregunta y las opciones de respuesta
$pregunta = "¿Qué lenguaje de programación se utiliza para desarrollar aplicaciones web del lado del servidor?";
$opcionA = "Java";
$opcionB = "C++";
$opcionC = "Python";
$opcionD = "PHP";
$respuestaCorrecta = "D";

// Comprobamos si el usuario ha enviado una respuesta
if (isset($_POST['respuesta'])) {
    $respuesta = $_POST['respuesta'];
    if ($respuesta == $respuestaCorrecta) {
        // Si la respuesta es correcta, redireccionamos a la siguiente página
        header("Location: p7.php");
        exit();
    } else {
        // Si la respuesta es incorrecta, mostramos una pista
        $pista = "Es un acrónimo que significa 'Hypertext Preprocessor'";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pregunta sobre programación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <!-- <div class='texto'> -->
        <h1>Pregunta sobre programación</h1>
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
</div>
<?php
// Si el usuario ha enviado una respuesta incorrecta, mostramos la pista
if (isset($pista)) {
    echo "<p>Pista: $pista</p>";
}
?>
</body>
<script src="script.js"></script>
</html>
