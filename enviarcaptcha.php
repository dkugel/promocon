<?php  session_start(); 
//Variable con el resultado de la comparación 
$resultado =''; if(isset($_POST['codigo'])): 
//Si el codigo ingresado es correcto:  
if($_POST['codigo'] == $_SESSION['captcha']): 
$resultado = "Codigo correcto"; 
else: $resultado = "Codigo incorrecto, prueba nuevamente"; 
endif;  
endif;
?>
<!doctype html><html lang="en"> 
 <head> 
  <meta charset="UTF-8"> 
    <title>Ejemplo de Captcha con PHP</title> 
  <style type='text/css'> 
table tr td{ border:3px solid blue; text-align: center; } 
</style> </head> 
<body> 
<!-- Se asigna la misma página para procesar el resultado --> 
<form action="enviarcaptcha.php" method='POST'> 
<table> <tr> <td><input type="text" name="codigo" required></td> 
<td><img src="captcha.php"/></td> 
</tr> 
<tr bgcolor="red"><td colspan="2">
<input type="submit" value="Comprobar"></td></tr> 
<tr><td colspan="2" id="resultado">
<?php echo $resultado; ?></td></tr> 
</table> </form>
 </body>
</html>