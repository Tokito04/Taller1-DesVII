<?php

use function PHPSTORM_META\elementType;

  function menuPrincipal($url){
    header("Location: $url");
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
    <title>Document</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <header>
        <div class="nav">
            <a href="problema8.php?accion=miFuncion">
                <img src="../img/arrow.png">
            </a>
            <h2 class="titulo">¿En qué estación del año estoy?</h2>
        </div>
    </header>
    <div class="content">
        <form method="post" class="formulario">
            Día: <input type="number" name="dia" min="1" max="31" required><br><br>
            Mes: <input type="number" name="mes" min="1" max="12" required><br><br>
            <input type="submit" value="Consultar estación">
        </form>
        <?php
        // Clase para manejar la lógica de estación
        class Estacion {
            private $dia;
            private $mes;

            public function __construct($dia, $mes) {
                $this->dia = $dia;
                $this->mes = $mes;
            }

            public function esFechaValida() {
                return checkdate($this->mes, $this->dia, 2025);
            }

            public function obtenerEstacion() {
                if (($this->mes == 12 && $this->dia >= 21) || $this->mes == 1 || $this->mes == 2 || ($this->mes == 3 && $this->dia < 21)) {
                    return "Invierno";
                } elseif (($this->mes == 3 && $this->dia >= 21) || $this->mes == 4 || $this->mes == 5 || ($this->mes == 6 && $this->dia < 21)) {
                    return "Primavera";
                } elseif (($this->mes == 6 && $this->dia >= 21) || $this->mes == 7 || $this->mes == 8 || ($this->mes == 9 && $this->dia < 23)) {
                    return "Verano";
                } else {
                    return "Otoño";
                }
            }
        }

        // Lógica de entrada y salida
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dia = $_POST["dia"];
            $mes = $_POST["mes"];

            $estacion = new Estacion($dia, $mes);
            echo'<div style="
                    margin-top: 20px;
                    padding: 15px;
                    border-radius: 10px;
                    background-color: #e0f2f1;
                    border: 1px solid #80cbc4;
                    color: #00695c;
                    font-weight: bold;
                    text-align:center;
                ">';
            if (!$estacion->esFechaValida()) {
                echo "<p style='color:red;'>Fecha no válida.</p>";
            } else {
                $resultado = $estacion->obtenerEstacion();
                echo "<h3>La estación del día $dia del mes $mes es: $resultado</h3>";
            }
            echo '</div>';
        }
        ?>
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