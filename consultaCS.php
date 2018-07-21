<?php
	//	INICIAMOS LA CONEXION
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,'extranet.unsa.edu.pe/admision/or2018f2/escuela444.html');
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/4.0 (compatible; MSIE 5.01;Windows NT S.0)');
	curl_setopt($ch,CURLOPT_HTTPHEADER,array("Accept-Language: es-es,en"));
	curl_setopt($ch,CURLOPT_TIMEOUT,10);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

	//	 GUARDAMOS LA PAGINA
	$result=curl_exec($ch);
	$error=curl_error($ch);
	curl_close($ch);

	// 	parseamos
	preg_match_all("(<td class=\"lis-tabl\">LIMA/CHUQUICONDO, GABRIELA NATALIA</td>                <td class=\"lis-tabl\">(.*)</td>)siU",$result,$matches1);
	
	$nota = $matches1[1][0];
	//echo $result;
	echo "nota: ".$nota;
	
?>
