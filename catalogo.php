<?php 
session_start();
header("Content-Type: text/html;charset=utf-8");
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
					<a href='catalogo.php'>Catálogo</a>
				</li>

				<?php 
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
						echo "
						<li class='icon-carrito'>
						<a href='carrito.php'>Carrito</a>
						</li>
						<li class='icon-login'>
							<a href='logout.php'>
							Salir
							</a>
						</li>";
					}
					else{
						echo "<li class='icon-carrito'>
					<a href='carrito.php'>Carrito</a>
				</li>
				<li class='icon-catalogo'>
					<a href='registro.html'>Registro</a>
				</li>
				<li class='icon-login'>
					<a href='login.html'>
					Login
					</a>
				</li>";
					}
				?>

				
			</ul>
		</nav>
	</header>
</section>

<section class="sec-tienda">

<?php 
	include 'conexion.php';
	$tipo="Sudaderas";
	$producto="SELECT * FROM Producto WHERE Tipo='$tipo'";
	$result = $conexion->query($producto);
	while ($f=mysqli_fetch_array($result)) {
?>

<section class="flex-cat" >
	<div class="alpha cat">
		<figure class="producto cat">
			<img src='images/Sudaderas/<?php echo $f['Imagen'];?>' class="img-producto" width="250px" height="270px ">
		</figure>
		<div class="guardar-prod">
			<h2 class="nombre-producto" name="Nombre"><?php echo $f['Nombre'];?></h2>
		</div>

		<h3 class="precio-producto" name="Precio">Precio: $<?php echo $f['Precio'];?>.00</h3>
		<h4 class="btn-comprar" onclick='showHide()'><a href="detalles.php?id=<?php echo $f['Id_producto'];?>">Ver Detalles</a></h4>
	</div>
</section>
</section>
<?php	
	}
?>
<section class="sec-tienda">
<?php 
	include 'conexion.php';
	$tipo="Camisas";
	$producto="SELECT * FROM Producto WHERE Tipo='$tipo'";
	$result = $conexion->query($producto);
	while ($f=mysqli_fetch_array($result)) {
?>
<section class="flex-cat">
	<div class="alpha cat">
		<figure class="producto">
			<img src='images/Camisas/<?php echo $f['Imagen'];?>' class="img-producto" width="250px" height="270px ">
		</figure>
		<div class="guardar-prod">
			<h2 class="nombre-producto" name="Nombre"><?php echo $f['Nombre'];?></h2>
		</div>

		<h3 class="precio-producto" name="Precio">Precio: $<?php echo $f['Precio'];?>.00</h3>
		<h4 class="btn-comprar" onclick='showHide()'><a href="detalles.php?id=<?php echo $f['Id_producto'];?>">Ver Detalles</a></h4>
	</div>
</section>
</section>
<?php	
	}
?>

<section class="sec-tienda">
<?php 
	include 'conexion.php';
	$tipo="Accesorios";
	$producto="SELECT * FROM Producto WHERE Tipo='$tipo'";
	$result = $conexion->query($producto);
	while ($f=mysqli_fetch_array($result)) {
?>
<section class="flex-cat">
	<div class="alpha cat">
		<figure class="producto">
			<img src='images/Accesorios/<?php echo $f['Imagen'];?>' class="img-producto" width="250px" height="270px ">
		</figure>
		<div class="guardar-prod">
			<h2 class="nombre-producto" name="Nombre"><?php echo $f['Nombre'];?></h2>
		</div>

		<h3 class="precio-producto" name="Precio">Precio: $<?php echo $f['Precio'];?>.00</h3>
		<h4 class="btn-comprar" onclick='showHide()'><a href="detalles.php?id=<?php echo $f['Id_producto'];?>">Ver Detalles</a></h4>
	</div>
</section>
</section>
<?php	
	}
?>
<section class="sec-tienda">
<?php 
	include 'conexion.php';
	$tipo="Deportivas";
	$producto="SELECT * FROM Producto WHERE Tipo='$tipo'";
	$result = $conexion->query($producto);
	while ($f=mysqli_fetch_array($result)) {
?>
<section class="flex-cat">
<div class="alpha cat">
		<figure class="producto">
			<img src='images/Deportivas/<?php echo $f['Imagen'];?>' class="img-producto" width="250px" height="270px ">
		</figure>
		<div class="guardar-prod">
			<h2 class="nombre-producto" name="Nombre"><?php echo $f['Nombre'];?></h2>
		</div>

		<h3 class="precio-producto" name="Precio">Precio: $<?php echo $f['Precio'];?>.00</h3>
		<h4 class="btn-comprar" onclick='showHide()'><a href="detalles.php?id=<?php echo $f['Id_producto'];?>">Ver Detalles</a></h4>
	</div>
</section>
</section>
<?php	
	}
?>
<section class="sec-tienda">
<?php 
	include 'conexion.php';
	$tipo="Playeras";
	$producto="SELECT * FROM Producto WHERE Tipo='$tipo'";
	$result = $conexion->query($producto);
	while ($f=mysqli_fetch_array($result)) {
?>
<section class="flex-cat">
	<div class="alpha cat">
		<figure class="producto">
			<img src='images/Playeras/<?php echo $f['Imagen'];?>' class="img-producto" width="250px" height="270px ">
		</figure>
		<div class="guardar-prod">
			<h2 class="nombre-producto" name="Nombre"><?php echo $f['Nombre'];?></h2>
		</div>

		<h3 class="precio-producto" name="Precio">Precio: $<?php echo $f['Precio'];?>.00</h3>
		<h4 class="btn-comprar" onclick='showHide()'><a href="detalles.php?id=<?php echo $f['Id_producto'];?>">Ver Detalles</a></h4>
	</div>
</section>
</section>
<?php	
	}
?>
<section class="sec-tienda">
<?php 
	include 'conexion.php';
	$tipo="Trajes";
	$producto="SELECT * FROM Producto WHERE Tipo='$tipo'";
	$result = $conexion->query($producto);
	while ($f=mysqli_fetch_array($result)) {
?>
<section class="flex-cat">
	<div class="alpha cat">
		<figure class="producto">
			<img src='images/Trajes/<?php echo $f['Imagen'];?>' class="img-producto" width="250px" height="270px ">
		</figure>
		<div class="guardar-prod">
			<h2 class="nombre-producto" name="Nombre"><?php echo $f['Nombre'];?></h2>
		</div>

		<h3 class="precio-producto" name="Precio">Precio: $<?php echo $f['Precio'];?>.00</h3>
		<h4 class="btn-comprar" onclick='showHide()'><a href="detalles.php?id=<?php echo $f['Id_producto'];?>">Ver Detalles</a></h4>
	</div>
</section>
</section>
<?php	
	}
?>
<section class="sec-tienda">
<?php 
	include 'conexion.php';
	$tipo="Trajesplaya";
	$producto="SELECT * FROM Producto WHERE Tipo='$tipo'";
	$result = $conexion->query($producto);
	while ($f=mysqli_fetch_array($result)) {
?>
<section class="flex-cat">
	<div class="alpha cat">
		<figure class="producto">
			<img src='images/Trajesplaya/<?php echo $f['Imagen'];?>' class="img-producto" width="250px" height="270px ">
		</figure>
		<div class="guardar-prod">
			<h2 class="nombre-producto" name="Nombre"><?php echo $f['Nombre'];?></h2>
		</div>

		<h3 class="precio-producto" name="Precio">Precio: $<?php echo $f['Precio'];?>.00</h3>
		<h4 class="btn-comprar" onclick='showHide()'><a href="detalles.php?id=<?php echo $f['Id_producto'];?>">Ver Detalles</a></h4>
	</div>
</section>
</section>
<?php	
	}
?>
<section class="sec-tienda">
<?php 
	include 'conexion.php';
	$tipo="Pantalones";
	$producto="SELECT * FROM Producto WHERE Tipo='$tipo'";
	$result = $conexion->query($producto);
	while ($f=mysqli_fetch_array($result)) {
?>
<section class="flex-cat">
	<div class="alpha cat">
		<figure class="producto">
			<img src='images/Pantalones/<?php echo $f['Imagen'];?>' class="img-producto" width="250px" height="270px ">
		</figure>
		<div class="guardar-prod">
			<h2 class="nombre-producto" name="Nombre"><?php echo $f['Nombre'];?></h2>
		</div>

		<h3 class="precio-producto" name="Precio">Precio: $<?php echo $f['Precio'];?>.00</h3>
		<h4 class="btn-comprar" onclick='showHide()'><a href="detalles.php?id=<?php echo $f['Id_producto'];?>">Ver Detalles</a></h4>
	</div>
</section>
</section>
<?php	
	}
?>



</section>

<footer>
	
</footer>

<link rel='stylesheet' type='text/css' href='css/store.css'/>
<script type="text/javascript">
	<!-- 
function showHide(){ 
//create an object reference to the div containing images 
var ImageDiv=document.getElementById('compra') 
//set display to inline if currently none, otherwise to none 
ImageDiv.style.display=(ImageDiv.style.display=='none')?'inline':'none'

} 
//-->
</script>
 
</body>
</html>
