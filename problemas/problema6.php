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
        <form action="" method="POST" class="formulario">
            <label>Presupuesto Anual</label>
            <input type="number" name="presupuesto">
            <button type="submit">Calcular</button>
        </form>
        <?php
            //Validación del campo de presupuesto
            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['presupuesto'])){
                $presupuesto = $_POST['presupuesto'];
                echo '<div class="respuesta">';
                echo '<h3>El presupuesto para el departamento de Ginecología es de: '.round($presupuesto*0.4,2).'</h3>';
                echo '<h3>El presupuesto para el departamento de Traumatología es de: '.round($presupuesto*0.35,2).'</h3>';
                echo '<h3>El presupuesto para el departamento de Pediatría es de: '.round($presupuesto*0.25,2).'</h3>';
                echo '</div>';
            }
        ?>
        
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