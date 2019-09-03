<?php 
//  $ready = 0;
//  if(isset($_POST['datos'])) {
 //   if ($_POST['datos'] == "1")
//      {

$tiempo=time();
$tiempo60=($tiempo+60);

//$cn = mysqli_connect("localhost","root","","easyquiz",7188);

/* verificar la conexión */
//if (mysqli_connect_errno()) {
//    printf("Falló la conexión: %s\n", mysqli_connect_error());
//    exit();
//}

//        if (!isset($_POST['name'])) {
//          printf("Error in Name");
//          exit();
//        }

// Create an empty array 
$emptyArray=array(); 
  
// Push elements to the array 
array_push($emptyArray, "1", "3");

array_push($emptyArray, "7", "5"); 
  
// Display array elements 
print_r($emptyArray); 

sort($emptyArray)

print_r($emptyArray);
//      $ready = 1;
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
Timer:
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
 <?php echo $tiempo ?>
 <?php echo $tiempo60 ?>
 </body>
</html>
