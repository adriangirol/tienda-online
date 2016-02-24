<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends FPDF {

    
   //Cabecera de página
   function Header()
   {

      $this->Image(base_url()."asset/plantilla/img/logo.jpg",10,8,33);

      $this->SetFont('Arial','B',12);

      $this->Cell(30,10,'Title',1,0,'C');

   }
   function Footer()
    {

        $this->SetY(-10);

        $this->SetFont('Arial','I',8);

        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
   function TablaBasica($header)
   {
    //Cabecera
    foreach($header as $col)
    $this->Cell(40,7,$col,1);
    $this->Ln();
    
      $this->Cell(40,5,"hola",1);
      $this->Cell(40,5,"hola2",1);
      $this->Cell(40,5,"hola3",1);
      $this->Cell(40,5,"hola4",1);
      $this->Ln();
      $this->Cell(40,5,"linea ",1);
      $this->Cell(40,5,"linea 2",1);
      $this->Cell(40,5,"linea 3",1);
      $this->Cell(40,5,"linea 4",1);
   }
    
}