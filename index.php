<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	echo "<!DOCTYPE html>
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
				<li class='icon-carrito'>
					<a href='carrito.php'>Carrito</a>
				</li>
				<li class='icon-login'>
					<a href='logout.php'>
					Salir
					</a>
				</li>
			</ul>
		</nav>
	</header>
</section>

<section class='imagenes'>
	<div class='texto'>
		<h1 class='titulo'>MaurStore</h1>  <!--Titulo-->
		<h3 class='title-a'>Viste Siempre A La Moda</h3> <!--Resumen-->
		<h3 class='title-b'>Todo En Ropa Para Caballero</h3>
		<a class='button' href='#ropas'>Conoce más</a><!--Boton-->
	</div>
	<div class='background'>
	</div>
	
</section>

<section class='demo' id='ropas'>
	<div class='p'>
		<figure>
		<a href=catalogo.php>
			<img src='images/pantalon1.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Pantalones</p>
	</div>

	<div class='t'>
		<figure>
		<a href=catalogo.php>
			<img src='images/Imagen2.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Trajes</p>
	</div>

	<div class='pl'>
		<figure>
		<a href=catalogo.php>
			<img src='images/playera1.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Playeras</p>
	</div>

	<div class='c'>
		<figure>
		<a href=catalogo.php>
			<img src='images/camisa1.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Camisas</p>
	</div>
</section>

<section class='demo1'>
	<div class='ci'>
		<figure>
		<a href=catalogo.php>
			<img src='images/cinturon.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Cinturones</p>
	</div>

	<div class='sud'>
		<figure>
		<a href=catalogo.php>
			<img src='images/sudadera.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Sudaderas</p>
	</div>

	<div class='traban'>
		<figure>
		<a href=catalogo.php>
			<img src='images/trajebanio.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Traje De Baño</p>
	</div>

	<div class='rd'>
		<figure>
		<a href=catalogo.php>
			<img src='images/ropadep.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Ropa Deportivas</p>
	</div>

	<hr /><br />
</section>

<footer>
	
</footer>

<link rel='stylesheet' type='text/css' href='css/store.css'/>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Allerta' rel='stylesheet' type='text/css'><!--CDN-->	


</body>
</html>";

} else {
  
 echo "
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
				<li class='icon-carrito'>
					<a href='carrito.php'>Carrito</a>
				</li>
				<li class='icon-registro'>
					<a href='registro.html'>Registro</a>
				</li>
				<li class='icon-login'>
					<a href='login.html'>Login</a>
				</li>
			</ul>
		</nav>
	</header>
</section>

<section class='imagenes'>
	<div class='texto'>
		<h1 class='titulo'>MaurStore</h1>  <!--Titulo-->
		<h3 class='title-a'>Viste Siempre A La Moda</h3> <!--Resumen-->
		<h3 class='title-b'>Todo En Ropa Para Caballero</h3>
		<a class='button' href='#conoce-mas'>Conoce más</a><!--Boton-->
	</div>
	<div class='background'>
	</div>
	
</section>

<section class='demo' id='conoce-mas'>
	<div class='p'>
		<figure>
		<a href=catalogo.php>
			<img src='images/pantalon1.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Pantalones</p>
	</div>

	<div class='t'>
		<figure>
		<a href=catalogo.php>
			<img src='images/Imagen2.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Trajes</p>
	</div>

	<div class='pl'>
		<figure>
		<a href=catalogo.php>
			<img src='images/playera1.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Playeras</p>
	</div>

	<div class='c'>
		<figure>
		<a href=catalogo.php>
			<img src='images/camisa1.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Camisas</p>
	</div>
</section>

<section class='demo1'>
	<div class='ci'>
		<figure>
		<a href=catalogo.php>
			<img src='images/cinturon.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Cinturones</p>
	</div>

	<div class='sud'>
		<figure>
		<a href=catalogo.php>
			<img src='images/sudadera.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Sudaderas</p>
	</div>

	<div class='traban'>
		<figure>
		<a href=catalogo.php>
			<img src='images/trajebanio.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Traje De Baño</p>
	</div>

	<div class='rd'>
		<figure>
		<a href=catalogo.php>
			<img src='images/ropadep.png' width='212px' height='250px'>
		</a>
		</figure>

		<p class='nombre'>Ropa Deportivas</p>
	</div>

	<hr /><br />
</section>

<footer>
	
</footer>

<link rel='stylesheet' type='text/css' href='css/store.css'/>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Allerta' rel='stylesheet' type='text/css'><!--CDN-->	


</body>
</html>
";
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='login.html'>Necesita Hacer Login</a>";
exit;
}

?>

