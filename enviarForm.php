<?php

$enviaPara = 'benjaminbosdch@davinci.edu.ar'; 

$subject = 'Nuevo correo desde Smart fit'; 

$enviado="index.html";

$mensaje = '';
$primero = true;
foreach($_POST as $indice => $valor){
	if(is_array($valor)){
		$mensaje .= '<strong>'.$indice.': </strong><ul>';
		foreach($valor as $item){
			$mensaje .= '<li>'.$item .'</li>';
		}				
		$mensaje .= '</ul><br>'; 
	}else{
		if($primero){
			$from = $valor;
			$primero = false;
		}
		$mensaje .= '<strong>'.$indice.': </strong>';
		$mensaje .= $valor . '<br>';
		if(strpos($valor, '@')>3 && strpos($valor, '.') > -1){
			$from = $valor;
		}
	}
}
$mail_headers  = "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$mail_headers .= 'From: ' . $from . "\r\n";
@mail($enviaPara, $subject, $mensaje, $mail_headers); 
header("Location: $enviado");
?>