<?php

class pdfController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->pdf = $this->library('fpdf');
    }

    public function index() {
        
    }

    public function show($name) {
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(40, 10, $name);
        $this->pdf->Output();
    }

}