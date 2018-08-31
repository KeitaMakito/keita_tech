<?php
require('./tcpdf/tcpdf.php');
require('./fpdi/fpdi.php');

// TCPDFオブジェクトの作成
//　$pdf = new TCPDF("P", "mm", "A4");

  // ＦＰＤＩだとテンプレートを読み込める
$pdf = new FPDI("P", "mm", "A4");

// 全体の設定
$pdf -> SetFont('kozminproregular','I',15);

// 余白の設定
$pdf -> SetMargins(20,0,0);

// ヘッダーとフッターを消す
$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);

// ページの追加
$pdf -> AddPage();

  // 位置の設定 (これは自分で決めたいときだけ使う)
//  $pdf -> setXY(10,10);

// テンプレート読み込み
$pdf -> setSourceFile("template/genkou.pdf");

// テンプレートＰＤＦの何ページ目を使うかを指定
$index = $pdf -> importPage(1);

// テンプレートつかうよ宣言
$pdf -> useTemplate($index);


// 文字色の設定
$pdf -> setTextColor(200,200,20);

// 文字の表示
$pdf -> write(0,'はじめてのPDF');

// 塗りつぶし色
$pdf -> setFillColor(200,200,200);
// 線の色
$pdf -> setDrawColor(200,200,200);
// 線の太さ
$pdf -> setLineWidth(2);

$pdf -> setXY(0,20);

for($i=0;$i<5;$i++){
  // セルの表示 全部
  $pdf -> MultiCell(20,20,"<h1>ぴー</h1>","1","C",true,0,'','',true,0,true);
}

// セルの表示 全部
$pdf -> MultiCell(20,20,"全部",1,"C");

// セルの表示 右と下
$pdf -> MultiCell(20,20,"右と下","RB","C");

// セルの表示 左と上
$pdf -> MultiCell(20,20,"左と上","LT","C");

// セルの表示 右
$pdf -> MultiCell(20,20,"右","R","C");

// 図形
// 線
$pdf -> setDrawColor(0,0,0);
$pdf -> line(20,20,80,40);
// line( 開始地点(XとY),終了地点(XとY) )という設定


// 四角形
$pdf -> Rect(50,50,100,40,"DF");

// 多角形
$pdf -> Polygon(array(100,100,120,120,100,200,50,50,80,200),"DF");

// 回転
$pdf -> Rotate(-45,0,0);

// 画像
$pdf -> Image("img/hal.png",0,0,220*0.352);

// このあとの文字のための回転もどし
$pdf -> Rotate(45,0,0);
$pdf -> write(0,"abc");

// ページの追加
$pdf -> AddPage("L");

//ＰＤＦの出力
$pdf -> Output('ukepi.pdf','I');
