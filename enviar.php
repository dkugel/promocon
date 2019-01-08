<?php    
    session_start();     
	$name = isset($_POST['name2'])? $_POST['name2'] : NULL;
	$email = isset($_POST['email2'])? $_POST['email2'] : NULL;
	$phone = isset($_POST['phone'])? $_POST['phone'] : NULL;
    $message = isset($_POST['message'])? $_POST['message'] : NULL;
    
    //$captcha = $_POST['codigo'];
	
	$recaptcha = $_POST["g-recaptcha-response"];
 
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6LdLK30UAAAAAIuBYPKT9JsFTuYyc4tdDC9B5mzj',
		'response' => $recaptcha
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success = json_decode($verify);
	

    $para = 'dcomercial@promocon.net';
    $titulo = 'Nuevo contacto Web';
    $header = 'From: ' .$email;    
    $cuerpo  = "Nombre: $name\n";
    $cuerpo .= "E-Mail: $email\n";
    $cuerpo .= "telefono: $phone\n";      
    $cuerpo .= "Mensaje: $message\n";
    //$cuerpo .= "Código: $captcha\n";
	
	
	if ($captcha_success->success) {
		
		if ( ($_POST['name'] != "") || ($_POST['email'] != "") ){
		 // Es un SPAMbot
			echo "<script language='javascript'>
                alert('Eres un bot, intenta nuevamente.');
                window.location.href = 'http://www.promocon.net/contacto.html';
                </script>";

		} else {
			// Es un usuario real, proceder a enviar el formulario.
			if (mail($para, $titulo, $cuerpo, $header)) {
                echo "<script language='javascript'>
                alert('Mensaje enviado, muchas gracias.');
                window.location.href = 'http://www.promocon.net';
                </script>";
                }
            else {
                echo 'Falló el envio';
            }			
		}						
	} else {
		// Eres un robot!
		echo "<script language='javascript'>
                alert('Captcha erroneo, intente nuevamente.');
                window.location.href = 'http://www.promocon.net/contacto.html';
                </script>";
	}
	
	

	
	
	
	
	
	
	
	
       
        
       
?>