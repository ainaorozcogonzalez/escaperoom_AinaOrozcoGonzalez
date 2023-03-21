<?php
session_start();

// Redirige si el usuario no ha iniciado sesión
if (!isset($_SESSION['loginOK'])) {
  header("Location: index.php?error=2");
  exit();
}

// Verifica si el comando de apagado ha sido ingresado correctamente
if (isset($_POST['shutdown-command']) && $_POST['shutdown-command'] === 'shutdown') {
  // Si el comando es correcto, redirige a la siguiente página
  header("Location: p7.php");
  exit();
}

$errorMsg = '';
// Comprueba si se ha enviado un formulario y si el comando no es correcto
if (isset($_POST['shutdown-command']) && $_POST['shutdown-command'] !== 'shutdown') {
  $errorMsg = 'El comando de apagado es incorrecto';
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Escape Room - Dentro del Ordenador</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container">
        <div class='texto'>
            <h1>Parece que estamos en una consola de comandos.</h1>
            <h1>¡Introduce el comando para apagar el ordenador!</h1>
            </br>
            <p>¿Cuál es el comando que se utiliza para apagar el ordenador desde la consola de comandos?</p>
            </br>
            <form method="post">
            <label for="shutdown-command">Introduce el comando de apagado:</label>
            <br>
            <br>
            <input type="text" id="shutdown-command" name="shutdown-command">
            <button type="submit" id="submit">Comprobar</button>
            <?php if ($errorMsg !== ''): ?>
                <p class="error-message"><?php echo $errorMsg; ?></p>
            <?php endif; ?>
            </form>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
<style type="text/css">
	body {
		background-image: url('./img/cmd.jpg');
		background-size: cover;
	}
</style>
