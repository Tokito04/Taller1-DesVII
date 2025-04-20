<?php

use function PHPSTORM_META\elementType;

  function menuPrincipal($url){
    header("Location: $url");  // Redirige a 
      exit();
  }
  if (isset($_GET['accion']) && $_GET['accion'] == 'miFuncion') {
    menuPrincipal("../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 7</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <header>
        <div class="nav">
            <a href="problema7.php?accion=miFuncion">
                <img src="../img/arrow.png">
            </a>
            <h2 class="titulo">Calculadora de Datos Estadisticos</h2>
        </div>
    </header>
    <div class="content">
        <form action="#" method="post" class="formulario">
            <label for="cantidad">¿Cuántas notas deseas ingresar?</label>
            <input type="number" name="cantidad" id="cantidad" required min="2">
            <br><br>
            <input type="submit" name="btnGenerar" value="Generar formulario para notas">
        </form>

        <?php
            
            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['cantidad'])){
                $cantidad = $_POST['cantidad'];

                //Generar el formulario
                echo '<form action="" method="post" class="formulario">';
                echo '<input type="hidden" name="cantidad" value ="'.$cantidad.'">';

                for ($i = 1; $i <= $cantidad; $i++){
                    echo "<label for='nota$i'>Nota Número $i: </label>" .
                    "<input type='number' name='nota$i' required/> <br><br>";
                }
                echo '<input type="submit" name="btnCalcular" value="Calcular">';
                echo '</form>';

                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btnCalcular"])){
                    $objeto = new Procesos($cantidad);
                    echo '<div class="resultado" style="margin-top: 20px;
                        padding: 15px;
                        border-radius: 10px;
                        background-color: #e0f2f1;
                        border: 1px solid #80cbc4;
                        color: #00695c;
                        font-weight: bold;">';
                    echo 'Para sus notas usted tiene un promedio de: '.round($objeto->CalcularPromedio(),2).' con una desviación estandar de: '.round($objeto->Desviacion(),2).'<br>';
                    echo 'Su nota más baja es de: '.$objeto->menor().' y su nota más alta es de: '.$objeto->mayor();
                    echo '</div>';
                }
            }
            class Procesos{
                private $arreglo;
                private $cantidad;
                private $promedio;

                public function __construct($cantidad){
                    $this->cantidad = $cantidad;
                    $this->SetArreglo();
                }
                
                public function SetArreglo(){
                    //inicializar el arreglo con los datos del form
                    for($i = 1; $i <= $this->cantidad; $i++){
                        $this->arreglo[] = $_POST["nota$i"];
                    }
                }

                public function CalcularPromedio(){
                    for($i = 0; $i < $this->cantidad; $i++){
                        $this->promedio += $this->arreglo[$i];
                    }
                    return (float)$this->promedio/$this->cantidad;
                }

                public function Desviacion(){
                    $media = $this->CalcularPromedio()/$this->cantidad;

                    $diferenciasCuadrado = 0;
                    foreach($this->arreglo as $notas){
                        $diferenciasCuadrado += pow($notas-$media,2);
                    }

                    return sqrt($diferenciasCuadrado/$this->cantidad);
                }

                public function menor(){
                    return min($this->arreglo);
                }

                public function mayor(){
                    return max($this->arreglo);
                }
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