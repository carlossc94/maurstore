<?php  
session_start();
include 'conexion.php'
if(isset($_SESSION['carrito'])){

}else{
	if(isset($GET['id'])){
		$nombre="";
		$precio=0;
		$sql = "SELECT * FROM Compras inner join Productos WHERE ID_Compra =".$_GET['id'];

		$result = $conexion->query($sql);
			
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$nombre=$row['Producto.Nombre'];
			$Precio=$row['Producto.Precio'];
			$Cantidad=$row['Compras.Cantidad'];
			$Talla=$row['Compras.Talla'];
			$Subtotal=$row['Compras.Subtotal'];
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Maur-Store</title>
	<meta charset='utf-8'/>
	<link rel='shortcut icon' href='images/maur.ico' type='image/ico' />
</head>
<body>
<section class='header'>
	<header>
		<figure class='logotipo'> <!--logotipo-->
			<img src='images/maur_store.png' width='130px' height='100px' alt='Invie logotipo'> 
		</figure>
		<nav class='menu'>
			<ul>
				<li class='icon-home'>
					<a href='index.php'>Home</a>
				</li>
				<li class='icon-catalogo'>
					<a href='catalogo-temp.php'>Catálogo</a>
				</li>
				<li class='icon-catalogo'>
					<a href='registro.html'>Registro</a>
				</li>
				<li class='icon-login'>
					<a href='login.html'>
					Login
					</a>
				</li>
			</ul>
		</nav>
	</header>
</section>

<section class="tabla">
	<div class="contenedor">
	<?php
	$total=0;
	if(isset($_SESSION['carrito'])){
		$total=0;
		$datos=$_SESSION['carrito'];
		for($i=0;i<count($datos);$i++){
	?>

	<center>
		<span><?php echo $datos[$i]['Talla']?></span><br>
		<span><?php echo $datos[$i]['Precio']?></span><br>
		<span><?php echo $datos[$i]['Cantidad']?></span><br>
		<span><?php echo $datos[$i]['Talla']?></span><br>
		<span><?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio']?></span><br>
	</center>
	<?php
		$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
		}


	} else{
		echo '<center><h2>El Carrito de Compras Esta Vacio</h2></center><br>';
		/*echo "<h4 class='btn-comprar carrito'><a href='catalogo-temp'>Catalogo</a></h4>";*/
	}

	echo '<center><h2>Total: '.$total.'</h2></center>';


	?>
	 <!-- <table>
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio/Unitario</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Camisa</td>
					<td>$150</td>
					<td>2</td>
					<td>$300</td>
				</tr>
				<tr>
					<td>Pantalon</td>
					<td>$180</td>
					<td>1</td>
					<td>$180</td>
				</tr>
				<tr>
					<td>Playera deportiva</td>
					<td>$300</td>
					<td>2</td>
					<td>$600</td>
				</tr>
				<tr>
				<td></td>
				<td></td>
					<td>subtotal</td>
					<td>$1080</td>
				</tr>

			</tbody>
		</table>
	</div>-->

		<div>
			<h4 class="btn-comprar carrito"><a href="">Realizar compra</a></h4>
		</div>
	</section> 


<footer>
	
</footer>

<link rel='stylesheet' type='text/css' href='css/store.css'/>
</body>
</html>
