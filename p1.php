<?php
// INICIAMOS SESION
session_start();
if (!isset($_SESSION['loginOK'])) {
    header("location: index.php?error=2");
    exit();
}

// Verifica si la palabra secreta ha sido ingresada correctamente
if (isset($_POST['secret-word']) && $_POST['secret-word'] === 'cache') {
  // Si la palabra secreta es correcta, redirige a la siguiente página
  header("Location: p2.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Escape Room - Dentro del Ordenador</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Introduce la adivinanza para poder salir del documento de texto:</h1>
    <p>¿Cuál es la palabra que significa memoria temporal en informática y también se utiliza para almacenar datos en internet?</p>
    <form method="post">
      <label for="secret-word">Introduce la palabra secreta:</label>
      <br>
      <br>
      <input type="text" id="secret-word" name="secret-word">
      <button type="submit" id="submit">Comprobar</button>
    </form>
  </div>
  <script src="script.js"></script>
</body>
</html>

<style type="text/css">
	body {
		background-image: url('./txt.png');
		background-size: cover;
	}
</style>
