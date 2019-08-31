<?php 
  if (!isset($_POST['name']))
  {
    die("Error in the Name");
  } else {
    $ready = 1;
  }
  if (!isset($_POST['lastname'])) die("Error in the Last Name");
  if (!isset($_POST['nick'])) die("Error in the Nick");
  if (!isset($_POST['email'])) die("Error in the Email");

  $ready = 0;
  
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Easy Quiz - Particpar</title>
 </head>
 <body>
Tenés 60 segundos para responder la mayor cantidad de preguntas sobre Astronomía, RadioAstronomia, etc… Los tres mayores puntajes al cierre del evento tienen premio, y será informado vía Mail.
<br />
<?php 
  if($ready==0)
  {
?>

		<h1> Tus datos para participar:</h1>
		
		<form action ="participar.php" method ="post">
			<label for="name">Nombre:</label>
			<input type="text" name="name" id="name" />
			<br /><br />
			<label for="lastname">Apellido:</label>
			<input type="text" name="lastname" id="lastname" />
			<br /><br />
			<label for="nick">Nick:</label>
			<input type="text" name="nick" id="nick" />
			<br /><br /> 
			<label for="email">eMail:</label>
			<input type="email" name="email" id="email" />
			
			<br / > <br />
			<input type="submit" value="Participar!"/>
			
			</form>

<?php
  }
  else
  {
?>
<h1>Perfil listo para participar!:</h1>
<?php
  }
?>
 </body>
</html>
