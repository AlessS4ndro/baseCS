<?php
    // creamos las variables
    $tabla= "victimasCS";
    $conection = mysqli_connect('sql110.260mb.net','n260m_22128908','MERINO','n260m_22128908_baseCS');//'sql110.260mb.net','n260m_22128908','MERINO','n260m_22128908_baseCS'

    if(!$conection ){
        die("estamos cagados");
    }

    $CUI=$_POST["CUI"];
    $DNI=$_POST["DNI"];
    $nombre=$_POST["NOMBRE"];


    $insertValue= "INSERT INTO $tabla (nombre,DNI,CUI) VALUES "."('$nombre','$DNI','$CUI');";
    print ($insertValue);

    $retryValue = mysqli_query($conection,$insertValue);
    if(!retryValue){
        die('Error: '.mysqli_error($conection));
    }
    echo "<a href='index.html'>regresar</a>";
    mysqli_close($conection);

    echo("<html>");
    echo ('<h2>Ingresando los siguientes datos</h2>');
    echo ("<h3>$CUI</h3>");
    echo ("<h3>$DNI</h3>");
    echo ("<h3>$nombre</h3>");
    echo("</html>");
?>
