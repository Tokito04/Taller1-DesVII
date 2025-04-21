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
    <title>Múltiplos de 4</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <header>
        <div class="nav">
            <a href="problema10.php?accion=miFuncion">
                <img src="../img/arrow.png">
            </a>
            <h2 class="titulo">Los primeros múltiplos de 4 :D</h2>
        </div>
    </header>
    <div class="content">
        <form action="" class="formulario" method="POST">
            <label for="numeros">¿Cuantos múltiplos desea conocer?</label>
            <input type="number" name="numeros" id="numeros">
            <button type="submit">Enviar</button>
        </form>
        
        <?php

            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['numeros'])){
                $numeros = $_REQUEST['numeros'];
                $multiplo = new Problema10();
                echo '<div class="respuesta">';
                    for($i=1;$i<=$numeros;$i++){
                        echo '<p> 4 X '.$i.' es igual a '.$multiplo->multiplicacion($i).'</p>';
                    }
                echo '</div>';
            }
        ?>
    </div>
    <?php
        //Clase para manejar la Lógica
        class Problema10{
            public function multiplicacion($num) {
                return (4*$num);
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