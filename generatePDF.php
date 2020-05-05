<?php
//include connection file
include "config.php";
require('fpdf182/fpdf.php');
//include_once('pdf/fpdf.php');

class PDF extends FPDF
{
  // Page header
  function Header()
  {
      // Logo
      $this->Image('img/logo.jpg',10,10,30);
      $this->SetFont('Arial','B',14);
      // Move to the right
      $this->Cell(-40);
      // Title
      $this->Cell(276,5,'Blue Pearl Report',0,0,'C');
      $this->Ln(6);
      $this->SetFont('Times','',12);
      $this->Cell(-40);
      $this->Cell(276,10,'22 Sloane St, Bryanston, Sandton, 2191',0,0,'C');
      $this->Ln(6);
      $this->Cell(-40);
      $this->Cell(276,10,'+27 (0) 11 656 2521',0,0,'C');
      $this->Ln(6);
      $this->Cell(-40);
      $this->Cell(276,10,'+27 (0) 86 226 8354',0,0,'C');
      $this->Ln(10);
  }

  // Page footer
  function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }

}

      $display_heading = array('ID'=>'Id', 'TEAM_MEMBER'=> 'Team Member', 'COMPANY'=> 'Company','PROJECT'=> 'Project','DA_TE'=> 'Date','WEEK'=> 'Week'
      ,'MONTH'=> 'MONTH','BUDGET_MIN'=> 'BUDGET_MIN','BUDGET_HR'=> 'BUDGET_HR','ACTUAL_MIN'=> 'ACTUAL_MIN','ACTUAL_HR'=> 'ACTUAL_HR'
      ,'VARIANCE_MIN'=> 'VARIANCE_MIN');

      $result = mysqli_query($con, "SELECT * FROM employees") or die("database error:". mysqli_error($con));
      $header = mysqli_query($con, "SHOW columns FROM employees WHERE Field != 'created_on'");

      $pdf = new PDF();
      //header
      $pdf->AddPage();
      //foter page
      $pdf->AliasNbPages();
      $pdf->SetFont('Arial','',12);
      foreach($header as $heading) {
      $pdf->Cell(35,10,$display_heading[$heading['Field']],1);
      }
      foreach($result as $row) {
      $pdf->SetFont('Arial','',10);
      $pdf->Ln();
      foreach($row as $column)
      $pdf->Cell(35,10,$column,1);
      }
      $pdf->Output();
?>
