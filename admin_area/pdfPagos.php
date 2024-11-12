<?php
include("includes/db.php");
require('../fpdf/fpdf.php');  

$pdf = new FPDF('L', 'mm', 'A4'); 
$pdf->AddPage();


$pdf->SetFont('Arial', '', 12);


$pdf->Cell(0, 10, 'Lista de Pagos', 0, 1, 'C');


$pdf->Ln(10);


$pdf->SetFont('Arial', 'B', 10);  
$pdf->Cell(20, 7, 'No.', 1, 0, 'C');
$pdf->Cell(40, 7, 'Numero de Orden', 1, 0, 'C');
$pdf->Cell(35, 7, 'Cantidad a Pagar', 1, 0, 'C');
$pdf->Cell(35, 7, 'Metodo de Pago', 1, 0, 'C');
$pdf->Cell(35, 7, 'Num. Referencia', 1, 0, 'C');
$pdf->Cell(35, 7, 'Fecha de Pago', 1, 1, 'C');  


$pdf->SetFont('Arial', '', 10);


$get_pagos = "SELECT * FROM pagos";
$run_pagos = mysqli_query($con, $get_pagos);
$i = 0;

while ($row_pagos = mysqli_fetch_array($run_pagos)) {
    $i++;
    
    $num_fac = $row_pagos['numero_factura'];
    $cantidad = $row_pagos['cantidad'];
    $metodo_pago = $row_pagos['metodo_pago'];
    $num_ref = $row_pagos['num_ref'];
    $fecha_pago = $row_pagos['fecha_pago'];
    

    $pdf->Cell(20, 7, $i, 1, 0, 'C');
    $pdf->Cell(40, 7, $num_fac, 1, 0, 'C');
    $pdf->Cell(35, 7, $cantidad, 1, 0, 'C');
    $pdf->Cell(35, 7, $metodo_pago, 1, 0, 'C');
    $pdf->Cell(35, 7, $num_ref, 1, 0, 'C');
    $pdf->Cell(35, 7, $fecha_pago, 1, 1, 'C'); 
}

$pdf->Output();
?>
