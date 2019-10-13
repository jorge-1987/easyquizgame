<?php 
//Conectar
$cn = mysqli_connect("localhost","easyquiz","","some_pass",3306);
/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

//TEST
$tiempo = 0;
$preguntastring= ""

  if(isset($_POST['datos']))
  {
    if ($_POST['datos'] != "0")
      {
         if (!ctype_digit($_POST['datos']))
           {
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
               //$preguntastring= "algo $preguntaid"

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
                   $i--;
                 }
               }
               sort($respuestas);

             }
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
		<h1><?php echo $preguntastring; ?></h1>
		
		<form action ="game.php" method ="post">
  <div>
<?php
//DEBUG:
//print_r($respuestas);
//Traer de la DB String para el ID
foreach($respuestas as $rid)
{
?>
    <input type="radio" id="<?=$rid ?>" name="answ" value="<?=$rid ?>">
    <label for="<?=$rid ?>"><?php echo 'texto de '.$rid; ?></label>
<br />
<?php
}
?>
  </div>
			<input type="hidden" id="datos" name="datos" value="<?php $_POST['datos'] ?>">
			<br / > <br />
			<input type="submit" value="Responder!"/>
			
			</form>
<br />
</body>
</html>
