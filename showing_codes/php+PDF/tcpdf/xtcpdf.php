<?php 
App::import('Vendor','tcpdf/tcpdf'); 
 
class XTCPDF  extends TCPDF 
{ 
 
    var $xheadertext  = 'PDF created using CakePHP and TCPDF'; 
    var $xheadercolor = array(0,0,200); 
    var $xfootertext  = 'Copyright Â© %d XXXXXXXXXXX. All rights reserved.'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ; 

    public $footer="";
    public $pageNum=1;
  
    function Header() 
    { 
        if($this -> PageNo() == 1){
            $this -> setY(0); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top
            $this -> SetFillColor(100, 100, 100); 
            $this -> SetTextColor(0 , 0, 0); 
            $this -> Cell(0,15, '', 0,0,'C', 1); 
        }
    } 

    function Footer() 
    { 
        if($this -> PageNo() == $this->pageNum){

        $this -> setY(-15); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top
        $this -> SetFillColor(100, 100, 100);
        $this -> Cell(0,15, '', 0,0,'C', 1);

        // フッター
        $this -> SetFont('cid0jp', '', 12);
        $this -> setXY(10,-10);
        $this -> setTextColor(255, 255, 255);
        $this -> writeHTML($this->footer, true, 0, true, 0);
        }

    } 
} 
?>
