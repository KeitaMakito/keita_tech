<?php
//文字コードをUTF8に
header("Content-Type: text/html; charset=UTF-8");


//テキストボックスの中身を取得
$word = $_POST["category"];

//$wordに入っているカテゴリーがDBに入ってるか検索
$searchResult="";

///// DB接続設定 /////
$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"wa31");
mysqli_set_charset($connect, "utf8");
///// DB接続設定終わり /////


//ラジオボタンでチェックされた値と同じものが goodsテーブルのcategoryにあるか

$sql = "";

$result = mysqli_query($connect,$sql);
while($data = mysqli_fetch_array($result)){
	//検索結果のデータから画像を<div class="box"></div>に挟んでいく
 $searchResult .= '';

}


print $searchResult;
