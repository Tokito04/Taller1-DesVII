<?php
  function menuPrincipal($url){
    header("Location: $url");  // Redirige a la página principal
      exit();
  }
  if (isset($_GET['accion']) && $_GET['accion'] == 'miFuncion') {
    menuPrincipal("../index.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto Hospital</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body style="background-size:108%">
    <header>
        <div class="nav">
            <a href="problema6.php?accion=miFuncion">
                <img src="../img/arrow.png">
            </a>
            <h2 class="titulo">Distribución de presupuesto</h2>
        </div>
  </header>
    <div class="content" style="padding: 50px;">
        <table class="tabla" style="font-size: x-large;">
            <tr style="background-color: purple; color:antiquewhite;">
                <th><b>Área</b></th>
                <th><b>Porcentaje del Presupuesto</b></th>
            </tr>
            <tr>
                <td>Ginecología</td>
                <td>40%</td>
            </tr>
            <tr>
                <td>Traumatología</td>
                <td>35%</td>
            </tr>
            <tr>
                <td>Pediatría</td>
                <td>25%</td>
            </tr>
        </table>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <footer>
        <?php
            $año = date("Y");
            echo "<p>&copy;$año Todos los derechos reservados</p>";
        ?>
        <!--- Esta sección es la que se encarga de verificar el día de ejecución de la página--->
        Ejecutado el día: <span><?php 
            date_default_timezone_set("America/Panama");
            echo date("d/m/Y"); ?></span>
    </footer>
</body>
</html>