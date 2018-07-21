<?php
	//	INICIAMOS LA CONEXION
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset ="UTF-8">
    <title>VictimasCS</title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <header><h1>CS</h1></header>
  <?php

    $tabla= "victimasCS";
    $conection = mysqli_connect('sql110.260mb.net','n260m_22128908','MERINO','n260m_22128908_baseCS');//'sql110.260mb.net','n260m_22128908','MERINO','n260m_22128908_baseCS'

    if(!$conection ){
        die("estamos cagados");
    }
    $sql = "SELECT COUNT(*) FROM ".$tabla;
    $retryValue = mysqli_query($conection,$sql);
    $sql2 = "SELECT * FROM ".$tabla;
    $result =mysqli_query($conection,$sql2);
    if(!retryValue || !result){
        die('Error: '.mysqli_error($conection));
    }
    ?>
    <h4>Tenemos  <?php $retryValue ?>  alumnos registrados</h4>

    <table>
    <?php
    while($fila=mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td><a href='php/mostrarNotas.php?CUI=".$fila['CUI']."&DNI=".$fila['DNI']."'>".$fila['nombre']."</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conection);


?>
