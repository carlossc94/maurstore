<?php

session_start();
unset ($_SESSION['carrito']);
header('Location: catalogo.php');

?>