<?php

 /*$host_db = "mysql.hostinger.mx";
 $user_db = "u539631894_root";
 $pass_db = "greenday1994";
 $db_name = "u539631894_maus";
 $tbl_name = "Clientes";*/

  
 $host_db = "localhost";
$user_db = "root";
$pass_db = "mysql";
$db_name = "MaurStore";
$tbl_name = "Clientes";

 
 $form_pass = $_POST['Contraseña'];
 
 $hash = sha1($form_pass); 

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE (Nombre = '$_POST[Nombre]' AND Apellidos='$_POST[Apellidos]') OR (Email='$_POST[Email]')";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

 echo "<a href='registro.html'>Por favor escoga otro Nombre</a>";
 }
 else{

 $query = "INSERT INTO $tbl_name (Nombre, Apellidos, Password, Ciudad, Estado, Direccion, Referencia, Email, Contacto)
 VALUES ('$_POST[Nombre]', '$_POST[Apellidos]','$hash','$_POST[Ciudad]','$_POST[Estado]','$_POST[Direccion]','$_POST[Referencia]','$_POST[Email]','$_POST[Phone]')";

 if (!mysqli_query($conexion, $query))
 {
 die('Error: ' . mysqli_error());
 echo "Error al crear el usuario." . "<br />";
 }

 else {
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
 echo "<h5>" . "Login: Sera Direccionado Al Login, En Caso de no rediccionar haga click en el enlace" . "<a href='login.html'>Login</a>" . "</h5>"; 
   }
 }


 // Aqui una nueva forma para validar el email, usando la funcion "strpos": 

 mysqli_close($conexion);
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
function redireccionar(){
  window.location="login.html";
} 
setTimeout ("redireccionar()", 2000); //tiempo expresado en milisegundos
</script>
</head>
<body>

</body>
</html>