<?php
session_start();

// Redirige si el usuario no ha iniciado sesión
if (!isset($_SESSION['loginOK'])) {
  header("Location: index.php?error=2");
  exit();
}

// Verifica si la palabra secreta ha sido ingresada correctamente
if (isset($_POST['secret-word']) && $_POST['secret-word'] === 'cache') {
  // Si la palabra secreta es correcta, redirige a la siguiente página
  header("Location: p2.php");
  exit();
}

$errorMsg = '';
// Comprueba si se ha enviado un formulario y si la palabra secreta no es correcta
if (isset($_POST['secret-word']) && $_POST['secret-word'] !== 'cache') {
  $errorMsg = 'La palabra secreta es incorrecta';
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Escape Room - Dentro del Ordenador</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/styles.css">
  <style type="text/css">
    body {
      background-image: url('./img/txt.png');
      background-size: cover;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Parece que estamos en un documento de texto.</h1>
    <h1>¡Intenta introducir la respuesta!</h1>
    </br>
    <p>¿Cuál es la palabra que significa memoria temporal en informática y también se utiliza para almacenar datos en internet?</p>
    </br>
    <form method="post">
      <label for="secret-word">Introduce la palabra secreta:</label>
      <br>
      <br>
      <input type="text" id="secret-word" name="secret-word">
      <button type="submit" id="submit">Comprobar</button>
      <?php if ($errorMsg !== ''): ?>
        <p class="error-message"><?php echo $errorMsg; ?></p>
      <?php endif; ?>
    </form>
  </div>
  <script src="./js/script.js"></script>
</body>
</html>
