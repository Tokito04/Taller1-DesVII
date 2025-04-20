
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Grupal</title>
    <link rel="stylesheet" href="styles/estilos.css">
</head>
<body>
  <header>
    <nav>
      <a href="index.php" style="font-size:2.5vw">Taller grupal de Desarrollo de Software VII</a>
    </nav>
  </header>

  <div class="content">
    <h1>Bienvenido al Menú Principal</h1>
    <div class="grid-container">

      <a href="problemas/problema1.php" class="content_card">
      <div class="card">
        <h2>Problema 1</h2>
        <p>Calculadora de la media de 5 números.</p>
      </div></a>

      <a href="problemas/problema2.php" class="content_card">
      <div class="card">
        <h2>Problema 2</h2>
        <p>Sumatoria de números del 1 al 1000</p>
      </div></a>

      <a class ="content_card" href="problemas/problema3.php">
      <div class="card">
        <h2>Problema 3</h2>
        <p>Suma de primeros 10 números pares.</p>
      </div></a>

      <a class = "content_card" href="problemas/problema4.php">
        <div class="card">
          <h2>Problema 4</h2>
          <p>Suma independiente de números pares e impares.</p>
        </div></a>

        <a href="problemas/problema5.php" class="content_card">
      <div class="card">
        <h2>Problema 5</h2>
        <p>Categorizador de sujetos según la edad.</p>
      </div></a>

      <a class ="content_card" href="">
      <div class="card">
        <h2>Opción 6</h2>
        <p>Descripción de la opción 6.</p>
      </div></a>

      <a class = "content_card" href="">
        <div class="card">
          <h2>Opción 7</h2>
          <p>Descripción de la opción 7.</p>
        </div></a>

        <a href="" class="content_card">
      <div class="card">
        <h2>Opción 8</h2>
        <p>Descripción de la opción 8.</p>
      </div></a>

      <a class ="content_card" href="">
      <div class="card">
        <h2>Opción 9</h2>
        <p>Descripción de la opción 9.</p>
      </div></a>

      <a class = "content_card" href="">
        <div class="card">
          <h2>Opción 10</h2>
          <p>Descripción de la opción 10.</p>
        </div></a>
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
    echo date("d/m/Y"); 
  ?></span>
</footer>
</body>
</html>