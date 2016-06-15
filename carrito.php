<?php  
session_start();
include 'conexion.php';
if(isset($_SESSION['carrito'])){
	if (isset($_GET['id'])) {
		$arreglo=$_SESSION['carrito'];
		$encontro=false;
		$numero=0;
			for($i=0;$i<count($arreglo);$i++){
				if($arreglo[$i]['Id']==$_GET['id']){
					$encontro=true;
					$numero=$i;
				}
			}
			if($encontro==true){
				$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
				$_SESSION['carrito']=$arreglo;
			}
			else{
				$nombre="";
				$precio=0;
				
				$query="SELECT * FROM Producto WHERE Id_producto=".$_GET['id'];
				$result = $conexion->query($query);
				while ($f=$result->fetch_array()) {
					$nombre=$f['Nombre'];
					$precio=$f['Precio'];
				}
				$Nuevos=array('Id'=>$_GET['id'],
								'Nombre'=>$nombre,
								'Precio'=>$precio,
								'Cantidad'=>1);
				array_push($arreglo, $Nuevos);
				$_SESSION['carrito']=$arreglo;
			}
		}

	}
else{
	if(isset($_GET['id'])){
		$nombre="";
		$precio=0;
		$query="SELECT * FROM Producto WHERE Id_producto=".$_GET['id'];
		$result = $conexion->query($query);
		while ($f=$result->fetch_array()) {
			$nombre=$f['Nombre'];
			$precio=$f['Precio'];
		}
		$arreglo[]=array('Id'=>$_GET['id'],
						'Nombre'=>$nombre,
						'Precio'=>$precio,
						'Cantidad'=>1);
		$_SESSION['carrito']=$arreglo;

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
<body onload="esconde()">
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
						</li>" ;
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
					</a>
				</li>
			</ul>
		</nav>
	</header>
</section>

<section class="tabla">
<?php 
$total=0;
	if(isset($_SESSION['carrito'])){
		$datos=$_SESSION['carrito'];
	
		?>
<table>
			<thead>
				<tr>
					<th>Producto</th>
					<th>Talla</th>
					<th>Cantidad</th>
					<th>Precio/Unitario</th>
					<th>Subtotal</th>
				</tr>
			</thead>

		<?php
		for($i=0;$i<count($datos);$i++){
			?>
		
<div class="producto-carrito">
		<tbody>
				<tr>
					<td><?php echo $datos[$i]['Nombre'];?></td>
					<td>Unitalla</td>
					<td><?php echo $datos[$i]['Cantidad'];?></td>
					<td>$<?php echo $datos[$i]['Precio'];?></td>
					<td>$<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></td>
				</tr>
				</tbody>
</div>

<?php
$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;

$Name=$datos[$i]['Nombre'];
$Size='UNITALLA';
$Cant=$datos[$i]['Cantidad'];
$precio=$datos[$i]['Precio'];
$Subto=$datos[$i]['Cantidad']*$datos[$i]['Precio'];
$ID=$_GET['id'];
	
if($ID){
	$borrado="DELETE FROM Compras WHERE ID_Producto=$ID";
	//Almacenamiento Temporal para Crear EL Comprobante
	mysqli_query($conexion, $borrado);
	$comprobante="INSERT INTO Compras (Nombre,Talla,Cantidad,Precio,Subtotal,ID_Producto) VALUES ('$Name','$Size','$Cant','$precio','$Subto','$ID')";
	mysqli_query($conexion, $comprobante);
	//Almacenamiento Permanente
	$borrado2="DELETE FROM Permanente WHERE ID_Producto=$ID";
	mysqli_query($conexion, $borrado2);
	$almacenamiento="INSERT INTO Permanente (Nombre,Talla,Cantidad,Precio,Subtotal,ID_Producto) SELECT Nombre,Talla,Cantidad,Precio,Subtotal,ID_Producto FROM Compras WHERE ID_Producto=$ID" ;
	mysqli_query($conexion, $almacenamiento);

	}
}
?>
</table>
<?php
	
	}else{
		echo '<div id="vacio"><center><h2>El Carrito De Compras Esta Vacio</h2></center></div>';
	}

	echo "<center><h2>Total: ".$total."</h2></center>";


?>

	<h6>*El pago de sus productos es exclusivo y personal en la entrega, Proximamente se Implementará el pago con tarjeta</h6>
	<div id="confirmar" style='display:block;'>
		<h4 class="btn-comprar detalles carrito comprar" onclick="myFunction()" >Confirmar Compra</h4>
	</div>
	<div id="cancelar" style='display:block;'>
		<h4 class="btn-comprar detalles carrito cancelar" onclick="myFunction1()" >Cancelar Compra</h4>
	</div>
	</section> 

	<?php
	
	?>


<footer>
	
</footer>

<link rel='stylesheet' type='text/css' href='css/store.css'/>
<script>
function esconde(){
	if(document.getElementById("vacio")){
	document.getElementById("confirmar").style.display = 'none';
	document.getElementById("cancelar").style.display = 'none';
	}
	else{
		document.getElementById("seguir").style.display = 'block';
	}
}

function myFunction() {
    var txt;
    var r = confirm("Esta Confirmando Su Pedido!");
    if (r == true) {
        window.location.href='confirmacion.php';
    }
}

function myFunction1() {
    var txt;
    var r = confirm("Eliminara Su Pedido!");
    if (r == true) {
        window.location.href='restore.php';
    }
}

</script>
</body>
</html>
