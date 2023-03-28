<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // RECOJEMOS DATOS
        $nombre = strtolower($_POST["nombre"]);

        // LOGIN A UN SITIO
        if (preg_match('/[a-z]/', $nombre)) {
            session_start();
            $_SESSION['loginOK'] = $nombre;
            header("location: p1.php");
        } else {
            header("location: index.php?error=1");
        }
    ?>
</body>
</html>