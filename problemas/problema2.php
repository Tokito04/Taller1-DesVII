
<?php
  function menuPrincipal($url){
    header("Location: $url");  // Redirige a la página principal
      exit(); // Detiene la ejecución y redirige
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
    <title>Suma de números pares</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
  <header>
    <div class="nav">
      <a href="problema2.php?accion=miFuncion">
        <img src="../img/arrow.png">
      </a>
      <h2 class="titulo">Suma de los 10 primeros números pares</h2>
    </div>
  </header>

  <div class="content">
    <div class="respuesta">
      <?php
        function CalcularSuma($array){
          $total = 0;
          foreach ($array as $valor){
            $total += $valor; 
          }
          return $total; // Devuelve la suma total
        }
        $arreglo_num = [];
        for ($i = 1; $i <= 10; $i++) {
          $arreglo_num[] = $i * 2; // Almacena los números pares hasta 20
        }
        $resultado = CalcularSuma($arreglo_num); // Llama la función para calcular la suma
        echo "<h3>La suma de los números es: $resultado </h3>"; // Muestra el resultado
      ?>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <footer>
    <?php
    $año = date("Y"); // Obtiene el año actual
    echo "<p>&copy;$año Todos los derechos reservados</p>";
    ?>
    Ejecutado el día: <span><?php 
    date_default_timezone_set("America/Panama");
    echo date("d/m/Y"); ?></span> <!-- Muestra la fecha de ejecución -->
  </footer>
</body>
</html>
