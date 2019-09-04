<?php 
/* verificar la conexión */
//if (mysqli_connect_errno()) {
//    printf("Falló la conexión: %s\n", mysqli_connect_error());
//    exit();
//}

//TEST
$tiempo = 0;

  if(isset($_POST['datos'])) {
    if ($_POST['datos'] != "0")
      {
         if (!ctype_digit($_POST['datos']))
           {
             //$cn = mysqli_connect("localhost","root","","easyquiz",7188);
             //Levantar el tiempo del perfil en la DB
             //$tiempo=
             if ($tiempo == 0)
               {
                 //Obtener timestamp
                 $tiempo=time();
                 //Guardar timestamp en la DB
                 // $tiempo
                 //Obtener Timestamp+60
                 $tiempo60=($tiempo+62);
                 //Guardar tiempo +60 en el perfil de la DB
                 // $tiempo60
               }

           $tiempo=time();
           //Obtener T+60 de la DB
           // $tiempo60
           if ($tiempo < $tiempo60)
             {
               $preguntaid=rand(1, 15);
               //levantar pregunta de la DB
//               $preguntastring= algo $preguntaid

               $respuestas=array(); 
               array_push($respuestas, $preguntaid);

               for ($i = 1; $i <= 3; $i++)
               {
                 $respid=rand(1, 15);
                 if ($respid != $preguntaid)
                 {
                   array_push($respuestas, $respid);
                 }
                 else
                 {
                   $i--
                 }
               }
               sort($respuestas);

               //TEST
               print_r($emptyArray);
             }
         }
      }



//      echo $_POST['name'].'-'.$_POST['lastname'].'-'.$_POST['nick'].'-'.$_POST['email'].$_POST['datos'].$ready;

//mysqli_close($enlace);

//    }

//}
?>
<html>
 <head>
  <title>Easy Quiz</title>
 </head>
 <body>
<br />
Dale, te quedan <?php echo ($tiempo60-$tiempo) ?> segundos!!!!
<br />
		<h1><?php echo 'Pregunta X:'; ?></h1>
		
		<form action ="game.php" method ="post">
  <div>
    <input type="radio" id="contactChoice1" name="answ" value="email">
    <label for="contactChoice1">Email</label>

    <input type="radio" id="contactChoice2" name="answ" value="phone">
    <label for="contactChoice2">Phone</label>

    <input type="radio" id="contactChoice3" name="answ" value="mail">
    <label for="contactChoice3">Mail</label>

    <input type="radio" id="contactChoice4" name="answ" value="mail">
    <label for="contactChoice4">Mail</label>
  </div>
			<input type="hidden" id="datos" name="datos" value="1">
			<br / > <br />
			<input type="submit" value="Responder!"/>
			
			</form>
<br />
</body>
</html>
