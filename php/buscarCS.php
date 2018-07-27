<?php
  $tipo=$_GET["clave"] ;echo "el tipo  es: " . $tipo;
  $clave=$_GET["inputBuscar"];echo "la clave es: ".$clave;
  $tabla= "victimasCS";
  // descomentar linea abajo para subir al hosting
  //$conection = mysqli_connect('sql110.260mb.net','n260m_22128908','MERINO','n260m_22128908_baseCS');
  // descomentar linea abajo para probar en localhost
  $conection = mysqli_connect('localhost','root','merinomysql','n260m_22128908_baseCS');
  if(!$conection ){
      die("estamos cagados");
  }
  if($tipo=="nombre"){
    $sql2 = "SELECT * FROM ".$tabla." WHERE ".$tipo." LIKE '%".$clave."%'";
    $result2 =mysqli_query($conection,$sql2);
    if(!$result2 ){
        die('Error: '.mysqli_error($conection));
    }
    echo "<table>";
    while($fila=mysqli_fetch_array($result2)){
        $bandera=1;
        echo "<tr>";
        echo "<td><a href='mostrarNotas.php?CUI=".$fila['CUI']."&DNI=".$fila['DNI']."'>".$fila['nombre']."</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    if(!$bandera){"No se encontraron coincidencias";}
  }
  else{
    $sql = "SELECT * FROM ".$tabla." WHERE ".$tipo." = ".$clave;
    $result =mysqli_query($conection,$sql);
    echo $sql;
    if(!$result ){
        die('Error: '.mysqli_error($conection));
    }
    echo "<table>";
    while($fila=mysqli_fetch_array($result)){
      echo "emtramdp añ bucle";
      $bandera=1;
        echo "<tr>";
        echo "<td><a href='mostrarNotas.php?CUI=".$fila['CUI']."&DNI=".$fila['DNI']."'>".$fila['nombre']."</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    if(!$bandera){"No se encontraron coincidencias";}
  }
  mysqli_close($conection);
?>
hihi
