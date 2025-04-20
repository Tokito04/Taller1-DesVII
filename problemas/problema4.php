
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
    <title>Suma de números</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
  <header>
    <div class="nav">
      <a href="problema4.php?accion=miFuncion">
        <img src="../img/arrow.png">
      </a>
      <h2 class="titulo">Suma independientes de números pares e impares</h2>
    </div>
  </header>

  <div class="content">
    <div class="respuesta">
      <?php
        function CalcularSumaPar($array){
            $total = 0;
            foreach ($array as $valor){
                if($valor % 2 == 0){ // Verifica si es par
                    $total += $valor; 
                }
          }
          return $total; // Devuelve la suma de los números pares
        }
        function CalcularSumaImpar($array){
            $total = 0;
            foreach ($array as $valor){
                if($valor % 2 != 0){ // Verifica si es impar
                    $total += $valor; 
                }
            }
            return $total; // Devuelve la suma de los números impares
          }
        $arreglo_num = range(1, 200); // Crea un arreglo con los números del 1 al 200
        
        $resultadoPar = CalcularSumaPar($arreglo_num); // Llama la función para calcular la suma de números pares
        $resultadoImpar = CalcularSumaImpar($arreglo_num); // Llama la función para calcular la suma de números impares
        echo "<h3>La suma de los números pares es: $resultadoPar </h3><br>"; // Muestra la suma de los números pares
        echo "<h3>La suma de los números impares es: $resultadoImpar </h3>"; // Muestra la suma de los números impares
      ?>
    </div>
  </div>
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
