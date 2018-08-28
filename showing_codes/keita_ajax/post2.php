<?php
//文字コードをUTF8に
header("Content-Type: text/html; charset=UTF-8");

//idを取得
$id = $_POST["id"];
//パスワードを取得
$pass = $_POST["pass"];

//$idが"root" かつ $passが"pass"かどうかを判定
if($id == "root" && $pass == "pass"){
  //$idと$passがあっていたらsuccess をかえす
  $text = "success";
}else{
//あっていなかったらerror をかえす
  $text = "error";
}

//結果を返す
echo $text;
