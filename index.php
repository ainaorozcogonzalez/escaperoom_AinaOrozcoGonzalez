<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escape Room - Dentro del Ordenador</title>
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body>
    <video autoplay muted loop>
      <source src="video/actualiza.mp4" type="video/mp4">
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
    if (isset($_GET['error']) && $_GET['error'] == 1) {
      echo'<script type="text/javascript">
      alert("No continuar sin introducir tu nombre");
      window.location.href="index.php";
      </script>';
    }
    if (isset($_GET['error']) && $_GET['error'] == 2) {
      echo'<script type="text/javascript">
      alert("No puedes ir sin iniciar sesion");
      window.location.href="index.php";
      </script>';
    }
    ?>

    <script src="./js/script.js"></script>
  </body>
</html>
