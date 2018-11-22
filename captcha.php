<?php  session_start();
 //Se genera un string y se acorta a seis caracteres 
 $ranStr = substr( sha1( microtime() ),0,6); 
 //Se almacena el valor en una variable de sesión 
 $_SESSION['captcha'] = $ranStr; 
 //Se crea la imagen (esta debe existir) 
 $imagen = imagecreatefromjpeg( "fondo_captcha.jpg" ); 

// la funcion imagecolorallocate ( $imagen , rojo , verde , azul ) genera un color  
$colortext = imagecolorallocate($imagen, 15, 43, 67); 
 imagestring($imagen, 5, 30, 8, $ranStr, $colortext); 
 header( "Content-type: image/jpeg" );
 //Se crea la imagen 
imagejpeg($imagen); ?>