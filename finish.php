<?php
include 'conexion.php';
$final="DELETE FROM Compras";
mysqli_query($conexion,$final);
unset ($_SESSION['carrito']);
header('Location: index.php');
?>