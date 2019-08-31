<?php 
  $ready = 0;

  if ($_POST['datos'] == 1)
    {
//$cn = mysqli_connect("localhost","root","","easyquiz",7188);

/* verificar la conexión */
//if (mysqli_connect_errno()) {
//    printf("Falló la conexión: %s\n", mysqli_connect_error());
//    exit();
//}

      if (!isset($_POST['name'])) die("Error in the Name");
      if (!isset($_POST['lastname'])) die("Error in the Last Name");
      if (!isset($_POST['nick'])) die("Error in the Nick");
      if (!isset($_POST['email'])) die("Error in the Email");

//     if (strlen($_POST['name']) > 31) die("Name too long");
//     if (strlen($_POST['name']) < 1) die("email too short");
//     if (strlen($_POST['lastname']) > 31) die("Lastname too long");
//     if (strlen($_POST['lastname']) < 1) die("email too short");
//     if (strlen($_POST['nick']) > 31) die("Nick too long");
//     if (strlen($_POST['nick']) < 1) die("email too short");
//     if (strlen($_POST['email']) > 60) die("email too long");
//     if (strlen($_POST['email']) < 3) die("email too short");
 
//      $_POST['name'] = mysqli_escape_string($cn, $_POST['name']);
//      $_POST['lastname'] = mysqli_escape_string($cn, $_POST['lastname']);
//      $_POST['nick'] = mysqli_escape_string($cn, $_POST['nick']);
//      $_POST['email'] = mysqli_escape_string($cn, $_POST['email']);

      $ready = 1;


//mysqli_close($enlace);
    }

  
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
			<input type="hidden" id="datos" name="datos" value="1">
			<br / > <br />
			<input type="submit" value="Participar!"/>
			
			</form>

<?php
  }
  else
  {
?>
<h1>Perfil listo para participar!:</h1>
<br />
 <?php echo $_POST['name']+'-'+$_POST['lastname']+'-'+$_POST['nick']+'-'+$_POST['email']; ?>
<a href="game.php">Comenzar!</a>
<?php
  }
?>
 </body>
</html>
