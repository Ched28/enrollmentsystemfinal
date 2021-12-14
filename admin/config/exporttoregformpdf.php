<?php 
require('../../FPDF/fpdf.php');
include_once("dbcon.php");
$stid = $_GET['id'];
class RegFormPdf extends FPDF{
    function header1(){
        $this->Image('../qcu.png', 10, 6, 15);
     
        $this->setFont('Arial', 'B', 11);
        $this->Cell(135, 12, 'QUEZON CITY UNIVERSITY', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', '', 9);
        $this->Cell(135, 0, '(Formerly Quezon City Polytechnic University)', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', 'B', 11);
        $this->Cell(135, 12, 'CERTIFICATE OF REGISTRATION', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', '', 11);
        $this->Cell(250, -33, 'Campus:', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', '', 11);
        $this->Cell(300, 33, 'San Bartolome', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', '', 11);
        $this->Cell(250, -15, 'StudNo:', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', '', 11);
        $this->Cell(300, 15, '17-1302', 0, 0, 'C');
        $this->Ln();
        
    }
    function footer(){
        $this->SetY(-15);
        $this->setFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page ' .$this->PageNo().'/{nb}', 0, 0, 'C');
        $this->Ln();
    }
    function headertop(){
        $this->setFont('Arial', '', 10);
        $this->Cell(60, 12, 'Course/Year/Section', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', '', 10);
        $this->Cell(120, -12, 'BSIT', 0, 0, 'C');
        $this->Cell(-70, -12, '3rd Year/SBIT - 3D', 0, 0, 'C');
        $this->Cell(150, -12, '__ Regular Student', 0, 0, 'C');
        $this->Cell(-70, -12, '__ Irregular Student', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', '', 10);
        $this->Cell(60, 25, 'FAMILY NAME', 0, 0, 'C');
        $this->Ln();
        $this->setFont('Arial', '', 10);
        $this->Cell(115, -25, 'FIRST NAME', 0, 0, 'C');
        $this->Cell(-60, -25, 'MIDDLE NAME', 0, 0, 'C');
        $this->Cell(110, -25, '__ NEW', 0, 0, 'C');
        $this->Cell(-60, -25, '__ OLD', 0, 0, 'C');
        $this->Cell(110, -25, '__ RET', 0, 0, 'C');
        $this->Cell(-60, -25, '__ TRA', 0, 0, 'C');
        $this->Ln();


    }
    function headertop1(){
        
    }
}

$pdf = new RegFormPdf();
$pdf->AliasNbPages();
$pdf->SetMargins(0.2,0.2,0.2);
$pdf->AddPage('P', 'A4', 0);

$pdf->header1();
$pdf->headertop();
$pdf->headertop1();
$pdf->Output();
?>