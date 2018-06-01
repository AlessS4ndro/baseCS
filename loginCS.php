<?php
	//	INICIAMOS LA CONEXION
	$parametrosPost='cui='.urlencode("20153696").'&dni='.urlencode("76545351");
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,'extranet.unsa.edu.pe/sisacad/parciales18/index.php');
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/4.0 (compatible; MSIE 5.01;Windows NT S.0)');
	curl_setopt($ch,CURLOPT_HTTPHEADER,array("Accept-Language: es-es,en"));
	
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$parametrosPost);
	
	curl_setopt($ch,CURLOPT_HEADER,false);
	curl_setopt($ch,CURLOPT_TIMEOUT,10);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

	//	 GUARDAMOS LA PAGINA
	$result=curl_exec($ch);
	$error=curl_error($ch);
	curl_close($ch);

	// 	parseamos
	preg_match_all("(<td>ARQUITECTURA DE COMPUTADORES</td><td>EVAL. CONTINUA 1</td><td align=center>A</td><td align=center>(.*)</td>)siU",$result,$matches1);
	
	$nota = $matches1[1][0];
	//echo $result;
	echo "nota: ".$nota;
	
	
?>
