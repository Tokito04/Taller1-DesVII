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
            <input type="number" name="presupuesto" min="1" required>
            <button type="submit">Calcular</button>
        </form>
        <?php
            function RepartirPresupuesto($presupuesto){
                $ginecologia = number_format(round($presupuesto * 0.4, 2), 2, '.', ',');
                $traumatologia = number_format(round($presupuesto * 0.35, 2), 2, '.', ',');
                $pediatria = number_format(round($presupuesto * 0.25, 2), 2, '.', ',');
                return array("ginecología"=>$ginecologia, "traumatología"=>$traumatologia, "pediatría"=>$pediatria);
            }
            //Validación del campo de presupuesto
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $presupuesto = $_POST['presupuesto'];
                $porcentajes = RepartirPresupuesto($presupuesto);
                // Mostrar los resultados
                echo '<div class="respuesta">';
                echo '<h3>El presupuesto para el departamento de Ginecología es de: $'.$porcentajes['ginecología'].'</h3>';
                echo '<h3>El presupuesto para el departamento de Traumatología es de: $'.$porcentajes['traumatología'].'</h3>';
                echo '<h3>El presupuesto para el departamento de Pediatría es de: $'.$porcentajes['pediatría'].'</h3>';
                echo '</div>';
            }
        ?>
        
    </div>
    
    <br><br><br><br>
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