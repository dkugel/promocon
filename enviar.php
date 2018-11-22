<?php    
    session_start();     
	$name = isset($_POST['name'])? $_POST['name'] : NULL;
	$email = isset($_POST['email'])? $_POST['email'] : NULL;
	$phone = isset($_POST['phone'])? $_POST['phone'] : NULL;
	$message = isset($_POST['message'])? $_POST['message'] : NULL;

    $para = 'dcomercial@promocon.net';
    $titulo = 'Nuevo contacto Web';
    $header = 'De: ' . $email;    
    $cuerpo  = "Nombre: $name\n";
    $cuerpo .= "E-Mail: $email\n";
    $cuerpo .= "telefono: $phone\n";      
    $cuerpo .= "Mensaje: $message\n";
    
    if($_POST['codigo'] == $_SESSION['captcha']){
        if (isset($_POST['submit'])) {
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
    }else{
        echo "<script language='javascript'>
                alert('Código erroneo, intente nuevamente.');
                window.location.href = 'http://www.promocon.net/contacto.html';
                </script>";
    }
        
       
?>