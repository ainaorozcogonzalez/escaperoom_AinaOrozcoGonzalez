<?php
session_start();
// Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
if (!isset($_SESSION['loginOK'])) {
    header("Location: index.php?error=2");
    exit();
}

// Si se envió el formulario, comprobar el nombre de carpeta
if (isset($_POST['folder-name'])) {
    $folder_name = $_POST['folder-name'];
    // Desencriptar el nombre de carpeta utilizando base64_decode y strtr
    $decrypted_name = strtr(base64_decode('b3JkZW5hZG9y'), '50io1249', 'aeiost');
    if ($folder_name == $decrypted_name) {
        // Si el nombre de carpeta es correcto, redirigir al usuario a la siguiente página
        header("Location: p3.php");
        exit();
    } else {
        // Si el nombre de carpeta es incorrecto, mostrar un mensaje de error
        $error_message = "El nombre de carpeta no es correcto";
        // Aumentar el contador de intentos fallidos en la sesión
        if (isset($_SESSION['intentos'])) {
            $_SESSION['intentos']++;
        } else {
            $_SESSION['intentos'] = 1;
        }
    }
}

// Mostrar una pista adicional si el usuario ha fallado más de una vez
if (isset($_SESSION['intentos']) && $_SESSION['intentos'] > 1) {
    $pista = "El nombre de la carpeta está codificado en base64 y utiliza un cifrado por sustitución";
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
    <h1>Adivina el nombre de la carpeta para salir</h1>
    <?php if (isset($pista)): ?>
      <h3>Pista: <?php echo $pista; ?></h3>
    <?php else: ?>
      <h2>Pista: Se trata de un cifrado por sustitución</h2>
    <?php endif; ?>
    <form method="post">
      <label for="folder-name">Nombre de carpeta:</label>
      <input type="text" id="folder-name" name="folder-name">
      <button type="submit" id="submit">Comprobar</button>
      <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
      <?php endif; ?>
    </form>
  </div>
  <script src="script.js"></script>
</body>
</html>
<style type="text/css">
	body {
		background-image: url('./carpeta.jpg');
		background-size: cover;
	}
</style>
