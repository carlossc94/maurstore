<?php
session_start();
?>

<?php

include 'conexion.php';

$email = $_POST['Email'];
$password = $_POST['Contraseña'];

$contraencrip=sha1($password);

 
$sql = "SELECT * FROM $tbl_name WHERE Email = '$email'";

$result = $conexion->query($sql);


if ($result->num_rows === 1) {
 $row = $result->fetch_array(); 
 
 if ($contraencrip==$row['Password']) { 
 
 $_SESSION['loggedin'] = true;
 $_SESSION['email'] = $row['Nombre'];
 $_SESSION['start'] = time();
 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

header ("Location: index.php");

 } else { 
 echo "Username o Password estan incorrectos.";

 echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
}
mysqli_close($conexion) 
?>