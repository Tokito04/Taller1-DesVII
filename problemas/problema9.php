<?php

use function PHPSTORM_META\elementType;

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
    <title>Problema 9</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <header>
        <div class="nav">
            <a href="problema9.php?accion=miFuncion">
                <img src="../img/arrow.png">
            </a>
            <h2 class="titulo">Las primeras 15 potencias de 4 :)</h2>
        </div>
    </header>
    <div class="content" style="padding-left:50px">
        <?php
            $potencia = new Problema9();
            for($i=1;$i<=15;$i++){
                echo '<p> 4 elevado a '.$i.' es igual a '.$potencia->potencia($i).'</p>';
            }
        ?>
    </div>
    <?php
        // Clase para manejar la lógica
        class Problema9{
            public function potencia($num) {
                return (4**$num);
            }
        }        
    ?>
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