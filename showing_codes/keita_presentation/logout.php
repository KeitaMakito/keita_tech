<?php

session_start();

// セッション変数の初期化
$_SESSION = array();

session_destroy();

// cookie情報を削除する
setcookie("PHPSESSID","",time()-3600,"/");

// トップページに戻す
header("Location:index.php");
exit;
