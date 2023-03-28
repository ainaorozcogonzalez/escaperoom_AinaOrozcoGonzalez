<?php
session_start();
// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['loginOK'])) {
    header("Location: index.php?error=2");
    exit();
}

// Definimos la pregunta y las opciones de respuesta
$pregunta = "¿Cuál es el nombre del personaje principal en el videojuego 'The Legend of Zelda'?";
$opciones = array(
    'A' => 'Mario',
    'B' => 'Sonic',
    'C' => 'Link',
    'D' => 'Kirby'
);
$respuestaCorrecta = 'C';

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
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<div class="container">
    <!-- <div class="texto"> -->
        <h1>Ahora estamos atrapados dentro de un juego,</h1>
        <h1>parece el 'The Legend of Zelda',</h1>
        <h1>responde la pregunta para poder salir</h1>
        </br>
        <form method="post">
            <p><?php echo $pregunta; ?></p>
            </br>
            </br>
            <?php foreach ($opciones as $clave => $opcion) { ?>
                <input type="radio" name="respuesta" value="<?php echo $clave; ?>" id="opcion<?php echo $clave; ?>">
                <label for="opcion<?php echo $clave; ?>"><?php echo $opcion; ?></label><br>
            <?php } ?>
            </br>
            <button type="submit" id="submit">Enviar respuesta</button>
        </form>
    </div>
</div>
<?php
// Si el usuario ha enviado una respuesta incorrecta, mostramos la pista
if (isset($pista)) {
    echo "<p>Pista: $pista</p>";
}
?>
<script src="./js/script.js"></script>
</body>
</html>
<style type="text/css">
	body {
		background-image: url('./img/zelda.jpg');
		background-size: cover;
	}
</style>