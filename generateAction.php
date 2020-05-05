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

      $display_heading = array('ID'=>'Id','Week'=>'Weeks','Date_Logged'=>'Date Logged','Action_Item'=> 'Action Items', 'Responsible_person'=> 'Responsible Person','Team_Member2'=>'Team Member 2',
      'Team_Member3'=>'Team Member 3','Team_Member4'=>'Team Member 4','Team_Member5'=>'Team Member 5', 'Status'=>'Status', 'Date_to_be_Complete'=>'Date to be complete','Challenges'=>'Challenges',
      'Date_Completed'=>'Date Completed', 'Variance'=>'Variance', 'Column_1'=>'Column');

      $result = mysqli_query($con, "SELECT * FROM actions") or die("database error:". mysqli_error($con));
      $header = mysqli_query($con, "SHOW columns FROM actions WHERE Field != 'created_on'");

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
