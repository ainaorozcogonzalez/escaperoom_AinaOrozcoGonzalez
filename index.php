<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escape Room - Dentro del Ordenador</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <video autoplay muted loop>
      <source src="actualiza.mp4" type="video/mp4">
    </video>
    <div id="modal" class="modal">
      <div class="modal-content">
        <p id="text"></p>
        <form action="recepcion.php" method="post">
          <input type="text" id="nombre" name="nombre" required>
          <!-- Agregué el atributo "required" para asegurarme de que el usuario no deje el campo en blanco -->
          <button type="submit">Empezar a jugar</button>
        </form>
      </div>
    </div>

    <?php
    // En vez de utilizar ventanas emergentes, agregué un mensaje de error en un div oculto para mostrarlo con JavaScript cuando sea necesario
    if (isset($_GET['error'])) {
      $errorMessage = "";
      if ($_GET['error'] == 1) {
        $errorMessage = "No has introducido un nombre";
      } elseif ($_GET['error'] == 2) {
        $errorMessage = "No puedes ir sin iniciar sesion";
      }
      echo '<div id="error-message">' . $errorMessage . '</div>';
    }
    ?>

    <script src="script.js"></script>
  </body>
</html>
