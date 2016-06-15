<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    if(isset($_SESSION['carrito'])){
echo "<!DOCTYPE html>
<html>
<head>
    <title>Maur-Store</title>
    <meta charset='utf-8'/>
    <link rel='shortcut icon' href='images/maur.ico' type='image/ico' />
</script>
</head>
<body>
<section class='header'>
<center style='color:white;'>GRACIAS POR SU COMPRA</center><BR>
<center style='color:white;'>EN UN MOMENTO SE LE REDIRECCIONARA A SU COMPROBANTE DE COMPRA</center><BR>
</section>

<footer>
    
</footer>

<link rel='stylesheet' type='text/css' href='css/store.css'/>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Allerta' rel='stylesheet' type='text/css'><!--CDN--> 


</body>
</html>";

?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
function redireccionar(){
  window.location="comprobante.php";
} 
setTimeout ("redireccionar()", 2000); //tiempo expresado en milisegundos
</script>
</head>
<body>
</body>
</html>
<?php
    }
    else{
        header("location:catalogo.php");
    }
}
else{
    header("location:login.html");
}
?>