<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

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
					<a href='index1.php'>Home</a>
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

<footer>
	
</footer>

<link rel='stylesheet' type='text/css' href='css/store.css'/>
</body>
</html>

	";

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
					<a href='index1.php'>Home</a>
				</li>
				<li class='icon-catalogo'>
					<a href='catalogo.php'>Catálogo</a>
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

<footer>
	
</footer>

<link rel='stylesheet' type='text/css' href='css/store.css'/>
</body>
</html>
  ";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='login.html'>Necesita Hacer Login</a>";
exit;
}

?>