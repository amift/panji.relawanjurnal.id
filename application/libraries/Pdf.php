<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use setasign\Fpdi;

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
require_once dirname(__FILE__) . '/fpdi/autoload.php';

class Pdf extends Fpdi\TcpdfFpdi{
    function __construct(){
        parent::__construct();
    }

	// public function Footer() {
	//     // Position at 15 mm from bottom
	//     $this->SetY(-15);
	//     // Set font
	//     $this->SetFont('helvetica', 'I', 8);
	//     // Page number
	//     $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	// }    
}
