<?php
//文字コードをUTF8に
header("Content-Type: text/html; charset=UTF-8");

//post1.php

//htmlから送られてきた情報を取得
$text = $_POST["text"]."倍返しだ！！";

//結果を返す
echo $text;