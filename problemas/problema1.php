<?php
  function menuPrincipal($url){
    header("Location: $url");  // Redirige a la página principal
      exit();
  }
    // Verifica si se ha enviado una acción por método GET y si es igual a 'miFuncion'
  if (isset($_GET['accion']) && $_GET['accion'] == 'miFuncion') {
    menuPrincipal("../index.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media de 5 números</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
  <header>
    <div class="nav">
      <a href="problema1.php?accion=miFuncion">
        <img src="../img/arrow.png">
      </a>
      <h2 class="titulo">Media de números ingresados</h2>
    </div>
  </header>

  <div class="content">
    <form class="formulario" action="#" method="post">
      <label for="nombre">Primer Número</label>
      <input type="text" id="num_1" name="num_1" required>

      <label for="apellido">Segundo Número</label>
      <input type="text" id="num_2" name="num_2" required>

      <label for="correo">Tercer Número</label>
      <input type="text" id="num_3" name="num_3" required>

      <label for="telefono">Cuarto Número</label>
      <input type="text" id="num_4" name="num_4" required>

      <label for="mensaje">Quinto Número</label>
      <input type="text" id="num_5" name="num_5" required>

      <button type="submit">Calcular Media</button>
    </form>
    <div class="respuesta">
      <?php
        // Función que calcula la media (promedio) de los elementos de un arreglo
        function CalcularMedia($array){
          $total = 0;
          foreach ($array as $valor){
            $total += $valor; #Suma de todos los valores del arreglo
          }
          $media = $total/5;
          return $media;#Devuelve la media calculada
        }
        $valido = true;#Variable para validar si todos los valores ingresados son permitidos
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          #Guarda los datos ingresados por el usuario en una variable
          $arreglo = array(
            $_POST['num_1'],
            $_POST['num_2'],
            $_POST['num_3'],
            $_POST['num_4'],
            $_POST['num_5']
          );
          #Se recorre el arreglo para verificar la validez de los datos
          foreach ($arreglo as $valor){
            if(!is_numeric($valor) || $valor < 0){
              $valido = false;
              break;
            }
          }
          #Si los valores son válidos se imprime el resultado
          if($valido){
            $resultado = CalcularMedia($arreglo);
            echo "<h3>La media de los números ingresados es: $resultado </h3>";
          }else{
            #Muestra un mensaje de error si alguno de los valores es inválido
            echo "<h3>Ha ingresado un valor no válido. Intente nuevamente</h3>";
          }
        }
      ?>
    </div>
  </div>
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