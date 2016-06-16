<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
define('FPDF_FONTPATH','fonts');
require('fpdf.php');
include 'conexion.php';

class PDF extends FPDF
{
	function Header()
{
    // Logo
    $this->Image('images/maur_store.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',45);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(90,30,'MaurStore',1,0,'C');
    // Salto de línea
    $this->Ln(45);
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0x00,0x00,0x00);

$email=$_SESSION['email'];
$sql="SELECT * FROM Clientes WHERE Email='$email'";
$rec=mysqli_query($conexion,$sql);
$row1=mysqli_fetch_array($rec);

$pdf->cell(30,5,'Nombre:  ',0,0,'C');
$pdf->cell(50,5,$row1['Nombre'],0,0,'L');
$pdf->cell(50,5,$row1['Apellidos'],0,0,'L');
$pdf->Ln(10);
$pdf->cell(30,5,'Ciudad:  ',0,0,'C');
$pdf->cell(60,5,$row1['Ciudad'],0,0,'L');
$pdf->cell(30,5,'Estado:  ',0,0,'C');
$pdf->cell(60,5,$row1['Estado'],0,0,'L');
$pdf->Ln(10);
$pdf->cell(30,5,'Direccion:  ',0,0,'C');
$pdf->cell(000,5,$row1['Direccion'],0,0,'L');
$pdf->Ln(5);
$pdf->cell(30,5,'Referencia:  ',0,0,'C');
$pdf->cell(000,5,$row1['Referencia'],0,0,'L');
$pdf->Ln(10);
$pdf->cell(30,5,'Email: ',0,0,'C');
$pdf->cell(80,5,$row1['Email'],0,0,'L');
$pdf->cell(30,5,'Contacto:',0,0,'C');
$pdf->cell(45,5,$row1['Contacto'],0,0,'L');
$pdf->Ln(15);
$pdf->Cell(0,5,'Lista de Pedido.',0,0,'C');
$pdf->Ln(15);

$sql2="SELECT * FROM Compras";
$result=$conexion->query($sql2);
while($f=mysqli_fetch_array($result)){
	$pdf->Cell(70,5,$f['Nombre'],1,0,'C');
	$pdf->Cell(30,5,$f['Talla'],1,0,'C');
	$pdf->Cell(30,5,$f['Cantidad'],1,0,'C');
	$pdf->Cell(30,5,$f['Precio'],1,0,'C');
	$pdf->Cell(30,5,$f['Subtotal'],1,1,'C');
	$total=$total+($f['Subtotal']);
}

$pdf->Cell(0,25,"Su Pago Es De:  ".$total,0,1,'C');

$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,25,'Gracias Por Su Compra ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,25,'*Muestre Este Comprobante Al Momento De Entrega',0,1,'C');


//Datos dle titulos

$final="DELETE FROM Compras";
mysqli_query($conexion,$final);
unset ($_SESSION['carrito']);
$pdf->Output('D','ComprobanteDePago.pdf');

}
else{
	header("location:index.php");
}
?>
