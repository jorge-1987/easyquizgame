<?php 
  //Conectar
  $cn = mysqli_connect("localhost","easyquiz","some_pass","easyquiz",3306);
  /* verificar la conexión */
  if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
  }

  $res = mysqli_query($cn,"Select nick,score,timestamp from easyquiz.participants ORDER BY score DESC, timestamp LIMIT 10;");




    $highscore = array();
    while($fila = mysqli_fetch_assoc($res)){
      $highscore[] = $fila;
    }

  

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Easy Quiz</title>
 </head>
 <body>
<h1>Bienvenido al desafio EasyQuiz!</h1>
<br />
<h2>Respondé la mayor cantidad de preguntas que puedas en un minuto!</h2>
<br />
<h2><a href="participar.php">Quiero participar!</a></h2>
<br /><br /><br />
<table>
	<tr>
					<th>Nick</th><th>Score</th><th>Timestamp</th>
	</tr>
<?php
foreach ($highscore as $valor) {
 ?>
  <tr>
    <td><?= $valor['nick'] ?></td><td><?= $valor['score'] ?></td><td><?= $valor['timestamp'] ?></td>
  </tr>
    <?php
}
?>
<br />
</table><br />
</body>
</html>
