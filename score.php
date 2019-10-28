<?php 

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
      $res = mysqli_query($cn,"Select nick,score from easyquiz.participants where id = '$pid';");
      if(mysqli_error($cn)!="")
        {
          echo mysqli_error($cn);
          $pid = -1;
          exit();
        }
      if (mysqli_num_rows($res) == 1)
        {
            $highscore = mysqli_fetch_assoc($res);
        }
    }
  }

?>
<html>
 <head>
  <title>Easy Quiz</title>
 </head>
 <body>
 <h1><?=$highscore['nick'] ?>, tu score fue de: <?=$highscore['score'] ?>.</h1>

 <br />
 <br />
 <h2><a href="index.php">Volver al inicio!</a></h2>
 </body>
</html>
