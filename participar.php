<?php 
  //Conectar
  $cn = mysqli_connect("localhost","easyquiz","some_pass","easyquiz",3306);
  /* verificar la conexión */
  if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
  }


  $ready = 0;
  $pid = 0;

  if(isset($_POST['datos'])) {
    if ($_POST['datos'] == "1")
      {
        if (!isset($_POST['name'])) {
          printf("Error in Name");
          exit();
        }
        if (!isset($_POST['lastname'])) {
          printf("Error in lastname");
          exit();
        }
        if (!isset($_POST['nick'])) {
          printf("Error in nick");
          exit();
        }
        if (!isset($_POST['email'])) {
          printf("Error in email");
          exit();
        }

       if (strlen($_POST['name']) > 31) {
            printf("Error in Name too long");
            exit();
          }
       if (strlen($_POST['name']) < 1) {
            printf("Error in Name too short");
            exit();
          }
       if (strlen($_POST['lastname']) > 31) {
            printf("Error in lastname too long");
            exit();
          }
       if (strlen($_POST['lastname']) < 1) {
            printf("Error in lastname too short");
            exit();
          }
       if (strlen($_POST['nick']) > 31) {
            printf("Error in Nick too long");
            exit();
          }
       if (strlen($_POST['nick']) < 1) {
            printf("Error in Nick too short");
            exit();
          }
       if (strlen($_POST['email']) > 60) {
            printf("Error in email too long");
            exit();
          }
       if (strlen($_POST['email']) < 3) {
            printf("Error in email too short");
            exit();
          }

       //$_POST["email"] = test_input($_POST["email"]);
       if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
         printf("Error in email format");
         exit();
       }

        $name = mysqli_escape_string($cn, $_POST['name']);
        $lastname = mysqli_escape_string($cn, $_POST['lastname']);
        $nick = mysqli_escape_string($cn, $_POST['nick']);
        $email = mysqli_escape_string($cn, $_POST['email']);

        //Verificar que el mail no este ya en la DB 

        $res = mysqli_query($cn,"Select id from easyquiz.participants where mail = '$email';");

        if (mysqli_num_rows($res) > 0)
          {
            printf("Email already registered");
            exit();
          }
// GUARDAR TODO EN LA DB
        mysqli_query($cn,"INSERT INTO easyquiz.participants (name, last_name, nick, mail) VALUES ('$name', '$lastname', '$nick', '$email');");
// LEVANTAR ID

        $res = mysqli_query($cn,"Select id,nick from easyquiz.participants where mail = '$email';");
      //echo $mail;
        $sdata = mysqli_fetch_assoc($res);
      //echo $sdata["id"];
        $ready = 1;
//      echo $_POST['name'].'-'.$_POST['lastname'].'-'.$_POST['nick'].'-'.$_POST['email'].$_POST['datos'].$ready;

//mysqli_close($enlace);
    }
}

  
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Easy Quiz - Particpar</title>
 </head>
 <body>
Tenés 60 segundos para responder la mayor cantidad de preguntas.
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
<h1>Perfil listo para participar -<?=$sdata["nick"] ?>-!:</h1>
<h2>Mucha suerte, una vez que hagas click en comenzar, ¡empieza a correr el tiempo!</h2>
<br />
<h2><a href="game.php?pid=<?=$sdata["id"] ?>">Comenzar!</a></h2>
<?php
  }
?>
 </body>
</html>
