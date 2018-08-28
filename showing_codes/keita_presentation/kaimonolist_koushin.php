<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>買い物リスト更新完了｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.1.0.min.js"></script>
</head>
<body>


<?php

//ファイル読み込み
$file_data = file_get_contents("kaimonolist.txt");
// データ受け取り
$kaimonolist = $_POST["kaimonolist"];
// ここで追記できる
  file_put_contents("kaimonolist.txt", $kaimonolist . PHP_EOL);

echo "買い物リストを更新しました。";

?>

<?php
require("./footer.html");
?>


</body>
