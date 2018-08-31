<?php
//文字コードをUTF8に
header("Content-Type: text/html; charset=UTF-8");


//テキストボックスの中身を取得
$word = $_POST["keyword"];

//$wordに入っているキーワードがDBに入ってるか検索
$searchResult="";

///// DB接続設定 /////
$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect,"wa31");
mysqli_set_charset($connect, "utf8");
///// DB接続設定終わり /////


//入力されたキーワードと同じ【名前】の商品がgoodsテーブルにあるか探すSQLを作成
$sql = "SELECT * FROM goods WHERE name LIKE'%".$word."%'";

$result = mysqli_query($connect,$sql);

while($data = mysqli_fetch_array($result)){

//検索結果を１つずつ$searchResult に追加していく
  echo "<p>".$data["name"]."</p>";
}

// print $searchResult;
