<?php
	//	INICIAMOS LA CONEXION
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset ="UTF-8">
    <title>VictimasCS</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="../javascript/funciones.js"></script>
  </head>
  <body>
    <?php
    if($_GET["formBuscar"]!="enviar"){
      ?>
      <nav id="campoBusqueda">
        <form id ="formulario"action ="buscarCS.php" method="get">
          <label for ="inputBuscar">Buscar victima!!</label>
          <input type="text" placeholder ="palabra magica!!" name="inputBuscar">
            <legend>Buscar por:</legend>
            <label><input type="radio" name="clave" value="nombre" > Nombre</label>
            <label>
                <input type="radio" name="clave" value="CUI"> CUI
            </label>
            <label>
                <input type="radio" name="clave" value="DNI"> DNI
            </label>
            <input type="submit" value="enviar" name="botonEnviar">
        </form>
      </nav>
      <?php
    }
    ?>

    <header><h1>CS</h1></header>
  <?php

    $tabla= "victimasCS";
    // descomentar linea abajo para subir al hosting
    //$conection = mysqli_connect('sql110.260mb.net','n260m_22128908','MERINO','n260m_22128908_baseCS');
    // descomentar linea abajo para probar en localhost
    $conection = mysqli_connect('localhost','root','merinomysql','n260m_22128908_baseCS');
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
        echo "<td><a href='mostrarNotas.php?CUI=".$fila['CUI']."&DNI=".$fila['DNI']."'>".$fila['nombre']."</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conection);

?>
</body>
</html>
