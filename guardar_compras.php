<?php 
session_start();
include 'conexion.php';
include 'catalogo-temp.php'
/*if(isset($_SESSION['carrito'])){*/


		$Subtotal= $f['Precio']* $_POST['Cantidad'];
		$query = "INSERT INTO Compras (Talla,Cantidad,Subtotal,ID_Producto)
 		VALUES ('$_POST[Tallas]', '$_POST[Cantidad]','$Subtotal','$_GET[Id]')";
 		$conexion->query($query);

?>