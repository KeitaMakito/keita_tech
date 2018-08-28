<?php

/* 課題とか復讐用 */



require('./tcpdf/tcpdf.php');
require('./fpdi/fpdi.php');

// TCPDFオブジェクトの作成
$pdf = new TCPDF("P", "mm", "A4");

/* ################## １ページ目 ##################### */

/* 左から５ｃｍ、上から１０ｃｍのところに「ＨＡＬ」と１５ｐｔで */



// 全体の設定
$pdf -> SetFont('kozminproregular','I',15);

// ページの追加
$pdf -> AddPage("L");

// 位置の設定 (単位がmmなので、１０倍してｃｍにする)
$pdf -> setXY(50,100);

// 文字の表示
$pdf -> write(0,'ＨＡＬ');

/* ################## ２ページ目 #####################3 */

/* 左から１０ｃｍ、上から０ｃｍのところに「ＭＯＤＥ」と２０ｐｔで */

// 全体の設定
$pdf -> SetFont('kozminproregular','I',20);

// ページの追加
$pdf -> AddPage("P");

// 位置の設定 (単位がmmなので、１０倍してｃｍにする)
$pdf -> setXY(100,0);

// 文字の表示
$pdf -> write(0,'MODE');



//ＰＤＦの出力
$pdf -> Output('test.pdf','I');
