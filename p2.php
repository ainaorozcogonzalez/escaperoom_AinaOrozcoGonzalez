<?php
session_start();

define('ENCRYPTED_FOLDER_NAME', 'b3JkZW5hZG9y');

function decryptFolderName($encryptedName) {
    return strtr(base64_decode($encryptedName), '50io1249', 'aeiost');
}

// Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
if (!isset($_SESSION['loginOK'])) {
    header("Location: index.php?error=2");
    exit();
}

// Si se envió el formulario, comprobar el nombre de carpeta
if (isset($_POST['folder-name'])) {
    $folder_name = $_POST['folder-name'];
    // Desencriptar el nombre de carpeta utilizando base64_decode y strtr
    if (defined('ENCRYPTED_FOLDER_NAME') && !empty(ENCRYPTED_FOLDER_NAME)) {
        $decrypted_name = decryptFolderName(ENCRYPTED_FOLDER_NAME);
        if ($folder_name == $decrypted_name) {
            // Si el nombre de carpeta es correcto, redirigir al usuario a la siguiente página
            header("Location: p3.php");
            exit();
        } else {
            // Si el nombre de carpeta es incorrecto, mostrar un mensaje de error
            $error_message = "El nombre de carpeta no es correcto";
            // Aumentar el contador de intentos fallidos en la sesión
            $_SESSION['intentos'] = isset($_SESSION['intentos']) ? $_SESSION['intentos'] + 1 : 1;
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
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <div class="container">
    <h1>¿Ahora una carpeta? </h1>
    <h1>Encima tiene un nombre extraño.</h1>
    <h1>Intenta adivinar el nombre</h1>
    </br>
    <?php if (isset($pista)): ?>
      <p>Pista: <?php echo $pista; ?><p>
      </br>
    <?php else: ?>
      <p>Pista: Se trata de un cifrado por sustitución</p>
      </br>
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
  <script src="./js/script.js"></script>
</body>
</html>
<style type="text/css">
	body {
		background-image: url('./img/carpeta.jpg');
		background-size: cover;
	}
</style>
