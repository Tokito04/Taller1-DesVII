
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
    <title>Categorizador</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
  <header>
    <div class="nav">
      <a href="problema5.php?accion=miFuncion">
        <img src="../img/arrow.png">
      </a>
      <h2 class="titulo">Categorizador de edades</h2>
    </div>
  </header>

  <div class="content">
    <form class="formulario" action="#" method="post">
      <label for="nombre">Primer Sujeto</label>
      <input type="number" id="num_1" name="num_1" required max="135">

      <label for="apellido">Segundo Sujeto</label>
      <input type="number" id="num_2" name="num_2" required max="135">

      <label for="correo">Tercer Sujeto</label>
      <input type="number" id="num_3" name="num_3" required max="135">

      <label for="telefono">Cuarto Sujeto</label>
      <input type="number" id="num_4" name="num_4" required max="135">

      <label for="mensaje">Quinto Sujeto</label>
      <input type="number" id="num_5" name="num_5" required max="135">

      <button type="submit">Categorizar</button>
    </form>
    <div class="respuesta">
      <?php
        function Categorizar($array){
            $edades = array("niño"=>0, "adolescente"=>0, "adulto"=>0, "anciano"=>0);
            foreach($array as $edad){
                if($edad <= 12){
                    $edades['niño'] +=1; // Cuenta los niños
                }elseif($edad <=17){
                    $edades['adolescente'] += 1; // Cuenta los adolescentes
                }elseif($edad <= 64){
                    $edades['adulto'] += 1; // Cuenta los adultos
                }else{
                    $edades['anciano'] += 1; // Cuenta los ancianos
                }
            }
            return $edades; // Devuelve el arreglo con la cantidad de personas por categoría
        }
        $valido = true;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $arreglo = array(
            $_POST['num_1'],
            $_POST['num_2'],
            $_POST['num_3'],
            $_POST['num_4'],
            $_POST['num_5']
          );
          foreach ($arreglo as $valor){
            if($valor < 0){
              $valido = false; // Verifica que no se ingresen valores negativos
              break;
            }
          }
          if($valido){
            $resultado = Categorizar($arreglo); // Llama la función para categorizar las edades
            echo "<h3>Ha ingresado:</h3>";
            echo "<h3>Niños: ".$resultado['niño']."</h3>";
            echo "<h3>Adolescentes: ".$resultado['adolescente']."</h3>";
            echo "<h3>Adultos: ".$resultado['adulto']."</h3>";
            echo "<h3>Adultos Mayores ".$resultado['anciano']."</h3>";
          }else{
            echo "<h3>Ha ingresado un valor no válido. Intente nuevamente</h3>";
          }
        }
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
