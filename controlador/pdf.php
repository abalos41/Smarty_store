<?php
require_once('cesta.php');
require('fpdf181/fpdf.php');
require_once("Producto.php");

class PDF extends FPDF {

    function Header() {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(50);
        $this->Cell(130, 15, 'Bienvenidos a Tienda.enlaces', 1, 0, 'C');
        $this->Ln(40);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function FancyTable($header) {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(7, 0, 7);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B', '15');
        // Cabecera
        $w = array(37, 100, 28, 28);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 10);
        session_start();
        $productos = $_SESSION['cesta'];
        $unidades = $_SESSION['unidades'];
        // Datos
        $fill = false;
        foreach ($productos as $producto) {
            foreach ($producto as $dato) {
                $this->Cell($w[0], 6, $dato->getCod(), 'LR', 0, 'L', $fill);
                $this->Cell($w[1], 6, $dato->getNombre_Corto(), 'LR', 0, 'L', $fill);
                $this->Cell($w[2], 6, $dato->getPVP(), 'LR', 0, 'R', $fill);
                $this->Cell($w[3], 6, $unidades[$dato->getCod()], 'LR', 0, 'R', $fill);
                $this->Ln();
                $fill = !$fill;
            }
        }

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 20);
$pdf->Cell(0, 10, 'Productos:', 0, 1);

$header = array('Codigo', 'Nombre Corto', 'Precio', 'Cantidad');
$pdf->FancyTable($header);

$pdf->Ln(3);
$cesta = new cesta();
$cesta->carga_cesta();
$total = $cesta->coste();
$cesta->guarda_cesta();

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0, 10, 'Total:   ' . number_format($total, 2) . " Euros", 0, 1);

$pdf->Output();
?>