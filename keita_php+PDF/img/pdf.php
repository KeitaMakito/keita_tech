<?php
require('./tcpdf/tcpdf.php');
require('./fpdi/fpdi.php');

function getInt($name) {
	if (isset($_POST[$name]) && $_POST[$name] != '') {
		return $_POST[$name];
	}
	return 0;
}


$pdf = new fpdi("P", "mm", "A4", true, "UTF-8");
// $pdf = new TCPDF( "P", "mm", "A4" );




$pdf -> SetMargins(0,0,0);
$pdf -> SetFont('stsongstdlight', 'B', 15);
// $pdf -> SetFont('kozminproregular','B',30);
$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);
$pdf -> SetAutoPageBreak(false);
$pdf->AddPage();




$pdf -> setSourceFile('template/template2.pdf');
$iIndex = $pdf->importPage(1);
$pdf -> useTemplate($iIndex);







$pdf -> setXY(60,45.5);
$pdf->setFillColor(0, 100, 100);
$pdf->setDrawColor(200, 0, 0);
$pdf->SetLineWidth(2);
$pdf -> MultiCell(20,2,"celltest",LT,L,true,1,'','',true,0,true);
$pdf -> MultiCell(20,2,"celltest",LT,C,true,0,'','',true,0,true);

$pdf->SetLineWidth(2);
$pdf->line(0,0, 10, 20);

$pdf->Rect(10,0,10,20,DF);

$pdf->Polygon( array(50,50,75,75,80,70,100,70), DF, all, array(200,200,200), true );

$pdf->Rotate( 45,100,100);
$pdf->Image("hal.png",100,100,100*0.35277777777777775);
$pdf->Rotate( -45,100,100);

// $pdf -> setXY(60,45.5);
$pdf -> write(0,"肺炎や脳炎などを起こして、命の危険もある「はしか」（麻疹）の患者の報告が急増しています。ワクチンを接種していないなど免疫がなければ、感染した人と同じ空間にいるだけでうつってしまう「はしか」。今年に入ってからの感染者は、これまでに６０人近くと多くの人が移動した夏休みに空港やコンサート会場などを中心に感染が広がっています。","http://www.google.co.jp");
$pdf -> Ln();
$pdf -> write(20,"テスト","http://www.google.co.jp");

$pdf -> setXY(60,85.5);
// $pdf -> Cell( 100, 50, "あああ", "TB", $ln, $align, $fill, $link, $stretch, $ignore_min_height, $calign, $valign )



$filename = date('Ymd')."label.pdf";
$pdf->Output($filename,'I');