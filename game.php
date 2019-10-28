<?php

$tiempo = 0;
$preguntastring = "";
$tiempo60 = 0;
$continue = 0;

if(isset($_GET['pid']))
  {
    //Conectar
    $cn = mysqli_connect("localhost","easyquiz","some_pass","easyquiz",3306);
    /* verificar la conexión */
    if (mysqli_connect_errno()) {
      printf("Falló la conexión: %s\n", mysqli_connect_error());
      exit();
    }
    //SANITIZAR GET PID PARA EVITAR INJECTION
    $_GET['pid'] = mysqli_escape_string($cn, $_GET['pid']);
    if (ctype_digit($_GET['pid']))
    {
      $pid = $_GET['pid'];
      if ($pid < 0)
        {
          echo "ERROR EN EL PID";
          exit();
        }
      $res = mysqli_query($cn,"Select timestamp,time60 from easyquiz.participants where id = '$pid';");
      if(mysqli_error($cn)!="")
        {
          echo mysqli_error($cn);
          $pid = -1;
          exit();
        }
      if (mysqli_num_rows($res) == 1)
      {
        $sdata = mysqli_fetch_assoc($res);
        if ($sdata['timestamp'] == "")
        {
          $tiempo=time();
          //Get time +60
          $tiempo60=($tiempo+60);
          //Guardar tiempo +60 en el perfil de la DB - Not sure is needed
          
          $res = mysqli_query($cn,"UPDATE easyquiz.participants SET timestamp = '$tiempo', time60 = '$tiempo60' WHERE id = '$pid';");

        }
        else
        {
          $tiempo = time();
          $tiempo60 = $sdata['time60'];
        }
      }
      else
      {
        echo "ID is wrong. I dont know why, but is wrong";
        $pid = -1;
        exit();
      }
    } 
  }

  if($pid > 0)
  {
    if ($tiempo > 0)
      {     
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
          $continue = 1;

        }
        else
        {
          $continue = 0;
        }
      
      }

  }

?>
<html>
 <head>
  <title>Easy Quiz</title>
 </head>
 <body>
<br />
<?php
//Todavia puede seguir respondiendo
if ($continue == 1)
{
?>
Dale, te quedan <?php echo ($tiempo60-$tiempo) ?> segundos!!!!
<br />
		<h1><?php echo $preguntastring; ?></h1>
		
		<form action ="game.php?pid=<?=$pid ?>" method ="post">
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
<?php
//NO puede continuar mas.
}
else
{
?>
  <h1>Gracias por participar!</h1>
<br />
<a href="score.php?pid=<?=$pid ?>">Go to Score.</a>
<?php
}
?>
</body>
</html>
